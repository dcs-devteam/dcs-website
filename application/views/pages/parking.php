<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('partials/head'); ?>
  <title>Department of Computer Science</title>
</head>

<body class="<?= body_classes($controller, $action); ?>">
  <div id="main-body">
    <section id="meta">
      <div class="loader hidden">
        <h1>DCS</h1>
        <p class="hidden">12%</p>
        <div class="spinner clockwise" id="spinner-1"></div>
        <div class="spinner counterclockwise" id="spinner-2"></div>
      </div>
    </section>

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