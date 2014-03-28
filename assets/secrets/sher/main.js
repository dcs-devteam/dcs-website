_secrets.extend('sher', function() {
  bash.switch('sher');
  bash.input.deactivate();

  var width = $('#main-body').innerWidth();
  var height = $('#main-body').innerHeight();

  var stylesheet = $('<link rel="stylesheet" href="' + DCS.BASE_URL + 'assets/secrets/sher/sher.css" />');
  var video = $('<video width="' + width + '" height="' + height + '" src="' + DCS.BASE_URL + 'assets/secrets/sher/videos/video.mp4" autobuffer autoplay></video>');

  $('head').append(stylesheet);
  $('body').append(video);

  function videoEnded() {
    video.remove();
    stylesheet.remove();
    bash.dispatch('command-completed');
  }

  video.on('ended', videoEnded);
  bash.listen('command-cancelled-sher-mode', videoEnded);
});