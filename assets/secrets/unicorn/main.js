_secrets.extend('unicorn', function() {
  bash.log('Loading unicorn');
  bash.progress.start();
  bash.input.disable();
  var stylesheet = $('<link rel="stylesheet" href="' + DCS.BASE_URL + 'assets/secrets/unicorn/unicorn.css" />');
  $('head').append(stylesheet);
  stylesheet.on('load', function() {
    var image = $('<img src="' + DCS.BASE_URL + 'assets/secrets/unicorn/unicorn.gif" class="secrets-unicorn" />');
    $('body').append(image);
    image.on('load', function(e) {
      bash.progress.stop();
      image.css({'top': window.innerHeight / 2 - 200 + 'px'});
      image.addClass('secrets-unicorn-move');
      setTimeout(function() {
        stylesheet.remove();
        image.remove();
        bash.input.enable();
      }, 3000);
    });
  });
});