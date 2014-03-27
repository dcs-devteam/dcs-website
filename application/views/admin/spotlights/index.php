<div class="admin spotlights index">
  <header>
    <h1>Spotlight Items</h1>
    <a href="<?= site_url('admin/spotlights/make'); ?>" class="button green">New Spotlight Item</a>
  </header>

  <div class="spotlights-items clearfix">
    <?php for ($i = 0; $i < 10; $i++): ?>
      <a href="#" class="item">
        <div class="image" style="background-image: url('<?= base_url() . 'assets/images/spotlights/spotlight-1.jpg'; ?>')"></div>
        <div class="content">
          <h2>Lorem Ipsum Dolor Sit Amet</h2>
          <p>Lorem ipsum Labore cupidatat mollit dolor elit nostrud quis dolore dolor non labore fugiat dolore Excepteur velit officia magna id laborum nostrud ad. Lorem ipsum Fugiat exercitation mollit eu.</p>
        </div>
      </a>
    <?php endfor; ?>
  </div>
</div>