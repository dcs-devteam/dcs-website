<section id="featured-project">
  <h1>Featured Project</h1>
  <a href="#">
    <figure class="clearfix">
      <div class="image" style="background-image: url('<?= base_url() . 'assets/images/sample-project.jpg' ?>');"></div>
      <figcaption>
        <h2>Project Title</h2>
        <p>Lorem ipsum Voluptate fugiat velit mollit incididunt fugiat velit occaecat enim dolore dolor commodo officia.</p>
      </figcaption>
    </figure>
  </a>
</section>

<section id="recent-news">
  <h1>Recent News</h1>
  <div class="news-thread custom-scrollbar">
    <?php for ($i = 0; $i < 12; $i++): ?>
      <a href="#" data-date="jan 21">here goes the news title</a>
    <?php endfor; ?>
  </div>
</section>

<section id="upcoming-events">
  <h1>Upcoming Events</h1>
  <div class="events-thread">
    <!-- <iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showDate=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;mode=AGENDA&amp;height=155&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=7kc4vluuqs77ue8onf291kgn68%40group.calendar.google.com&amp;color=%23333333&amp;ctz=Asia%2FManila" style=" border-width:0 " width="258" height="159" frameborder="0" scrolling="no"></iframe> -->
  </div>
</section>