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
  <div class="news-thread">
    <?php for ($i = 0; $i < 12; $i++): ?>
      <a href="#" data-date="jan 21">here goes the news title</a>
    <?php endfor; ?>
  </div>
</section>