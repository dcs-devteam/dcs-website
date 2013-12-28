<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('partials/head'); ?>
  <title>Department of Computer Science</title>
  <script>
    var websiteStatus = 'Under Construction';
    var constructionProgress = '12%';
    var poll = {
      id: 1,
      message: 'What features do you want to see in our website?'
    };
  </script>
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
      <div class="content">
        <div class="history"></div>
        <div class="input hidden">
          <span>$</span>
          <textarea class="command" data-mode="command"></textarea>
        </div>
      </div>
    </section>
  </div>
</body>
</html>