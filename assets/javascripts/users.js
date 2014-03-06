$(document).ready(function() {
  if ($('body').hasClass('profile')) {
    profile.initialize();
  }
  if ($('body').hasClass('update_profile')) {
    update.initialize();
  }
});

var profile = {
  interval: null,
  initialize: function() {
    $('.project').hover(profile.startSlideshow, profile.endSlideShow);
    $('.project .circles-container span').click(profile.gotoSlide);
  },
  startSlideshow: function(e) {
    var _this = $(this);
    profile.interval = setInterval(
      function() {
        profile.slide(_this);
      }, 
    2000);
  },
  endSlideShow: function(e) {
    clearInterval(profile.interval);
  },
  slide: function(e) {        
    var container = e.find('.project-pictures-container');
    var circles = e.find('.circles-container');
    var cur = circles.find('.current');
    var num = (cur.data('number') + 1) % circles.children().length;
    cur.removeClass('current');
    circles.find("[data-number='"+num+"']").addClass('current');
    container.css({'margin-left':num*-300});    
  },
  gotoSlide: function(e) {
    clearInterval(profile.interval);
    var parent1 = $(this).parent();
    parent1.find('.current').removeClass('current');
    $(this).addClass('current');
    parent1.parent().find('.project-pictures-container').css({'margin-left':$(this).data('number') * -300});
  }
};

var update = {
  prevBackground: null,
  initialize: function(e) {
    $('#new-background-image').click(function(e) {
      e.preventDefault();
      $('[name="background_image"]').click();
    });   
    $('[name="background_image"]').change(update.changeBackground);
    $('#new-profile-picture').change(update.changeProfilePicture);
  },
  changeProfilePicture: function(e) {
    var reader = new FileReader();    
    reader.onload = function(ee) {      
      $('#profile-picture').css({'background-image': 'url("' + ee.target.result + '")'});
    }
    reader.readAsDataURL(this.files[0]);    
  },
  changeBackground: function(e) {
    var reader = new FileReader();    
    reader.onload = function(ee) {
      update.prevBackground = $('.user-update-profile').css('background-image'); 
      console.log(update.prevBackground);
      $('.user-update-profile').css({'background-image': 'url("' + ee.target.result + '")'});
      $('#new-background-image').hide();
      $('#background-button-container').show();
      $('#cancelBackground').click(update.cancelBackground);
    }
    reader.readAsDataURL(this.files[0]);
  },
  cancelBackground: function(e) {
    e.preventDefault();
    $('.user-update-profile').css({'background-image': update.prevBackground});
    $('#background-button-container').hide();
    $('#new-background-image').show();
  }
};
