$(document).ready(function() {
  if ($('body').hasClass('profile')) {
    profile.initialize();
  }
});

var profile = {
  interval: null,
  initialize: function() {
    $('.project').hover(profile.startSlideshow, profile.endSlideShow);
  },
  startSlideshow: function(e) {
    profile.interval = setInterval(profile.slide, 3000);
  },
  endSlideShow: function(e) {
    clearInterval(profile.interval);
  },
  slide: function(e) {
    alert('sliding');
  },

};
