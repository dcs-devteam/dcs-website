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
        <img src="<?= base_url() . 'assets/images/up-logo.png'; ?>">
      </li>
      <li>
        <a href="<?= site_url('info/department'); ?>">The Department</a>
        <ul>
          <li><a href="<?= site_url('info/department#message-from-the-chair'); ?>">Message from the Chair</a></li>
          <li><a href="<?= site_url('info/department#history'); ?>">History</a></li>
          <li><a href="<?= site_url('info/department#mission'); ?>">Vision and Mission</a></li>
          <li><a href="<?= site_url('info/department#organizational-overview'); ?>">Organizational Overview</a></li>
          <li><a href="<?= site_url('info/department#csg'); ?>">Computer Science Guild</a></li>
          <li><a href="<?= site_url('info/department#job-openings'); ?>">Job Openings</a></li>
          <li><a href="<?= site_url('info/department#contact-us'); ?>">Contact Us</a></li>
        </ul>
      </li>
      <li>
        <a href="<?= site_url('info/admission#bs-computer-science'); ?>">Admissions</a>
        <ul>
          <li><a href="<?= site_url('info/admission#bs-computer-science'); ?>">BS Computer Science</a></li>
          <li><a href="<?= site_url('info/admission#ms-computer-science'); ?>">MS Computer Science</a></li>
          <li><a href="<?= site_url('info/admission#continuing-professional-education'); ?>">Continuing Professional Education</a></li>
        </ul>
      </li>
      <li>
        <a href="<?= site_url('info/research'); ?>">Research</a>
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
        <a href="<?= site_url('info/faculty#faculty'); ?>">People</a>
        <ul>
          <li><a href="<?= site_url('info/faculty#faculty'); ?>">Faculty</a></li>
          <!-- <li><a href="<?= site_url('#'); ?>">Alumni</a></li>
          <li><a href="<?= site_url('#'); ?>">Students</a></li> -->
        </ul>
      </li>
      <li>
        <a href="<?= site_url('info/developer_corner#developer-corner'); ?>">Life@DCS</a>
        <ul>          
          <li><a href="<?= site_url('calendar/index'); ?>">Calendar</a></li>          
          <li><a href="<?= site_url('news/index#news-and-events'); ?>">News and Events</a></li>
          <!--
          <li><a href="<?= site_url('#'); ?>">Lecture Series and Technical Talks</a></li>
          <li><a href="<?= site_url('#'); ?>">Featured Student Projects</a></li> 
          -->
          <li><a href="<?= site_url('info/developer_corner#developer-corner'); ?>">Developer Corner</a></li>
          <li><a href="<?= site_url('info/campus_activities#campus-activities'); ?>">Campus Activities</a></li>
        </ul>
      </li>
      <li>
        <a href="<?= site_url('info/initiatives_and_society'); ?>">Initiatives and Society</a>
        <ul>
          <li><a href="<?= site_url('info/initiatives_and_society#summer-code-camp'); ?>">Summer Code Camp</a></li>
          <li><a href="<?= site_url('info/initiatives_and_society#ict-skills-enhancement-program'); ?>">ICT Skills Enhancement Program</a></li>
          <li><a href="<?= site_url('info/initiatives_and_society#innovation-forum'); ?>">Innovation Forum</a></li>
        </ul>
      </li>
      <li>
        <a href="<?= site_url('info/partners'); ?>">Partners</a>
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
        <a href="https://www.facebook.com/upcebudcs/posts/604998376245695?stream_ref=10" target="_blank">
          <figure class="clearfix">
            <div class="image" style="background-image: url('<?= base_url() . 'assets/images/spotlight.jpg' ?>');"></div>
            <figcaption>
              <h2>10th NNLPRS</h2>
              <p>Congratulations to the three 4th year students, Isabella Quijano, Harriet Gonzales and Lemuel Beduya, who presented their paper together with their adviser, Prof. Kurt Junshean Espinosa, at the 10th National Natural Language Processing Research Symposium at De La Salle University last Feb 21-22, 2014.</p>
            </figcaption>
          </figure>
        </a>
      </section>

      <section id="recent-news">
        <h1>
          Recent News
          <a href="<?= site_url('news/index#news-and-events'); ?>">View All</a>
        </h1>
        <div class="news-thread custom-scrollbar">
          <?php if ($news) : ?>
            <?php foreach ($news as $n) : ?>          
              <a href="<?=site_url('news/show/'.$n->slug.'#news-and-events')?>" data-date="<?=strftime("%b %d", strtotime($n->date))?>"><?=$n->title?></a>
            <?php endforeach; ?>
          <?php else: ?>
            <a href="#" data-date="NA">No Recent News</a>
          <?php endif; ?>
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