<div class="admin users edit">
  <h1>Edit User Privileges</h1>

  <form action="#" method="POST">
    <div class="field">
      <label>Name</label>
      <p>Arnelle Balane</p>
    </div>
    <div class="field">
      <label class="vtop">Privileges</label>
      <div class="choices">
        <label><input type="checkbox" name="privilege[0]" value="0"><span class="create-news"></span>Privilege Name Here</label>
        <label><input type="checkbox" name="privilege[0]" value="0"><span class="create-news"></span>Privilege Name Here</label>
        <label><input type="checkbox" name="privilege[0]" value="0"><span class="create-news"></span>Privilege Name Here</label>
        <label><input type="checkbox" name="privilege[0]" value="0"><span class="create-news"></span>Privilege Name Here</label>
        <label><input type="checkbox" name="privilege[0]" value="0"><span class="create-news"></span>Privilege Name Here</label>
      </div>
    </div>
    <div class="field actions">
      <input type="submit" value="Save Changes" class="button green">
      <a href="<?= site_url('admin/users/index'); ?>" class="button maroon">Cancel</a>
    </div>
  </form>
</div>