$(document).ready(function() {
  notifications.initialize();
  textareas.initialize();
  scrollbars.initialize();
});

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