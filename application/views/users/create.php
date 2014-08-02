<div class="create">  
  <form action="#" method="POST">
    <h1>Create Account</h1>
    <div class="field"> 
      <label>Email</label>
      <input type="email" name="email"/>
    </div>
    <div class="field">
      <label>Type</label>
      <select name="type">
        <?php foreach ($role_list as $role) : ?>
          <option value="<?=$role->id?>"><?=humanize($role->name)?></option>
        <?php endforeach; ?>
      </select>
    </div>    
    <div class="field">
      <label class="vtop">Privilege</label>      
      <div class="check-list">
        <?php foreach ($privilege_list as $privilege) : ?>
        <span class="item">
          <input type="checkbox" name="privilege[<?=$privilege->id?>]" value="<?=$privilege->id?>" id="privilege<?=$privilege->id?>">
          <label for="privilege<?=$privilege->id?> "><?=humanize($privilege->name)?></label>
        </span>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="field">
      <input type="submit" value="Create" class="button green">
    </div>
  </form>
</div>