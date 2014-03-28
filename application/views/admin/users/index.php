<div class="admin users index">
  <header class="clearfix">
    <h1>Users Listing</h1>
    <form action="#" method="GET" class="filter">
      <select name="filter">
        <option value="1">Everyone</option>
        <option value="1">1st Years</option>
        <option value="1">2nd Years</option>
        <option value="1">3rd Years</option>
        <option value="1">4th Years</option>
        <option value="1">Faculty</option>
      </select>
      <input type="submit" value="Filter" class="button green">
    </form>
    <form action="#" method="GET" class="search">
      <input type="text" name="search" placeholder="search user" required>
      <input type="submit" value="Search" class="button green">
    </form>
  </header>

  <div class="listing">
    <?php for ($i = 0; $i < 10; $i++): ?>
    <a href="<?= site_url('admin/users/edit'); ?>">
      Arnelle Balane
      <small>Student</small>
      <div class="privileges">
        <span class="create-news" title="create news articles"></span>
        <span class="create-news" title="create news articles"></span>
        <span class="create-news" title="create news articles"></span>
      </div>
    </a>
  <?php endfor; ?>
  </div>
</div>