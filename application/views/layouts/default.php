<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('partials/head'); ?>
  <title>{page_title}</title>
</head>

<body class="<?= body_classes($controller, $action); ?>">
  <div id="main-wrapper">
    <div id="main-content">
      <header id="main-header">
        <nav>
          <p>Home</p>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Projects</a></li>
            <li><a href="#">Faculty</a></li>
            <li><a href="#">Admissions</a></li>
            <li><a href="#">About</a></li>
          </ul>
        </nav>
        <a href="#" id="sign-in">Sign In</a>
      </header>
      {main_content}
    </div>
    <aside id="main-sidebar">{sidebar_content}</aside>

    <div id="footer-placeholder"></div>
  </div>

  <footer id="main-footer" class="clearfix">
    <nav>
      <a href="#">Home</a>
      <a href="#">Projects</a>
      <a href="#">Faculty</a>
      <a href="#">Admissions</a>
      <a href="#">About</a>
    </nav>

    <div class="social-networks">
      <a href="#" class="facebook">Facebook</a>
      <a href="#" class="twitter">Twitter</a>
    </div>
  </footer>
</body>
</html>