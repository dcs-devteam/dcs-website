<div class="user-update-profile" style="background: #ffffff url('<?=base_url()?>assets/images/background.png') center center no-repeat fixed; background-size:cover;">
  <?=form_open_multipart("#","POST");?>
    <input type="file" name="background_image">
    <button id="new-background-image" class="button green">CHANGE BACKGROUND IMAGE</button>    
    <div id="background-button-container">
      <input type="submit" id="saveBackground" class="button green" value="SAVE NEW BACKGROUND">
      <button id="cancelBackground" class="button maroon">CANCEL</button>
    </div>
  <?=form_close();?>
  <section id="personal-info-container">
    <form action="#" method="POST">
      <h1>PERSONAL INFORMATION</h1>
      <div class="field">    
        <div class="title"><label>First Name</label></div>
        <div class="value"><input type="text" name="firstname"></div>
      </div>
      <div class="field">    
        <div class="title"><label>Last Name</label></div>
        <div class="value"><input type="text" name="lastname"></div>
      </div>
      <div class="field">    
        <div class="title"><label>Address</label></div>
        <div class="value"><input type="text" name="address"></div>
      </div>
      <div class="field">    
        <div class="title"><label>Birthday</label></div>
        <div class="value"><input type="date" name="birthday"></div>
      </div>
      <div class="field">    
        <div class="title"><label>Age</label></div>
        <div class="value"><input type="number" name="age" min="0" max="100"></div>
      </div>
      <div class="field">    
        <div class="title"><label>Year</label></div>
        <div class="value"><input type="number" name="year" min="1" max="6"></div>
      </div><br/>
      <h1>CONTACT DETAILS</h1>
      <div class="field">    
        <div class="title"><label>Facebook</label></div>
        <div class="value"><input type="url" name="facebook" placeholder="Link to your facebook page"></div>
      </div><br/>
      <div class="field">    
        <div class="title"><label>Twitter</label></div>
        <div class="value"><input type="url" name="facebook" placeholder="Link to your twitter page"></div>
      </div><br/>
    </form>
  </section>
  <aside>
    <section id="profile-picture-container">  
      <div id="profile-picture"></div>
      <?=form_open_multipart("#","POST");?>
        <input type="file" id="new-profile-picture">
        <button id="testing">TEst</button>
      <?=form_close();?>
    </section>    
  </aside>
</div>