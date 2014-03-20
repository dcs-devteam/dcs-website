<div class="user-update-profile">   
  <section id="personal-info-container">
    <?=form_open("users/edit_data","POST");?>
      <h1>PERSONAL INFORMATION</h1>
      <div class="field">    
        <label>First Name</label>
        <input type="text" name="firstname" placeholder="First name" value="Emmanuel">
      </div>
      <div class="field">    
        <label>Last Name</label>
        <input type="text" name="lastname" placeholder="Last name" value="Lodovice">
      </div>      
      <div class="field">    
        <label>Address</label>
        <input type="text" name="address" placeholder="Address" value="Jampang, Argao, Cebu">
      </div>
      <div class="field">    
        <label>Birthday</label>
        <input type="date" name="birthday" value"2013-09-24 00:50:45">
      </div>
      <div class="field">    
        <label>Age</label>
        <input type="number" name="age" min="0" max="100" placeholder="Age" value="18">
      </div>
      <div class="field">    
        <label>Student Number</label>
        <input type="text" name="student_number" placeholder="xxxx-xxxxx" value="2011-37567">
      </div>
      <div class="field">    
        <label>Course</label>        
        <select name="course" placeholder="Year">
          <option value="1">BS Computer Science</option>
          <option value="2">MS Computer Science</option>
        </select>
      </div>
      <div class="field">    
        <label>Year</label>
        <input type="number" name="year" min="1" max="6" placeholder="Year" value="3">
      </div><br/><br/>
      <h1>CONTACT DETAILS</h1>
      <div class="field">    
        <label>Email</label>
        <input type="email" name="email" placeholder="Email address" value="name3anad@gmail.com">
      </div>
      <div class="field">    
        <label>Contact #</label>
        <input type="text" name="number" placeholder="Cellphone number" value="09229365294">
      </div>
      <div class="field">    
        <label>Facebook</label>
        <input type="url" name="facebook" placeholder="Link to your facebook page" value="http://www.facebook.com/nameANAD">
      </div>
      <div class="field">    
        <label>Twitter</label>
        <input type="url" name="twiiter" placeholder="Link to your twitter page" value="http://www.twitter.com/nameanad">
      </div><br/>
      <div class="field">            
        <input type="submit" value="UPDATE" class="button green">
      </div>      
    <?= form_close(); ?>
  </section>
  <aside>
    <section id="profile-picture-container">  
      <div id="profile-picture" style="background: #222222 url('<?=base_url()?>assets/images/up-logo.png') center center no-repeat; background-size:cover;"></div>
        <?=form_open_multipart("#","POST");?>
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