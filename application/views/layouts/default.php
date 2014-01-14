<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('partials/head'); ?>
  <title>{page_title}</title>
</head>

<body class="<?= body_classes($controller, $action); ?>">
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
    </header>
    {main_content}
  </div>
  <aside id="main-sidebar">{sidebar_content}</aside>
</body>
</html>