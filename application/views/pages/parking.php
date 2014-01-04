<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('partials/head'); ?>
  <title>Department of Computer Science</title>
  <script>
    var DCS = {
      BASE_URL: '<?= base_url(); ?>',
      websiteStatus: '<?= ($meta["website_status"]) ? $meta["website_status"]->value : ""; ?>',
      websiteCompletion: '<?= ($meta["website_completion"]) ? $meta["website_completion"]->value : ""; ?>',
      authenticatedDeveloper: '<?= $developer ? $developer : ""; ?>'
    };
    <?php if ($poll): ?>
      DCS['poll'] = {
        id: '<?= $poll->id; ?>',
        message: '<?= $poll->question; ?>'
      };
    <?php endif; ?>
  </script>
</head>

<body class="<?= body_classes($controller, $action); ?>">
  <div id="fb-root"></div>

  <div id="main-body">
    <section id="meta">
      <div class="loader hidden">
        <h1>DCS</h1>
        <p><?= ($meta['website_completion']) ? $meta['website_completion']->value : ''; ?></p>
        <div class="spinner clockwise" id="spinner-1"></div>
        <div class="spinner counterclockwise" id="spinner-2"></div>
      </div>
    </section>

    <section id="bash">
      <div class="content">
        <div class="history"></div>
        <div class="input hidden">
          <span>$</span>
          <textarea class="command"></textarea>
        </div>
      </div>
    </section>
  </div>

  <?php $this->load->view('partials/api'); ?>
  <?php foreach ($secrets as $secret): ?>
    <script src="<?= $secret->script_path; ?>"></script>
  <?php endforeach; ?>
</body>
</html>