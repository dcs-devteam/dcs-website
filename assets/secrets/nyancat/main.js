_secrets.extend('nyancat', function() {
  bash.switch('nyancat');
  bash.input.deactivate();
  bash.log('<span class="green">[esc]</span> to quit');

  var stylesheet = $('<link rel="stylesheet" href="' + DCS.BASE_URL + 'assets/secrets/nyancat/stylesheets/styles.css" />');
  var canvas = $('<canvas id="nyancat-secret-canvas">Your browser does not support the canvas element.</canvas>');

  $('head').append(stylesheet);
  stylesheet.on('load', function() {
    $('#meta, #bash').addClass('nyancat-secret-hide');
    $('body').append(canvas);
    canvas = document.getElementById('nyancat-secret-canvas');
    canvas.width = $('#main-body').innerWidth();
    canvas.height = $('#main-body').innerHeight();

    var ctx, bg1, bg2, game, bgspeed, bgx1, bgx2,
      cat, catw, cath, catframes, catcframe, caty, catspeed, lasty, offsettop, catAteCoin = false;
    var xpos = 0, ypos = 0, framew = 100, frameh = 70, index = 0, numFrames = 6; // cat frames
    var coin, coins = [];
    var points = 0;
    var coinsound = new Audio(DCS.BASE_URL + 'assets/secrets/nyancat/sounds/smw_coin.wav'),
      bgmusic = new Audio(DCS.BASE_URL + 'assets/secrets/nyancat/sounds/Nyan Cat [original].mp3'), 
      soundfx, music;
    var rainbows = [];
    var active = true;

    function Coin() {
      this.xpos = getRandomInt(canvas.width, canvas.width + 1000);
      this.ypos = getRandomInt(32, canvas.height - 32);
      this.speed = 10;
      this.img = new Image(); 
      this.img.src = DCS.BASE_URL + 'assets/secrets/nyancat/images/coin-small.png';
      this.img.onload = function() {
        // ctx.drawImage(this.img, this.xpos, this.ypos);
      }
      this.draw = function() {
        this.xpos -= this.speed;
        if (this.xpos <= 0) {
          this.xpos = getRandomInt(canvas.width, canvas.width + 5000);
          this.ypos = getRandomInt(32, canvas.height - 32);
        }
        ctx.drawImage(this.img, this.xpos, this.ypos);
      }
      this.getX = function() {
        return this.xpos;
      }
      this.getY = function() {
        return this.ypos;
      }
    }

    function init() {
      ctx   = canvas.getContext('2d');
      ctx.font = "40px Pokemon GB";
      ctx.textAlign = "center";
      loadImages();
      initSound();
      // initSettings();
      game  = new Game();
      game.start();
    }

    function initSound() {
      coinsound.load();
      bgmusic.volume = .5;
      bgmusic.loop = true;
      bgmusic.load();
    }

    function loadImages() {
      cat     = new Image();
      cat.src   = DCS.BASE_URL + 'assets/secrets/nyancat/images/nyan-cat.png';
      cat.onload  = function() {
        ctx.drawImage(cat, 100, 100);
      }
      // bg1     = new Image();
      // bg1.src   = DCS.BASE_URL + 'assets/secrets/nyancat/images/nyan_cat_background_by_kento1-d3l6i50.jpg';
      // bg1.onload  = function() {
      //   ctx.drawImage(bg1, 0, 0);
      // }
      // bg2     = new Image();
      // bg2.src   = DCS.BASE_URL + 'assets/secrets/nyancat/images/nyan_cat_background_by_kento1-d3l6i50.jpg';
      // bg2.onload  = function() {
      //   ctx.drawImage(bg2, 0, 0);
      // }
      coin = new Coin();
      spawnCoins(20);
    }

    function spawnCoins(n) {
      for (var i = 0; i < n; i++) {
        coins[i] = new Coin();
      }
    }

    function drawCoins() {
      for (var i = 0; i < coins.length; i++) {
        coins[i].draw();
      }
    }

    function checkEat() {
      for (var i = 0; i < coins.length; i++) {
        if (coins[i].getX() <= 200) {
          if (coins[i].getY() >= caty && coins[i].getY() <= (caty+70)) {
            points++;
            coinsound.play();
            coins.splice(i, 1);
            coins.push(new Coin());
          }     
        }
      }   
    }

    window.requestAnimFrame = (function(callback) {
        return window.requestAnimationFrame || 
             window.webkitRequestAnimationFrame || 
             window.mozRequestAnimationFrame || 
             window.oRequestAnimationFrame || 
             window.msRequestAnimationFrame ||
        function(callback) {
          window.setTimeout(callback, 1000 /this.fps);
        };
    })();

    function Game() {
      this.fps  = 60;
      var score   = 0, point = 5;
      bgspeed   = 5;
      catspeed  = 8;  
      caty    = 220;
      lasty     = 220;
      bgx1    = 0;
      bgx2    = 1600;
      offsettop   = 100;

      this.start  = function() {
        startBgMusic();
        loop();
      };
      function loop() {
        if (active) {
          clearCanvas();
          moveBackground();
          drawCoins();
          checkEat();
          updateCat();
          updateScore();
          requestAnimFrame(loop);
        }
      }
      function moveBackground() {
        // bgx1 -= bgspeed;
        // bgx2 -= bgspeed;
        // if (bgx1 <= -1600)  {
        //   bgx1 = 1600;
        // } else if (bgx2 <= -1600) {
        //   bgx2 = 1600;
        // }
        // drawBackground();
      }
      function clearCanvas(){
        ctx.clearRect(0, 0, canvas.width, canvas.height);
      }
      function drawBackground() {   
        // ctx.drawImage(bg1, bgx1, bg1.y);
        // ctx.drawImage(bg2, bgx2, bg2.y);
      } 
      function updateScore() {
        ctx.strokeStyle = '000000';
        ctx.lineWidth = 6;
        ctx.strokeText(points, canvas.width - 90, 35);
        ctx.fillStyle = 'FFFFFF';
        ctx.fillText(points, canvas.width - 90, 35);
      }
      function updateCat() {
        canvas.onmousedown = function(e) {
          lasty = e.y;
          lasty -= (lasty%catspeed) + offsettop;
        }   
        if (caty != lasty) {
          if (caty < lasty) {
            caty += catspeed;
          } else if (caty > lasty) {
            caty -= catspeed;
          }
        } else {
          caty = lasty;
        }
        drawCat();
      }
      function drawCat() {
        // ctx.drawImage(cat, 100, caty);
        animateCat(100, caty);
      }
      this.getScore = function() {
        return score;
      }
      this.setScore = function(n) {
        score = n;
      }
      // var xpos = 0, ypos = 0, framew = 100, frameh = 70, index = 0, numFrames = 6;
    }

    function getRandomInt(min, max) {
      return Math.floor(Math.random() * (max - min + 1) + min);
    }

    function animateCat(posx, posy) {
      ctx.drawImage(cat, xpos, ypos, framew, frameh, posx, posy, framew, frameh);
      xpos += framew;
      index++;
      if (index >= numFrames) {
        xpos  = 0;
        ypos  = 0;
        index = 0;
      }
    }

    function startBgMusic() {
      bgmusic.addEventListener('ended', function(){
        this.currentTime = 0;
        this.play();
      }, false);
      bgmusic.play();
    }

    // function initSettings() {
    //   music = document.getElementById('music');
    //   soundfx = document.getElementById('soundfx');
    // }

    // function settings() {
    //   if (music.checked) {
    //     bgmusic.volume = .5;
    //   } else {
    //     bgmusic.volume = 0.0;
    //   }
    //   if (soundfx.checked) {
    //     coinsound.volume = 1.0;
    //   } else {
    //     coinsound.volume = 0.0;
    //   }
    // }

    init();

    bash.listen('command-cancelled-nyancat-mode', function() {
      coinsound.pause();
      coinsound.currentTime = 0;
      bgmusic.pause();
      bgmusic.currentTime = 0;
      canvas.remove();
      stylesheet.remove();
      active = false;
    });
  });
});