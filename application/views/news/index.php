<section class="news-thread clearfix">
  <header>
    <h1>News Articles</h1>
    <a href="<?= site_url('news/make'); ?>" class="button green">Add News Article</a>
  </header>
  <?php foreach ($news as $item) : ?>
    <a href="<?= site_url('news/show/'.$item->slug.'#news-and-events'); ?>" class="news" style="background-image: url('<?= ($item->name != NULL) ? base_url() . $item->name : '';?>');">
      <div class="content">
        <p><?=$item->title?></p>
        <time><?=strftime('%B %d, %Y', strtotime($item->date))?></time>
      </div>
    </a>
  <?php endforeach; ?>
</section>