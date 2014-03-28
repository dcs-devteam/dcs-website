<?php if ($news) : ?>
  <div class="news">
    <header>
      <h1><?= $news->title; ?></h1>
      <h2>Arnelle Balane</h2>
      <time>March 27, 2014</time>
    </header>
    <?php if ($news->name != NULL) : ?>
      <img src="<?= base_url() . $news->name; ?>" />
    <?php endif; ?>
    <?= $news->content; ?>
  </div>
<?php else : ?>
  <?php show_404();?>  
<?php endif; ?>