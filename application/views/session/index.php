<div id="login" class="clearfix">
  <form action="<?=site_url('session/login')?>" method="POST">
    <h1>SIGN IN</h1>
    <div class="field">
      <label>Username</label>
      <input type="text" name="username" autofocus>
    </div>
    <div class="field">
      <label>Password</label>
      <input type="password" name="password">
    </div>    
    <input type="Submit" value="Login" class="button green">    
  </form>
</div>

