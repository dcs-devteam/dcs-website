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
  past: {
    index: 0,
    commands: []
  },
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
    bash.listen(['command-completed', 'command-cancelled'], function() {
      if (bash.mode != 'command') {
        bash.unlisten('buffer-submitted-' + bash.mode + '-mode');
        bash.unlisten('up-key-pressed-' + bash.mode + '-mode');
        bash.unlisten('down-key-pressed-' + bash.mode + '-mode');
      }
      bash.past.index = bash.past.commands.length;
      bash.switch('command');
    });
    bash.listen('buffer-submitted-command-mode', function(e) {
      if (e.originalEvent.input.length > 0) {
        bash.past.commands.push(e.originalEvent.input);
        bash.past.index = bash.past.commands.length;
      }
    });
    bash.listen('up-key-pressed-command-mode', function() {
      if (bash.past.index > 0) {
        bash.buffer.val(bash.past.commands[--bash.past.index]);
      }
    });
    bash.listen('down-key-pressed-command-mode', function() {
      if (bash.past.index < bash.past.commands.length) {
        bash.buffer.val(bash.past.commands[bash.past.index++]);
      }
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
  listen: function(events, callback) {
    if (typeof events == 'string') {
      events = [events];
    }
    for (var i = 0; i < events.length; i++) {
      $(document).on(events[i], callback);
    }
    return bash;
  },
  unlisten: function(events) {
    if (typeof events == 'string') {
      events = [events];
    }
    for (var i = 0; i < events.length; i++) {
      $(document).off(events[i]);
    }
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
        console.log(e);
        if (e.keyCode == 13) {
          e.preventDefault();
          if (bash.input.active) {
            var input = bash.buffer.val().trim();
            bash.buffer.val('');
            bash.log('<span class="blue">' + ((bash.mode == 'command') ? '$' : ':') + '</span> ' + input);
            bash.dispatch('buffer-submitted-' + bash.mode + '-mode', {input: input});
          }
        } else if (e.keyCode == 27 || (e.keyCode == 67 && e.ctrlKey)) {
          bash.dispatch('command-cancelled', {mode: bash.mode});
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
    },
    'dev login': function() {
      if (DCS.authenticatedDeveloper.length == 0) {
        bash.switch('dev');
        var login = $('<input type="password" class="developer password hidden" />');
        $('#bash .input').append(login);
        bash.log('<span class="yellow">Enter developer username</span>');
        bash.listen('buffer-submitted-dev-mode', function(e) {
          if (e.originalEvent.input.trim().length == 0) {
            bash.log('<span class="red">You did not provide a username</span>');
          } else {
            bash.log('<span class="yellow">Enter developer password</span>');
            bash.buffer.addClass('hidden');
            login.removeClass('hidden').focus().on('keydown', function(x) {
              if (x.keyCode == 13) {
                login.remove();
                bash.buffer.removeClass('hidden');
                bash.input.disable();
                bash.log('<span class="blue">:</span> [HIDDEN]');
                bash.log('Authenticating');
                bash.progress.start();
                $.ajax({
                  url: DCS.BASE_URL + 'index.php/developers/authenticate',
                  type: 'POST',
                  data: {username: e.originalEvent.input, password: login.val()},
                  success: function(data) {
                    bash.progress.stop();
                    if (data == 'true') {
                      bash.log('<span class="green">Authentication successfull</span>');
                      bash.log('Redirecting to developer page');
                      bash.progress.start();
                      location.href = DCS.BASE_URL + 'index.php/developers/index';
                    } else {
                      bash.log('<span class="red">Authentication failed</span>');
                    }
                    bash.input.enable();
                    bash.dispatch('command-completed');
                  }
                });
              } else if (x.keyCode == 27) {
                login.remove();
                bash.buffer.removeClass('hidden').focus();
                bash.dispatch('command-completed');
              }
            });
          }
        }).listen('command-cancelled', function(e) {
          if (e.originalEvent.mode == 'dev') {
            login.remove();
          }
        });
      } else {
        bash.log('Current Developer: <span class="yellow">' + DCS.authenticatedDeveloper + '</span>');
        bash.log('Redirecting to developer page');
        bash.progress.start();
        location.href = DCS.BASE_URL + 'index.php/developers/index';
      }
    },
    'dev logout': function() {
      if (DCS.authenticatedDeveloper.length == 0) {
        bash.log('<span class="red">No developer currently logged in</span>');
      } else {
        bash.log('Current Developer: <span class="yellow">' + DCS.authenticatedDeveloper + '</span>');
        bash.log('Signing out');
        bash.progress.start();
        bash.input.disable();
        $.ajax({
          url: DCS.BASE_URL + 'index.php/developers/sign_out',
          type: 'GET',
          success: function() {
            bash.progress.stop();
            bash.log('<span class="green">Developer signed out</span>');
            bash.input.enable();
            DCS.authenticatedDeveloper = '';
          }
        });
      }
    }
  }
};

var _secrets = {
  extend: function(name, callback) {
    bash.commands[name] = callback;
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