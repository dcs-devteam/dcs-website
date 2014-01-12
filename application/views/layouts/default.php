<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('partials/head'); ?>
  <title>{page_title}</title>
</head>

<body class="<?= body_classes($controller, $action); ?>">
  <div id="main-content">{main_content}</div>
  <aside id="main-sidebar">{sidebar_content}</aside>
</body>
</html>