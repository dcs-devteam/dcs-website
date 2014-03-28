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
        <option value="student">Student</option>
        <option value="faculty">Faculty</option>
      </select>
    </div>
    <div class="field">
      <label class="vtop">Privilege</label>      
      <div class="check-list">
        <span class="item">
          <input type="checkbox" name="privilege[]" value="1" id="1">
          <label for="1">Create Event/News</label>
        </span>
        <span class="item">
          <input type="checkbox" name="privilege[]" value="2" id="2">
          <label for="2">Manage Project</label>
        </span>
        <span class="item">
          <input type="checkbox" name="privilege[]" value="2" id="3">
          <label for="3">Manage Project</label>
        </span>
        <span class="item">
          <input type="checkbox" name="privilege[]" value="2" id="4">
          <label for="4">Manage Style</label>
        </span>
      </div>
    </div>
    <div class="field">
      <input type="submit" value="Create" class="button green">
    </div>
  </form>
</div>