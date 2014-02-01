<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('partials/head'); ?>
  <title>Department Of Computer Science</title>
</head>

<body class="<?= body_classes($controller, $action); ?>">
  <div id="main-wrapper" class="clearfix">
    <ul id="home-navigation">
      <li>
        <a href="#">The Department</a>
        <ul>
          <li><a href="#">History</a></li>
          <li><a href="#">Summary</a></li>
          <li><a href="#">Vision</a></li>
          <li><a href="#">Mission</a></li>
        </ul>
      </li>
      <li>
        <?=anchor('/info/academic_programs', 'Academic Programs')?>
        <ul>
          <li><?=anchor('/info/academic_programs/ap-bachelor-of-science', 'Bachelor of Science')?></li>
          <li><?=anchor('/info/academic_programs/ap-master-of-science', 'Master of Science')?></li>
          <li><?=anchor('/info/academic_programs/ap-continuing-education-program', 'Continuing Education Program')?></li>
        </ul>
      </li>
      <li>
        <a href="#">Why UP Cebu DCS?</a>
        <ul>
          <li><a href="#">Center of Excellence in I.T.</a></li>
          <li><a href="#">Research</a></li>
          <li><a href="#">Service to Society</a></li>
          <li><a href="#">National Programming Rank</a></li>
          <li><a href="#">Industry Partners</a></li>
          <li><a href="#">Scholarships</a></li>
        </ul>
      </li>
      <li><a href="#">Research Lab News</a></li>
      <li>
        <a href="#">Student Highlights</a>
        <ul>
          <li><a href="#">ComSci Week</a></li>
          <li><a href="#">CodeTaBai!</a></li>
          <li><a href="#">Company Technical Talk</a></li>
          <li><a href="#">Startup Weekend</a></li>
          <li><a href="#">Programming Competition</a></li>
          <li><a href="#">Lecture Series</a></li>
        </ul>
      </li>
      <li>
        <?=anchor('/info/people','People')?>
        <ul>
          <li><?=anchor('/info/people#core_faculty','Core Faculty')?></li>
          <li><?=anchor('/info/people#affiliate_professor','Affiliate Professor')?></li>
          <li><?=anchor('/info/people#visiting_professor','Visiting Professor')?></li>
          <li><?=anchor('/info/people#lecturers','Lecturers')?></li>
          <li><?=anchor('/info/people#support_staff','Support Staff')?></li>
        </ul>
      </li>
      <li>
        <a href="#">Service to Society</a>
        <ul>
          <li><a href="#">Consultancy to LGUs</a></li>
          <li><a href="#">Trainings</a></li>
        </ul>
      </li>
      <li><a href="#">Alumni Features</a></li>
      <li><a href="#">Industry Partners</a></li>
      <li><a href="#">News and Events</a></li>
      <li><a href="#">Contact Us</a></li>
    </ul>

    <aside>
      <section id="spotlight">
        <h1>Spotlight</h1>
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
    </aside>
  </div>
  <?php $this->load->view('partials/footer'); ?>
</body>
</html>