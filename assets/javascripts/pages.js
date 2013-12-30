$(document).ready(function() {
  if ($('body').hasClass('pages')) {
    parking.initialize();
  }
});



/*** PARKING PAGE ***/
var parking = {
  logHistory: null,
  logHistoryIndex: 0,
  maxLogs: 0,
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
      bash.log('Website Completion: <span class="yellow">' + websiteCompletion + '</span>');
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
    $.ajax({
      url: BASE_URL + 'index.php/polls/answer',
      type: 'POST',
      data: {id: poll.id, answer: answer},
      success: function() {
        bash.stopProgress();
        bash.enableInput();
      }
    });
  },
  retrieveLogHistory: function() {
    bash.disableInput();
    bash.startProgress(0);
    setTimeout(function() {
      bash.stopProgress();
      parking.logHistory = [
        'escape key clears buffer and returns to command mode',
        'implemented poll command in bash',
        'spinning thing in parking page',
        'refocus bash input field on click outside',
        'bash in parking page',
        'initial app configurations',
        'dcs website - initial commit'
      ];
      parking.logHistoryIndex = 0;
      parking.maxLogs = Math.floor($('#bash').outerHeight() / 15) - 1;
      if (parking.logHistory.length <= parking.maxLogs) {
        for (var i = 0; i < parking.logHistory.length; i++) {
          bash.log(parking.logHistory[i]);
        }
      } else {
        bash.history.html('');
        while (parking.logHistoryIndex < parking.maxLogs) {
          bash.log(parking.logHistory[parking.logHistoryIndex++]);
        }
        bash.setMode('log');
      }
      bash.enableInput();
    }, 5000);
  },
  authenticateDeveloper: function(username, password) {
    bash.disableInput();
    bash.log('Authenticating');
    bash.startProgress(0);
    $.ajax({
      url: BASE_URL + "index.php/developer/authenticate",
      type: 'POST',
      data: {username: username, password: password},
      success: function(data) {
        bash.stopProgress();
        if (data == 'true') {
          bash.log('<span class="green">Authentication successful</span>');
          bash.log('Redirecting to developer page');
          bash.startProgress(0);
          location.href = BASE_URL + 'index.php/developer/index';
        } else {
          bash.log('<span class="red">Authentication failed</span>');
        }
        bash.enableInput();
        bash.setMode('command');
      }
    });
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
  setMode: function(mode) {
    bash.input.data('mode', mode).val('');
    if (mode == 'command') {
      $('#bash .input span').text('$');
      $('#bash .input .developer').remove();
    } else {
      $('#bash .input span').text(':');
    }
  },
  enableInput: function() {
    $('#bash .input').removeClass('hidden').find('.command').focus();
    bash.input.on('keydown', function(e) {
      if (e.keyCode == 13) {
        e.preventDefault();
        var input = bash.input.val().trim();
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
          if (input.trim().length > 0) {
            bash.log({message: 'Sending poll answer', callback: function() {
              parking.sendPollAnswer(input.trim());
            }});
          } else {
            bash.log('You do not have an answer');
          }
          bash.setMode('command');
        } else if (bash.input.data('mode') == 'exit') {
          bash.log('<span class="blue">:</span> ' + input);
          if (input == 'yes') {
            bash.log('<span class="red">Okay :(</span>');
            bash.setMode('command');
            setTimeout(function() {
              window.close();
            }, 1000);
          } else if (input == 'no') {
            bash.log('<span class="green">Yey! :)</span>');
            bash.setMode('command');
          } else {
            bash.log('<span class="yellow">Are you sure you want to exit? (yes/no)</span>');
          }
        } else if (bash.input.data('mode') == 'dev-username') {
          bash.log('<span class="blue">:</span> ' + input);
          $('#bash .input .developer').data('username', input).removeClass('hidden').focus();
          bash.input.addClass('hidden');
          bash.log('<span class="yellow">Enter developer password</span>');
          bash.setMode('dev-password');
        }
      } else if (e.keyCode == 27) {
        bash.setMode('command');
      } else if (e.keyCode == 40 && bash.input.data('mode') == 'log' && parking.logHistoryIndex < parking.logHistory.length) {
        bash.log(parking.logHistory[parking.logHistoryIndex++]);
      } else if (e.keyCode == 38 && bash.input.data('mode') == 'log' && parking.logHistoryIndex > parking.maxLogs) {
        bash.history.find('p').last().remove();
        parking.logHistoryIndex--;
      } else {
        if (bash.input.data('mode') == 'log') {
          e.preventDefault();
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
      if (window.hasOwnProperty('poll')) {
        bash.log('<span class="yellow">' + poll.message + '</span>');
        bash.setMode('poll');
      } else {
        bash.log('<span class="red">We currently don\'t have a poll message</span>');
      }
    },
    share: function() {
      bash.log('<span class="blue">$</span> share');
      bash.log('Connecting to Facebook...');
      FB.ui({
        method: 'feed',
        name: 'DCS Website',
        caption: 'Official Website of UP Cebu\'s Department of Computer Science',
        link: BASE_URL,
        picture: BASE_URL + 'assets/images/logo-placeholder.png'
      }, 
      function(response) {
        $('#bash .history p').last().html($('#bash .history p').last().html() + '<span class="green">done</span>');
        if (response && response.post_id) {
          bash.log('<span class="green">Thank you for sharing this page</span>');
        } else {
          bash.log('<span class="red">Something went wrong while sharing this page</span>');
        }
      });
    },
    log: function() {
      bash.log('<span class="blue">$</span> log');
      bash.log({message: 'Retrieving development log history', callback: parking.retrieveLogHistory});
    },
    help: function() {
      bash.log('<span class="blue">$</span> help');
      bash.log('<span class="green">poll</span>&nbsp;&nbsp;- show current poll question');
      bash.log('<span class="green">share</span>&nbsp;- share this page on facebook');
      bash.log('<span class="green">log</span>&nbsp;&nbsp;&nbsp;- show development log history');
      bash.log('<span class="green">help</span>&nbsp;&nbsp;- show this help message');
      bash.log('<span class="green">exit</span>&nbsp;&nbsp;- leave this page');
    },
    exit: function() {
      bash.log('<span class="blue">$</span> exit');
      bash.log('<span class="yellow">Are you sure you want to exit? (yes/no)</span>');
      bash.setMode('exit');
    },
    'dev login': function() {
      bash.log('<span class="blue">$</span> dev login');
      if (authenticatedDeveloper.length == 0) {
        var developerLogin = $('<input type="password" class="developer password hidden" />');
        $('#bash .input').append(developerLogin);
        developerLogin.on('keydown', function(e) {
          if (e.keyCode == 13 || e.keyCode == 27) {
            e.preventDefault();
            if (e.keyCode == 13) {
              bash.log('<span class="blue">:</span> [HIDDEN]');
              parking.authenticateDeveloper(developerLogin.data('username'), developerLogin.val());
            }
            developerLogin.remove();
            bash.input.removeClass('hidden').focus();
            bash.setMode('command');
          }
        });
        bash.log('<span class="yellow">Enter developer username</span>');
        bash.setMode('dev-username');
      } else {
        bash.log('Current Developer: <span class="yellow">' + authenticatedDeveloper + '</span>');
        bash.log('Redirecting to developer page');
        bash.startProgress(0);
        location.href = BASE_URL + 'index.php/developer/index';
      }
    },
    'dev logout': function() {
      bash.log('<span class="blue">$</span> dev logout');
      if (authenticatedDeveloper.length == 0) {
        bash.log('<span class="red">No developer currently logged in</span>');
      } else {
        bash.log('Current Developer: <span class="yellow">' + authenticatedDeveloper + '</span>');
        bash.log('Signing out');
        bash.startProgress(0);
        bash.disableInput();
        $.ajax({
          url: BASE_URL + 'index.php/developer/sign_out',
          type: 'POST',
          success: function() {
            bash.stopProgress();
            bash.log('<span class="green">Developer signed out</span>');
            bash.enableInput();
            authenticatedDeveloper = '';
          }
        });
      }
    }
  }
};