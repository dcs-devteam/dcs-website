<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('partials/head'); ?>
  <title>Department of Computer Science</title>
</head>

<body class="<?= body_classes($controller, $action); ?>">
  <div id="main-body">
    <section id="bash">
      <div class="history"></div>
      <div class="input hidden">
        <span>$</span>
        <textarea class="command"></textarea>
      </div>
    </section>
  </div>
</body>
</html>