<div class="user-update-profile">   
  <section id="personal-info-container">
    <?=form_open("users/edit_data","POST");?>
      <h1>PERSONAL INFORMATION</h1>
      <div class="field">    
        <label>First Name</label>
        <input type="text" name="info[firstname]" placeholder="First name" value="<?=$info->firstname;?>">
      </div>
      <div class="field">    
        <label>Last Name</label>
        <input type="text" name="info[lastname]" placeholder="Last name" value="<?=$info->lastname;?>">
      </div>
      <div class="field">    
        <label>Middle Name</label>
        <input type="text" name="info[middlename]" placeholder="Middle name" value="<?=$info->middlename;?>">
      </div>
      <div class="field">    
        <label>Address</label>
        <input type="text" name="info[address]" placeholder="Address" value="<?=$info->address;?>">
      </div>
      <div class="field">    
        <label>Birthday</label>
        <input type="date" name="info[birthday]" value="<?=$info->birthday;?>">
      </div>
      <div class="field">    
        <label>Age</label>
        <input type="number" name="info[age]" min="0" max="100" placeholder="Age" value="<?=$info->age;?>">
      </div>
      <div class="field">    
        <label>Student Number</label>
        <input type="text" name="info[studentnumber]" placeholder="xxxx-xxxxx" value="<?=$info->studentnumber;?>">
      </div>
      <div class="field">    
        <label>Course</label>        
        <select name="info[course]" placeholder="Year">
          <?php foreach ($courses as $course) : ?>
          <option value="<?=$course->id?>"><?=$course->name?></option>
          <?php endforeach; ?>          
        </select>
      </div>
      <div class="field">    
        <label>Year</label>
        <input type="text" name="info[yearlevel]" min="1" max="6" placeholder="Year" value="<?=$info->yearlevel;?>">
      </div><br/><br/>
      <h1>CONTACT DETAILS</h1>
      <div class="field">    
        <label>Email</label>
        <input type="email" name="contact[email]" placeholder="Email address" value="<?=$info->email;?>">
      </div>
      <div class="field">    
        <label>Contact #</label>
        <input type="text" name="contact[number]" placeholder="Cellphone number" value="<?=$info->contact_number;?>">
      </div>
      <div class="field">    
        <label>Facebook</label>
        <input type="text" name="contact[facebook]" placeholder="Link to your facebook page" value="<?=$info->facebook;?>">
      </div>
      <div class="field">    
        <label>Twitter</label>
        <input type="text" name="contact[twitter]" placeholder="Link to your twitter page" value="<?=$info->twitter;?>">
      </div><br/>
      <div class="field">            
        <input type="submit" value="UPDATE" class="button green">
      </div>      
    <?= form_close(); ?>
  </section>
  <aside>
    <section id="profile-picture-container">  
      <div id="profile-picture" style="background: #222222 url('<?=base_url().$info->profpic?>') center center no-repeat; background-size:cover;"></div>
        <?=form_open_multipart("users/update_picture","POST");?>
          <input type="file" name="profile-picture">
          <button id="new-profile-picture" class="button green">CHANGE</button>
          <div id="new-profpic-button-container">
            <input type="submit" value="SAVE" class="button green">
            <button id="cancel-profile-pic" class="button maroon">CANCEL</button>
          </div>
        <?=form_close();?>
    </section>    
  </aside>
</div>