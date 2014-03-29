<?php if ($news) : ?>
  <div class="news">    
    <header>
      <h1><?= $news->title; ?></h1>
      <h2><?=($news->firstname && $news->lastname) ? $news->firstname . " " . $news->lastname : "Anonymouse"?></h2>
      <time><?=strftime('%B %d, %Y', strtotime($news->date))?></time>
    </header>
    <?php if ($news->name != NULL) : ?>
      <img src="<?= base_url() . $news->name; ?>" />
    <?php endif; ?>
    <?= $news->content; ?>
  </div>
<?php else : ?>
  <?php show_404();?>
<?php endif; ?>