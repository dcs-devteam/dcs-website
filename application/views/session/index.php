<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('partials/head.php'); ?>
  <title>Department of Computer Science</title>

</head>
<body class="<?= body_classes($controller, $action); ?>">
  <div id="main-wrapper" class="clearfix">
    <form action="#" method="POST" id="login-form">
      <h1>Department of Computer Science</h1>
      <div class="field">
        <label>Username</label>
        <input type="text" name="username" id="username-box" class="box">
      </div>
      <div class="field">
        <label>Password</label>
        <input type="password" name="password" class="box">
      </div>
      <div class="submit-container clearfix">
        <input type="Submit" value="Login" class="button">
      </div>
    </form>
  </div>
  <?php $this->load->view('partials/footer.php'); ?>
</body>
</html> 

