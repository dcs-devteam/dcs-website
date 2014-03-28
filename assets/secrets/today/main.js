_secrets.extend('today', function() {
  bash.switch('today');
  bash.input.deactivate();
  bash.log('This secret is based on hereistoday.com');
  bash.log('<span class="green">[down]</span> to navigate');

  var slides = ['month', 'year', 'century', 'millenium', 'epoch', 'period', 'era', 'eon', 'earth', 'life', 'oxidation', 'fishes', 'insects', 'reptiles', 'mammals', 'birds', 'humans', 'universe', 'day'];
  var stylesheet = $('<link rel="stylesheet" href="' + DCS.BASE_URL + 'assets/secrets/today/today.css" />');
  $('head').append(stylesheet);
  stylesheet.on('load', function() {
    $('#bash').addClass('today-secret-shrink');

    var dayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    var monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var monthDays = [31, 28, 31, 30, 31, 30, 30, 31, 30, 31, 30, 31];
    var today = new Date();
    var currentDayName = dayNames[today.getDay()]
    var currentMonthName = monthNames[today.getMonth()];
    var currentDate = today.getDate();
    var currentYear = today.getFullYear();
    if (currentYear % 4 == 0 && currentYear % 100 == 0 && currentYear % 400 > 0) {
      monthDays[1] = 29;
    }
    var currentMonthDays = monthDays[today.getMonth()];
    var todayString = currentDayName + ', ' + currentMonthName + ' ' + currentDate;

    var container = $('<div class="today-secret-container"></div>');
    $('#main-body').append(container);

    var day = $('<div class="today-secret-time color-1 today-secret-current-day today-secret-current-day-persistent"></div>');
    var month = $('<div class="today-secret-time color-3"></div>');
    var monthConsumed = $('<div class="today-secret-time color-2"></div>');
    var year = $('<div class="today-secret-time color-5"></div>');
    var yearConsumed = $('<div class="today-secret-time color-7"></div>');
    var century = $('<div class="today-secret-time color-6"></div>');
    var centuryComsumed = $('<div class="today-secret-time color-4"></div>');
    var millenium = $('<div class="today-secret-time color-3 today-secret-hide-label" data-name="3rd-millenium"><label>3rd Millenium</label></div>');
    var milleniumConsumed = $('<div class="today-secret-time color-2"></div>');
    var epoch = $('<div class="today-secret-time"></div>');
    var epochConsumed = $('<div class="today-secret-time color-9  today-secret-hide-time" data-name="epoch-consumed"><time>11,500 years ago</time></div>');
    var firstMillenium = $('<div class="today-secret-time color-8 today-secret-hide-label today-secret-hide-time" data-name="1st-millenium"><label>1st Millenium</label><time>1 AD</time></div>');
    var secondMillenium = $('<div class="today-secret-time color-7 today-secret-hide-label" data-name="2nd-millenium"><label>2nd Millenium</label></div>');
    var period = $('<div class="today-secret-time"></div>');
    var pleistoceneEpoch = $('<div class="today-secret-time color-10 today-secret-hide-label today-secret-hide-time" data-name="pleistocene-epoch"><label>Pleistocene Epoch</label><time>2.588 million years ago</time></div>');
    var holoceneEpoch = $('<div class="today-secret-time color-9 today-secret-hide-label" data-name="holocene-epoch"><label>Holocene Epoch</label></div>');
    var era = $('<div class="today-secret-time"></div>');
    var paleogenePeriod = $('<div class="today-secret-time color-13 today-secret-hide-label today-secret-hide-time" data-name="paleogene-period"><label>Paleogene Period</label><time>66 million years ago</time></div>');
    var neogenePeriod = $('<div class="today-secret-time color-12 today-secret-hide-label today-secret-hide-time" data-name="neogene-period"><label>Neogene Period</label><time>23 million years ago</time></div>');
    var quaternaryPeriod = $('<div class="today-secret-time color-11 today-secret-hide-label" data-name="quaternary-period"><label>Quaternary Period</label></div>');
    var eon = $('<div class="today-secret-time"></div>');
    var paleozoicEra = $('<div class="today-secret-time color-16 today-secret-hide-label today-secret-hide-time" data-name="paleozoic-era"><label>Paleozoic Era</label><time>542 million years ago</time><div>');
    var mesozoicEra = $('<div class="today-secret-time color-15 today-secret-hide-label today-secret-hide-time" data-name="mesozoic-era"><label>Mesozoic Era</label><time>252 million years ago</time><div>');
    var cenozoicEra = $('<div class="today-secret-time color-14 today-secret-hide-label" data-name="cenozoic-era"><label>Cenozoic Era</label><div>');
    var earth = $('<div class="today-secret-time"></div>');
    var hadeanEon = $('<div class="today-secret-time color-20 today-secret-hide-label today-secret-hide-time" data-name="hadean-eon"><label>Hadean Eon</label><time>4540 million years ago</time></div>');
    var archeanEon = $('<div class="today-secret-time color-19 today-secret-hide-label" data-name="archean-eon"><label>Archean Eon</label></div>');
    var protorezoicEon = $('<div class="today-secret-time color-18 today-secret-hide-label today-secret-hide-time" data-name="protorezoic-eon"><label>Protorezoic Eon</label><time>2500 million years ago</time></div>');
    var phanerozoicEon = $('<div class="today-secret-time color-17 today-secret-hide-label" data-name="phanerozoic-eon"><label>Phanerozoic Eon</label></div>');
    var secondaryBar = $('<div class="today-secret-time color-21 today-secret-secondary-bar"></div>');
    var universe = $('<div class="today-secret-time"></div>');
    var universeConsumed = $('<div class="today-secret-time color-3 today-secret-hide-time" data-name="universe-consumed"><time>13798 million years ago</time></div>');
    var birthOfEarth = $('<div class="today-secret-time color-13 today-secret-hide-time" data-name="birth-of-earth"><time>4540 million years ago</time></div>');
    var anotherToday = $('<div class="today-secret-time color-1"></div>');

    month.append(monthConsumed).append(day);
    year.append(yearConsumed).append(month);
    century.append(centuryComsumed).append(year);
    millenium.append(milleniumConsumed).append(century);
    epoch.append(epochConsumed).append(firstMillenium).append(secondMillenium).append(millenium);
    period.append(pleistoceneEpoch).append(holoceneEpoch).append(epoch);
    era.append(paleogenePeriod).append(neogenePeriod).append(quaternaryPeriod).append(period);
    eon.append(paleozoicEra).append(mesozoicEra).append(cenozoicEra).append(era);
    earth.append(hadeanEon).append(archeanEon).append(protorezoicEon).append(phanerozoicEon).append(eon);
    universe.append(universeConsumed).append(birthOfEarth).append(anotherToday).append(earth);
    container.append(universe).append(secondaryBar);

    monthConsumed.css({'width': '0%'});
    yearConsumed.css({'width': '0%'});
    centuryComsumed.css({'width': '0%'});
    milleniumConsumed.css({'width': '0%'});
    epochConsumed.css({'width': '0%'});
    firstMillenium.css({'width': '0%'});
    secondMillenium.css({'width': '0%'});
    pleistoceneEpoch.css({'width': '0%'});
    holoceneEpoch.css({'width': '0%'});
    paleogenePeriod.css({'width': '0%'});
    neogenePeriod.css({'width': '0%'});
    quaternaryPeriod.css({'width': '0%'});
    paleozoicEra.css({'width': '0%'});
    mesozoicEra.css({'width': '0%'});
    cenozoicEra.css({'width': '0%'});
    hadeanEon.css({'width': '0%'});
    archeanEon.css({'width': '0%'});
    protorezoicEon.css({'width': '0%'});
    phanerozoicEon.css({'width': '0%'});
    universeConsumed.css({'width': '0%'});
    birthOfEarth.css({'width': '0%'});
    anotherToday.css({'width': '0%'});

    var title = $('<h1>Here is today</h1>');
    var subtitle = $('<h2>' + todayString + '</h2>');
    container.prepend(title).append(subtitle);

    setTimeout(function() {
      container.addClass('today-secret-container-shown');
    }, 0);

    bash.listen('down-key-pressed-today-mode', function() {
      var slide = slides.shift();
      if (slide == 'month') {
        monthConsumed.css({'width': ((currentDate - 1) / currentMonthDays * 100) + '%'});
        day.css({'width': (1 / currentMonthDays * 100) + '%'});
        title.text('Here is this month');
        subtitle.text(currentMonthName);
      } else if (slide == 'year') {
        yearConsumed.css({'width': (today.getMonth() / 12 * 100) + '%'});
        month.css({'width': (1 / 12 * 100) + '%'});
        title.text('Here is this year');
        subtitle.text(currentYear);
      } else if (slide == 'century') {
        centuryComsumed.css({'width': (currentYear % 100 - 1) + '%'});
        year.css({'width': '1%'});
        title.text('Here is this century');
        subtitle.text('21st Century');
      } else if (slide == 'millenium') {
        milleniumConsumed.css({'width': (0 / 10 * 100) + '%'});
        century.css({'width': '10%'});
        title.text('Here is this millenium');
        subtitle.text('3rd Millenium');
      } else if (slide == 'epoch') {
        epochConsumed.css({'width': (9 / 12 * 100) + '%'}).removeClass('today-secret-hide-time');
        firstMillenium.css({'width': (1 / 12 * 100) + '%'}).removeClass('today-secret-hide-label today-secret-hide-time');
        secondMillenium.css({'width': (1 / 12 * 100) + '%'}).removeClass('today-secret-hide-label');
        millenium.css({'width': (1 / 12 * 100) + '%'}).removeClass('today-secret-hide-label');
        title.text('Here is this epoch');
        subtitle.text('Holocene Epoch');
      } else if (slide == 'period') {
        epochConsumed.addClass('today-secret-hide-time');
        firstMillenium.addClass('today-secret-hide-label today-secret-hide-time');
        secondMillenium.addClass('today-secret-hide-label');
        millenium.addClass('today-secret-hide-label');
        day.removeClass('today-secret-current-day-persistent');
        epoch.css({'width': '0%'});
        pleistoceneEpoch.css({'width': (1113 / 1120 * 100) + '%'}).removeClass('today-secret-hide-label today-secret-hide-time');
        holoceneEpoch.css({'width': (7 / 1120 * 100) + '%'}).removeClass('today-secret-hide-label');
        title.text('Here is this period');
        subtitle.text('Quaternary Period');
      } else if (slide == 'era') {
        pleistoceneEpoch.addClass('today-secret-hide-label today-secret-hide-time');
        holoceneEpoch.addClass('today-secret-hide-label');
        period.css({'width': '0%'});
        paleogenePeriod.css({'width': (725 / 1120 * 100) + '%'}).removeClass('today-secret-hide-label today-secret-hide-time');
        neogenePeriod.css({'width': (335 / 1120 * 100) + '%'}).removeClass('today-secret-hide-label today-secret-hide-time');
        quaternaryPeriod.css({'width': (60 / 1120 * 100) + '%'}).removeClass('today-secret-hide-label');
        title.text('Here is this era');
        subtitle.text('Cenozoic Era');
      } else if (slide == 'eon') {
        paleogenePeriod.addClass('today-secret-hide-label today-secret-hide-time');
        neogenePeriod.addClass('today-secret-hide-label today-secret-hide-time');
        quaternaryPeriod.addClass('today-secret-hide-label');
        era.css({'width': '0%'});
        paleozoicEra.css({'width': (605 / 1120 * 100) + '%'}).removeClass('today-secret-hide-label today-secret-hide-time');
        mesozoicEra.css({'width': (380 / 1120 * 100) + '%'}).removeClass('today-secret-hide-label today-secret-hide-time');
        cenozoicEra.css({'width': (135 / 1120 * 100) + '%'}).removeClass('today-secret-hide-label');
        title.text('Here is this eon');
        subtitle.text('Phanerozoic Eon');
      } else if (slide == 'earth') {
        paleozoicEra.addClass('today-secret-hide-label today-secret-hide-time');
        mesozoicEra.addClass('today-secret-hide-label today-secret-hide-time');
        cenozoicEra.addClass('today-secret-hide-label');
        eon.css({'width': '0%'});
        hadeanEon.css({'width': (135 / 1120 * 100) + '%'}).removeClass('today-secret-hide-label today-secret-hide-time');
        archeanEon.css({'width': (370 / 1120 * 100) + '%'}).removeClass('today-secret-hide-label');
        protorezoicEon.css({'width': (480 / 1120 * 100) + '%'}).removeClass('today-secret-hide-label today-secret-hide-time');
        phanerozoicEon.css({'width': (135 / 1120 * 100) + '%'}).removeClass('today-secret-hide-label');
        title.text('Here is the earth');
        subtitle.text('');
      } else if (slide == 'life') {
        hadeanEon.addClass('today-secret-hide-label today-secret-hide-time');
        archeanEon.addClass('today-secret-hide-label');
        protorezoicEon.addClass('today-secret-hide-label today-secret-hide-time');
        phanerozoicEon.addClass('today-secret-hide-label');
        universe.css({'height': '50%'});
        secondaryBar.css({'width': (905 / 1120 * 100) + '%', 'height': '50%'}).attr('data-time', '3600 million years ago');
        title.text('Here is life');
      } else if (slide == 'oxidation') {
        secondaryBar.css({'width': (615 / 1120 * 100) + '%'}).attr('data-time', '2500 million years ago');
        title.text('Here is oxidation');
      } else if (slide == 'fishes') {
        secondaryBar.css({'width': (122 / 1120 * 100) + '%'}).attr('data-time', '500 million years ago');
        title.text('Here are fishes');
      } else if (slide == 'insects') {
        secondaryBar.css({'width': (100 / 1120 * 100) + '%'}).attr('data-time', '400 million years ago');
        title.text('Here are insects');
      } else if (slide == 'reptiles') {
        secondaryBar.css({'width': (77 / 1120 * 100) + '%'}).attr('data-time', '300 million years ago');
        title.text('Here are reptiles');
      } else if (slide == 'mammals') {
        secondaryBar.css({'width': (50 / 1120 * 100) + '%'}).attr('data-time', '200 million years ago');
        title.text('Here are mammals');
      } else if (slide == 'birds') {
        secondaryBar.css({'width': (34 / 1120 * 100) + '%'}).attr('data-time', '150 million years ago');
        title.text('Here are birds');
      } else if (slide == 'humans') {
        secondaryBar.css({'width': (3 / 1120 * 100) + '%'}).attr('data-time', '200,000 years ago');
        title.text('Here are humans');
      } else if (slide == 'universe') {
        universe.css({'height': '100%'});
        secondaryBar.css({'height': '0%'}).attr('data-time', '');
        earth.css({'width': '0%'});
        universeConsumed.css({'width': (745 / 1120 * 100) + '%'}).removeClass('today-secret-hide-time');
        birthOfEarth.css({'width': (375 / 1120 * 100) + '%'}).removeClass('today-secret-hide-time');
        title.text('Here is the universe');
      } else if (slide == 'day') {
        universeConsumed.css({'width': '0%'}).addClass('today-secret-hide-time');
        birthOfEarth.css({'width': '0%'}).addClass('today-secret-hide-time');
        anotherToday.css({'width': '100%'});
        title.text('And here is today');
        subtitle.text(todayString);
      } else if (slide == undefined) {
        $('.today-secret-container h1, .today-secret-container h2').fadeOut(500);
        $('.today-secret-container').removeClass('today-secret-container-shown');
        $('#bash').removeClass('today-secret-shrink');
        setTimeout(function() {
          container.remove();
          stylesheet.remove();
        }, 300);
        bash.dispatch('command-completed');
      }
    });
    bash.listen('command-cancelled-today-mode', function() {
      container.remove();
      stylesheet.remove();
      $('#bash').removeClass('today-secret-shrink');
    });
  });
});