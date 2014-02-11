$(document).ready(function() {
  notifications.initialize();
  textareas.initialize();
  scrollbars.initialize();
  menus.initialize();
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

var menus = {
  initialize: function() {
    menus.expandableMenus();
  },
  expandableMenus: function() {
    $('.expandable-menu li p').on('click', function() {
      if ($(this).closest('li').hasClass('expanded')) {
        $(this).closest('li').removeClass('expanded').find('ul').slideUp(250);
      } else {
        $('.expandable-menu .expanded').removeClass('expanded').find('ul').slideUp(250);
        $(this).closest('li').addClass('expanded').find('ul').slideDown(250);
      }
    });

    $(document).on('scroll', function() {
      if ($(document).scrollTop() > $('#main-sidebar').offset().top) {
        var top = $(document).scrollTop() - $('#main-sidebar').offset().top;
        $('#main-sidebar .expandable-menu').css({'top': top + 'px'});
      }
    });
  }
};