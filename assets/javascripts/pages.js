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
    }
  },
  retrieveWebsiteStatus: function() {
    bash.startProgress(3, function() {
      bash.log('Website Status: <span class="yellow">' + websiteStatus + '</span>');
      bash.log(bash.messages[++bash.messageIndex]);
      $('#meta .loader').fadeIn(1000).removeClass('hidden');
    });
  },
  retrieveConstructionProgress: function() {
    bash.startProgress(3, function() {
      bash.log('Construction Progress: <span class="yellow">' + constructionProgress + '</span>');
      bash.log(bash.messages[++bash.messageIndex]);
      $('#meta .loader p').fadeIn(1000).removeClass('hidden');
    });
  },
  enableBash: function() {
    bash.enableInput();
  },
  sendPollAnswer: function(answer) {
    bash.disableInput();
    bash.startProgress(0);
    console.log('sending poll answer: ' + answer);
    setTimeout(function() {
      bash.stopProgress();
      bash.enableInput();
    }, 2000);
  }
};

var bash = {
  messages: [
    {message: 'Retrieving website status', callback: parking.retrieveWebsiteStatus},
    {message: 'Retrieving construction progress', callback: parking.retrieveConstructionProgress},
    {message: 'Type <span class="green">help</span> to list available commands', callback: parking.enableBash}
  ],
  messageIndex: 0,
  timer: null,
  history: null,
  input: null,
  latestMessage: null,
  initialize: function() {
    bash.history = $('#bash .history');
    bash.input = $('#bash .command');
    bash.log(bash.messages[bash.messageIndex]);
  },
  log: function(data) {
    if (typeof data == 'string') {
      data = {message: data};
    }
    bash.latestMessage = $('<p>' + data.message + '</p>');
    bash.history.append(bash.latestMessage);
    if (data.hasOwnProperty('callback') && typeof data.callback == 'function') {
      data.callback();
    }
  },
  startProgress: function(duration, callback) {
    var time = duration;
    bash.timer = setInterval(function() {
      if (duration > 0 && time-- == 0) {
        clearInterval(bash.timer);
        bash.latestMessage.html(bash.latestMessage.html() + '<span class="green">done</span>');
        if (callback && typeof callback == 'function') {
          callback();
        }
      } else {
        bash.latestMessage.text(bash.latestMessage.text() + '.');
      }
    }, 500);
  },
  stopProgress: function(callback) {
    clearInterval(bash.timer);
    bash.latestMessage.html(bash.latestMessage.html() + '<span class="green">done</span>');
    if (callback && typeof callback == 'function') {
      callback();
    }
  },
  enableInput: function() {
    $('#bash .input').removeClass('hidden').find('.command').focus();
    bash.input.on('keydown', function(e) {
      if (e.keyCode == 13) {
        e.preventDefault();
        var input = bash.input.val();
        bash.input.val('');
        if (bash.input.data('mode') == 'command') {
          if (input.length == 0) {
            bash.log('<span class="blue">$</span>');
          } else if (bash.commands.hasOwnProperty(input)) {
            bash.commands[input]();
          } else {
            bash.log('<span class="blue">$</span> ' + input);
            bash.log('<span class="red">\'' + input + '\' - invalid command</span>');
          }
        } else if (bash.input.data('mode') == 'poll') {
          bash.log('<span class="blue">:</span> ' + input);
          bash.log({message: 'Sending poll answer', callback: function() {
            parking.sendPollAnswer(input);
          }});
          bash.input.data('mode', 'command');
          $('#bash .input span').text('$');
        }
      } else if (e.keyCode == 27) {
        if (bash.input.data('mode') == 'command') {
          bash.input.val('');
        } else {
          bash.input.data('mode', 'command').val('');
          $('#bash .input span').text('$');
        }
      }
    });
    $(document).on('mouseup', function() {
      bash.input.focus();
    });
  },
  disableInput: function() {
    $('#bash .input').addClass('hidden');
    bash.input.off('keydown');
    $(document).off('mouseup');
  },
  commands: {
    poll: function() {
      bash.log('<span class="blue">$</span> poll');
      bash.log('<span class="yellow">' + poll.message + '</span>');
      bash.input.data('mode', 'poll');
      $('#bash .input span').text(':');
    },
    help: function() {
      bash.log('<span class="blue">$</span> help');
      bash.log('<span class="green">poll</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- show current poll question');
      bash.log('<span class="green">share-fb</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- share this page on facebook');
      bash.log('<span class="green">share-twitter</span>&nbsp;- share this page on twitter');
      bash.log('<span class="green">log</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- show development log history');
      bash.log('<span class="green">help</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- show this help message');
      bash.log('<span class="green">exit</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- leave this page');
    }
  }
};