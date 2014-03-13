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
        <a href="<?= site_url('#'); ?>">The Department</a>
        <ul>
          <li><a href="<?= site_url('#'); ?>">Message from the Chair</a></li>
          <li><a href="<?= site_url('#'); ?>">History</a></li>
          <li><a href="<?= site_url('#'); ?>">Vision and Mission</a></li>
          <li><a href="<?= site_url('#'); ?>">Organizational Overview</a></li>
          <li><a href="<?= site_url('#'); ?>">Job Openings</a></li>
          <li><a href="<?= site_url('#'); ?>">Contact Us</a></li>
        </ul>
      </li>
      <li>
        <a href="<?= site_url('#'); ?>">Admissions</a>
        <ul>
          <li><a href="<?= site_url('#'); ?>">BS Computer Science</a></li>
          <li><a href="<?= site_url('#'); ?>">MS Computer Science</a></li>
          <li><a href="<?= site_url('#'); ?>">Continuing Professional Education</a></li>
        </ul>
      </li>
      <li>
        <a href="<?= site_url('#'); ?>">Research</a>
        <ul>
          <li><a href="<?= site_url('info/research#bioinformatics'); ?>">Bioinformatics Research Interest Group</a></li>
          <li><a href="<?= site_url('info/research#computer-vision'); ?>">Computer Vision Research Group</a></li>
          <li><a href="<?= site_url('info/research#software-engineering'); ?>">Software Engineering Research Group</a></li>
          <li><a href="<?= site_url('info/research#natural-language-processing'); ?>">Natural Language Processing Research Group</a></li>
          <li><a href="<?= site_url('info/research#machine-learning'); ?>">Machine Learning Research Group</a></li>
          <li><a href="<?= site_url('info/research#algorithms-and-complexity'); ?>">Algorithms and Complexity Reseach Group</a></li>
        </ul>
      </li>
      <li>
        <a href="<?= site_url('#'); ?>">People</a>
        <ul>
          <li><a href="<?= site_url('#'); ?>">Faculty</a></li>
          <li><a href="<?= site_url('#'); ?>">Alumni</a></li>
          <li><a href="<?= site_url('#'); ?>">Students</a></li>
        </ul>
      </li>
      <li>
        <a href="<?= site_url('#'); ?>">Life@DCS</a>
        <ul>
          <li><a href="<?= site_url('#'); ?>">News and Events</a></li>
          <li><a href="<?= site_url('#'); ?>">Lecture Series and Technical Talks</a></li>
          <li><a href="<?= site_url('#'); ?>">Featured Student Projects</a></li>
          <li><a href="<?= site_url('info/developer_corner#developer-corner'); ?>">Developer Corner</a></li>
          <li><a href="<?= site_url('#'); ?>">Campus Activities</a></li>
        </ul>
      </li>
      <li>
        <a href="<?= site_url('#'); ?>">Initiatives and Society</a>
        <ul>
          <li><a href="<?= site_url('info/initiatives_and_society#summer-code-camp'); ?>">Summer Code Camp</a></li>
          <li><a href="<?= site_url('info/initiatives_and_society#ict-skills-enhancement-program'); ?>">ICT Skills Enhancement Program</a></li>
          <li><a href="<?= site_url('info/initiatives_and_society#innovation-forum'); ?>">Innovation Forum</a></li>
        </ul>
      </li>
      <li>
        <a href="<?= site_url('#'); ?>">Partners</a>
        <ul>
          <li><a href="<?= site_url('info/partners#industry'); ?>">Industry</a></li>
          <li><a href="<?= site_url('info/partners#government-agencies'); ?>">Government Agencies</a></li>
          <li><a href="<?= site_url('info/partners#ngo'); ?>">NGO</a></li>
          <li><a href="<?= site_url('info/partners#universities'); ?>">Universities</a></li>
        </ul>
      </li>
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
        <h1>
          Recent News
          <a href="<?= site_url('news/index'); ?>">View All</a>
        </h1>
        <div class="news-thread custom-scrollbar">
          <?php for ($i = 0; $i < 12; $i++): ?>
            <a href="#" data-date="jan 21">here goes the news title</a>
          <?php endfor; ?>
        </div>
      </section>

      <section id="upcoming-events">
        <h1>
          Upcoming Events
          <a href="<?= site_url('calendar/index'); ?>">View Calendar</a>
        </h1>
        <div class="events-thread">
          <iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showDate=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;mode=AGENDA&amp;height=155&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=7kc4vluuqs77ue8onf291kgn68%40group.calendar.google.com&amp;color=%23333333&amp;ctz=Asia%2FManila" style=" border-width:0 " width="258" height="159" frameborder="0" scrolling="no"></iframe>
        </div>
      </section>
    </aside>
  </div>
  <?php $this->load->view('partials/footer'); ?>
</body>
</html>