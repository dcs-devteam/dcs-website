<div class="admin spotlights make">
  <h1>New Spotlight Item</h1>

  <form action="#" method="POST" enctype="multipart/form-data">
    <div class="field">
      <label>Title</label>
      <input type="text" name="title" required>
    </div>
    <div class="field">
      <label class="vtop">Description</label>
      <textarea name="description" required></textarea>
    </div>
    <div class="field">
      <label>URL</label>
      <input type="text" name="url" required>
    </div>
    <div class="field">
      <label>Image</label>
      <input type="file" name="image" required>
    </div>
    <div class="field actions">
      <input type="submit" value="SUbmit" class="button green">
      <a href="<?= site_url('admin/spotlights/index'); ?>" class="button maroon">Cancel</a>
    </div>
  </form>
</div>