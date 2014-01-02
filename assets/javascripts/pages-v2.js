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
      bash.progress.start('rws', 3);
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
  },
  unlisten: function(event) {
    $(document).off(event);
  },
  activate: function() {
    bash.log('Type <span class="green">help</span> to list available commands');
    bash.input.enable();
  },
  switch: function(mode) {
    bash.mode = mode;
    bash.buffer.val('');
    $('#bash .input span').text((bash.mode == 'command') ? '$' : ':');
    bash.dispatch('mode-switched', {mode: bash.mode});
  },
  progress: {
    timer: null,
    start: function(id, duration) {
      bash.progress.timer = setInterval(function() {
        if (duration != undefined && duration-- == 0) {
          bash.progress.done(id);
        } else {
          bash.latest.text(bash.latest.text() + '.');
        }
      }, 500);
    },
    stop: function(id) {
      bash.progress.done(id);
    },
    done: function(id) {
      clearInterval(bash.progress.timer);
      bash.latest.html(bash.latest.html() + '<span class="green">done</span>');
      bash.dispatch('progress-completed-' + id);
    }
  },
  input: {
    enable: function() {
      $('#bash .input').removeClass('hidden').find('.command').focus();
      bash.buffer.off('keydown').on('keydown', function(e) {
        if (e.keyCode == 13) {
          e.preventDefault();
          var input = bash.buffer.val().trim();
          bash.buffer.val('');
          bash.log('<span class="blue">' + ((bash.mode == 'command') ? '$' : ':') + '</span> ' + input);
          bash.dispatch('buffer-submitted', {mode: bash.mode, input: input});
          bash.dispatch('buffer-submitted-' + bash.mode + '-mode', {input: input});
        }
      });
      $(document).on('mouseup', function() {
        bash.buffer.focus();
      });
    },
    disable: function() {
      $('#bash .input').addClass('hidden');
      $(document).off('mouseup');
    }
  },
  commands: {
    poll: function() {
      if (DCS.poll) {
        bash.log('<span class="yellow">' + DCS.poll.message + '</span>');
        bash.switch('poll');
        bash.listen('buffer-submitted-poll-mode', function(e) {
          if (e.originalEvent.input.length > 0) {
            bash.log('Sending poll answer');
            bash.input.disable();
            bash.progress.start('spa');
            $.ajax({
              url: DCS.BASE_URL + 'index.php/polls/answer',
              type: 'POST',
              data: {id: DCS.poll.id, answer: e.originalEvent.input},
              success: function() {
                bash.progress.stop('spa');
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
    help: function() {
      bash.log('<span class="green">poll</span>&nbsp;&nbsp;- show current poll question');
      bash.log('<span class="green">share</span>&nbsp;- share this page on facebook');
      bash.log('<span class="green">log</span>&nbsp;&nbsp;&nbsp;- show development log history');
      bash.log('<span class="green">help</span>&nbsp;&nbsp;- show this help message');
      bash.log('<span class="green">exit</span>&nbsp;&nbsp;- leave this page');
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