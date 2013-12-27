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
    bash.startProgress(5, function() {
      bash.log({message: 'Website Status: Under Construction'});
      bash.log(bash.messages[++bash.messageIndex]);
    });
  },
  retrieveConstructionProgress: function() {
    bash.startProgress(0);
    setTimeout(function() {
      bash.stopProgress(function() {
        bash.log({message: 'Construction Progress: 12%'});
        bash.log(bash.messages[++bash.messageIndex]);
      });
    }, 6000);
  },
  receiveFeatureRequests: function() {
    bash.enableInput();
  }
};

var bash = {
  messages: [
    {message: 'Retrieving website status', callback: parking.retrieveWebsiteStatus},
    {message: 'Retrieving construction progress', callback: parking.retrieveConstructionProgress},
    {message: 'What features do you want to see in our website?', callback: parking.receiveFeatureRequests}
  ],
  messageIndex: 0,
  timer: null,
  history: null,
  latestMessage: null,
  initialize: function() {
    bash.history = $('#bash .history');
    bash.log(bash.messages[bash.messageIndex]);
  },
  log: function(data) {
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
        bash.latestMessage.text(bash.latestMessage.text() + 'done');
        if (callback && typeof callback == 'function') {
          callback();
        }
      } else {
        bash.latestMessage.text(bash.latestMessage.text() + '.');
      }
    }, 1000);
  },
  stopProgress: function(callback) {
    clearInterval(bash.timer);
    bash.latestMessage.text(bash.latestMessage.text() + 'done');
    if (callback && typeof callback == 'function') {
      callback();
    }
  },
  enableInput: function() {
    $('#bash .input').removeClass('hidden').find('.command').focus();
  }
};