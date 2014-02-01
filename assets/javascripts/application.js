$(document).ready(function() {
  content.initialize();
  notifications.initialize();
  textareas.initialize();
  scrollbars.initialize();
});

var content = {
  initialize: function() {
    var wrapperHeight = $('#main-wrapper').height();
    if ($('#main-content').outerHeight() < wrapperHeight) {
      $('#main-content').css({'min-height': wrapperHeight + 'px'});
    }
  }
};

var notifications = {
  initialize: function() {
    if ($('p.notification').length > 0) {
      $('p.notification').addClass('shown');
      setTimeout(function() {
        $('p.notification').removeClass('shown');
      }, 2500);
    }
  }
};

var textareas = {
  initialize: function() {
    $('textarea').autosize();
  }
};

var scrollbars = {
  initialize: function() {
    $('.custom-scrollbar').mCustomScrollbar({
      scrollInertia: 0,
      theme: 'dark-thick'
    });
  }
};