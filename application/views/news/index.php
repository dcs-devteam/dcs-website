<section class="news-thread clearfix">
  <?php foreach ($news as $item) : ?>
    <a href="<?= site_url('news/show/'.$item->slug); ?>" class="news" style="background-image: url('<?= ($item->name != NULL) ? base_url() . $item->name : '';?>');">
      <div class="content">
        <p><?=$item->title?></p>
        <time><?=strftime('%B %d, %Y', strtotime($item->date))?></time>
      </div>
    </a>
  <?php endforeach; ?>
</section>