<section class="news-thread clearfix">
  <header>
    <h1>News Articles</h1>
    <?php if ($canWrite) : ?>
      <a href="<?= site_url('news/make#news-and-events'); ?>" class="button green">Add News Article</a>
    <?php endif; ?>
  </header>
  <?php foreach ($news as $item) : ?>
    <?php $background = ($item->name != NULL) ? base_url() . $item->name : base_url() . 'assets/images/news-images/default.png'; ?>
    <a href="<?= site_url('news/show/'.$item->slug.'#news-and-events'); ?>" class="news" style="background-image: url('<?= $background; ?>');">
      <div class="content">
        <p><?=$item->title?></p>
        <time><?=strftime('%B %d, %Y', strtotime($item->date))?></time>
      </div>
    </a>
  <?php endforeach; ?>

  <?php if (empty($news)): ?>
    <h2 class="empty-thread">There are currently no news articles.</h2>
  <?php endif; ?>
</section>