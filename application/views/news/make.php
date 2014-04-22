<form action="<?=site_url('news/add')?>" method="POST" enctype="multipart/form-data" class="news">
  <h1>Create News Article</h1>

  <div class="field">
    <input type="text" name="title" placeholder="Article Title" required>
  </div>
  <div class="field">
    <textarea name="content" placeholder="Write something..." class="redactor" required></textarea>
  </div>
  <div class="field">
    <label>Add an image for this article <span>(optional)</span></label>
    <input type="file" name="news_image">
  </div>
  <div class="field actions">
    <input type="submit" value="Publish Article" class="button green">
  </div>
</form>