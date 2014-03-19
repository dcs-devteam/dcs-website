<section class="news-thread clearfix">
  <?php for ($i = 0; $i < 8; $i++): ?>
    <a href="<?= site_url('news/show'); ?>" class="news" style="background-image: url('<?= base_url() . 'assets/images/project1.jpg'; ?>');">
      <div class="content">
        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit.</p>
        <time>March 6, 2014</time>
      </div>
    </a>
  <?php endfor; ?>
</section>