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
  maxheight: null,
  initialize: function() {
    $('.project').hover(profile.startSlideshow, profile.endSlideShow);
    $('.project .circles-container span').click(profile.gotoSlide);    
    $('.project .project-description summary').click(function(e) {
      var th = $(this);
      if ($(this).css("max-height") != "none") {                
        profile.openDetails(th);
      } else {
        profile.closeDetails(th);
      }
    });
    $('.project .project-description summary a').click(function(e) {
      e.stopPropagation();
    });
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
  },
  openDetails: function(e) {    
    profile.maxheight = e.css("max-height");    
    e.css({"max-height" : "none"});
    e.parent().parent().parent().find(".project-pictures-container").css({"opacity":"0.5"}); 
    e.parent().parent().css({"background":"rgba(0,0,0,0.9)","color":"#FFFFFF"});
    e.parent().css({"color":"#FFFFFF"});
    e.parent().find('a').css({"color":"#FFFFFF","text-decoration" : "underline"});
    e.parent().parent().find('h2').css({"color":"#FFFFFF"});
  },
  closeDetails: function(e) {
    e.css({"max-height" : profile.maxheight});
    e.parent().parent().parent().find(".project-pictures-container").css({"opacity":"1"});
    e.parent().parent().css({"background":"#FFFFFF","color":"#333333"});
    e.parent().css({"color":"#333333"});
    e.parent().find('a').css({"color":"#222222","text-decoration" : "none"});
    e.parent().parent().find('h2').css({"color":"#333333"});
  }
};

var update = {
  prevBackground: null,
  prevProfpic: null,
  initialize: function(e) {    
    $('#new-profile-picture').click(function(e) {
      e.preventDefault();
      $('[name="profile-picture"]').click();
    });    
    $('[name="profile-picture"]').change(update.changeProfilePicture);
  },
  changeProfilePicture: function(e) {
    e.preventDefault();
    var reader = new FileReader();    
    reader.onload = function(ee) {      
      update.prevProfpic = $('#profile-picture').css('background-image');
      $('#profile-picture').css({'background-image': 'url("' + ee.target.result + '")'});            
      $('#new-profile-picture').hide();
      $('#new-profpic-button-container').show();
      $('#cancel-profile-pic').click(update.cancelProfile);
    }
    reader.readAsDataURL(this.files[0]);    
  },
  cancelProfile: function(e) {
    e.preventDefault();
    $('#profile-picture').css({'background-image': update.prevProfpic});
    $('#new-profile-picture').show();
    $('#new-profpic-button-container').hide();
  }
};
