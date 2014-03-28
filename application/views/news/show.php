<?php if ($news) : ?>
<div class="news">
  <h1><?=$news->title?></h1>
  <?php if ($news->name != NULL) : ?>
    <img src="<?= base_url() . 'assets/images/news-images/' . $news->name; ?>" />
  <?php endif; ?>
  <?=$news->content?>
</div>
<?php endif; ?>