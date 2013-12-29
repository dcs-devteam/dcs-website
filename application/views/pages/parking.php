<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('partials/head'); ?>
  <title>Department of Computer Science</title>
  <script>
    var BASE_URL = '<?= base_url(); ?>';
    var websiteStatus = '<?= $meta["website_status"]->value; ?>';
    var constructionProgress = '<?= $meta["website_completion"]->value; ?>';
    var authenticatedDeveloper = '<?= $developer ? $developer : ""; ?>';
    <?php if ($poll): ?>
      var poll = {
        id: '<?= $poll->id; ?>',
        message: '<?= $poll->question; ?>'
      };
    <?php endif; ?>
  </script>
</head>

<body class="<?= body_classes($controller, $action); ?>">
  <div id="main-body">
    <section id="meta">
      <div class="loader hidden">
        <h1>DCS</h1>
        <p class="hidden"><?= $meta['website_completion']->value; ?></p>
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