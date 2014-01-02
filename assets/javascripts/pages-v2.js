$(document).ready(function() {
  if ($('body').hasClass('pages')) {
    parking.initialize();
  }
});



/*** PARKING PAGE ***/
var parking = {
  initialize: function() {
    if ($('body').hasClass('parking')) {
      bash.initialize();
      bash.log('Retrieving website status');
      bash.progress.start(3, 'rws');
      bash.listen('progress-completed-rws', function(e) {
        if (DCS.websiteStatus) {
          bash.log('Website Status: <span class="yellow">' + DCS.websiteStatus + '</span>');
          bash.log('Website Completion: ' + ((DCS.websiteCompletion) 
            ? '<span class="yellow">' + DCS.websiteCompletion + '</span>'
            : '<span class="red">Unknown</span>'));
        } else {
          bash.log('<span class="red">Website status unknown</span>');
        }
        $('#meta .loader, #meta .loader p').fadeIn(1000).removeClass('hidden');
        bash.activate();
      });
    }
  }
};

var bash = {
  history: null,
  buffer: null,
  latest: null,
  mode: 'command',
  initialize: function() {
    bash.history = $('#bash .history');
    bash.buffer = $('#bash .command');
    bash.listen('buffer-submitted-command-mode', function(e) {
      if (bash.commands.hasOwnProperty(e.originalEvent.input)) {
        bash.commands[e.originalEvent.input]();
      } else {
        if (e.originalEvent.input.length > 0) {
          bash.log('<span class="red">\'' + e.originalEvent.input + '\' - unknown command</span>');
        }
      }
    });
    bash.listen('command-completed', function() {
      bash.unlisten('buffer-submitted-' + bash.mode + '-mode');
      bash.unlisten('up-key-pressed-' + bash.mode + '-mode');
      bash.unlisten('down-key-pressed-' + bash.mode + '-mode');
      bash.switch('command');
    });
  },
  log: function(data) {
    bash.latest = $('<p>' + data + '</p>');
    bash.history.append(bash.latest);
  },
  dispatch: function(name, properties) {
    var event = new Event(name, properties);
    document.dispatchEvent(event);
  },
  listen: function(event, callback) {
    $(document).on(event, callback);
    return bash;
  },
  unlisten: function(event) {
    $(document).off(event);
    return bash;
  },
  activate: function() {
    bash.log('Type <span class="green">help</span> to list available commands');
    bash.input.enable();
  },
  switch: function(mode) {
    bash.mode = mode;
    bash.input.activate();
    bash.buffer.val('');
    $('#bash .input span').text((bash.mode == 'command') ? '$' : ':');
    bash.dispatch('mode-switched', {mode: bash.mode});
  },
  progress: {
    timer: null,
    start: function(duration, id) {
      bash.progress.timer = setInterval(function() {
        if (duration != undefined && duration-- == 0) {
          bash.progress.stop(id);
        } else {
          bash.latest.text(bash.latest.text() + '.');
        }
      }, 500);
    },
    stop: function(id) {
      clearInterval(bash.progress.timer);
      bash.progress.done(id);
    },
    done: function(id) {
      bash.latest.html(bash.latest.html() + '<span class="green">done</span>');
      bash.dispatch((id) ? 'progress-completed-' + id : 'progress-completed');
    }
  },
  input: {
    active: true,
    enable: function() {
      $('#bash .input').removeClass('hidden').find('.command').focus();
      bash.buffer.off('keydown').on('keydown', function(e) {
        if (e.keyCode == 13) {
          e.preventDefault();
          if (bash.input.active) {
            var input = bash.buffer.val().trim();
            bash.buffer.val('');
            bash.log('<span class="blue">' + ((bash.mode == 'command') ? '$' : ':') + '</span> ' + input);
            bash.dispatch('buffer-submitted-' + bash.mode + '-mode', {input: input});
          }
        } else if (e.keyCode == 27) {
          bash.switch('command');
        } else if (e.keyCode == 38) {
          bash.dispatch('up-key-pressed-' + bash.mode + '-mode');
        } else if (e.keyCode == 40) {
          bash.dispatch('down-key-pressed-' + bash.mode + '-mode');
        } else {
          if (!bash.input.active) {
            e.preventDefault();
          }
        }
      });
      $(document).on('mouseup', function() {
        bash.buffer.focus();
      });
    },
    disable: function() {
      $('#bash .input').addClass('hidden');
      $(document).off('mouseup');
    },
    activate: function() {
      bash.input.active = true;
    },
    deactivate: function() {
      bash.input.active = false;
    }
  },
  commands: {
    poll: function() {
      if (DCS.poll) {
        bash.switch('poll');
        bash.log('<span class="yellow">' + DCS.poll.message + '</span>');
        bash.listen('buffer-submitted-poll-mode', function(e) {
          if (e.originalEvent.input.length > 0) {
            bash.log('Sending poll answer');
            bash.input.disable();
            bash.progress.start();
            $.ajax({
              url: DCS.BASE_URL + 'index.php/polls/answer',
              type: 'POST',
              data: {id: DCS.poll.id, answer: e.originalEvent.input},
              success: function() {
                bash.progress.stop();
                bash.input.enable();
                bash.dispatch('command-completed');
              }
            });
          } else {
            bash.log('<span class="red">You do not have an answer</span>');
            bash.dispatch('command-completed');
          }
        });
      } else {
        bash.log('<span class="red">We currently don\'t have a poll message</span>');
      }
    },
    share: function() {
      bash.log('Connecting to Facebook...');
      bash.input.disable();
      FB.ui({
        method: 'feed',
        name: 'DCS Website',
        caption: 'Official Website of UP Cebu\'s Department of Computer Science',
        link: DCS.BASE_URL,
        picture: DCS.BASE_URL + 'assets/images/logo-placeholder.png'
      },
      function(response) {
        bash.progress.done();
        if (response && response.post_id) {
          bash.log('<span class="green">Thank you for sharing this page</span>');
        } else {
          bash.log('<span class="red">Something went wrong while sharing this page</span>');
        }
        bash.input.enable();
      });
    },
    log: function() {
      bash.log('Retrieving development log history');
      bash.progress.start();
      bash.input.disable();
      $.ajax({
        url: 'https://api.github.com/repos/dcs-web-team/dcs-website/commits',
        type: 'GET',
        success: function(data) {
          data = JSON.parse(data);
          bash.progress.stop();
          var max = Math.floor($('#bash').outerHeight() / 15) - 1;
          if (data.length <= max) {
            for (var i = 0; i < data.length; i++) {
              bash.log(data[i].commit.message);
            }
          } else {
            bash.switch('log');
            bash.input.deactivate();
            bash.history.html('');
            for (var i = 0; i < max; i++) {
              bash.log(data[i].commit.message);
            }
            (function(data, max) {
              var index = max;
              bash.listen('up-key-pressed-log-mode', function() {
                if (index > max) {
                  bash.latest = bash.latest.prev('p');
                  bash.latest.next('p').remove();
                  index--;
                }
              }).listen('down-key-pressed-log-mode', function() {
                if (index < data.length) {
                  bash.log(data[index++].commit.message);
                }
              });
            })(data, max);
          }
          bash.input.enable();
        }
      });
    },
    help: function() {
      bash.log('<span class="green">poll</span>&nbsp;&nbsp;- show current poll question');
      bash.log('<span class="green">share</span>&nbsp;- share this page on facebook');
      bash.log('<span class="green">log</span>&nbsp;&nbsp;&nbsp;- show development log history');
      bash.log('<span class="green">help</span>&nbsp;&nbsp;- show this help message');
      bash.log('<span class="green">exit</span>&nbsp;&nbsp;- leave this page');
    },
    exit: function() {
      bash.switch('exit');
      bash.log('<span class="yellow">Are you sure you want to exit? (yes/no)</span>');
      bash.listen('buffer-submitted-exit-mode', function(e) {
        if (e.originalEvent.input == 'yes') {
          bash.log('<span class="red">Okay :(</span>');
          setTimeout(function() {
            top.open('', '_self');
            top.close();
          }, 1000);
          bash.dispatch('command-completed');
        } else if (e.originalEvent.input == 'no') {
          bash.log('<span class="green">Yey! :)</span>');
          bash.dispatch('command-completed');
        } else {
          bash.log('<span class="yellow">Are you sure you want to exit? (yes/no)</span>');
        }
      });
    }
  }
};



/*** CUSTOM CLASSES ***/
function Event(name, properties) {
  var event = new CustomEvent(name);
  if (properties) {
    for (property in properties) {
      event[property] = properties[property];
    }
  }
  return event;
}