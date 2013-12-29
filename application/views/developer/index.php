<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('partials/head'); ?>
  <title>Department of Computer Science</title>
  <script>
    var BASE_URL = '<?= base_url(); ?>';
  </script>
</head>

<body class="<?= body_classes($controller, $action); ?>">
  <div id="main-body">
    <?php if ($this->session->flashdata('notice')): ?>
      <p class="notification notice"><?= $this->session->flashdata('notice'); ?></p>
    <?php elseif ($this->session->flashdata('alert')): ?>
      <p class="notification alert"><?= $this->session->flashdata('alert'); ?></p>
    <?php endif; ?>

    <div class="left">
      <section id="metas">
        <h3>Meta</h3>
        <input type="button" value="Add New" class="button green" data-behavior="create-item" />
        <input type="button" value="Cancel" class="button red hidden" data-behavior="cancel-creation" />
        <?= form_open('metas/create', array('class' => 'clearfix hidden')); ?>
            <input type="text" name="property" placeholder="property" required />
            <input type="text" name="value" placeholder="value" required />
            <input type="submit" value="Save" class="button green" />
        <?= form_close(); ?>
        <?php foreach ($metas as $meta): ?>
          <div class="item clearfix" data-property="<?= $meta->property; ?>">
            <label><?= $meta->property; ?></label>
            <p><?= $meta->value; ?></p>
            <div class="actions">
              <a href="#" data-behavior="edit-meta">Edit</a>
            </div>
          </div>
        <?php endforeach; ?>
      </section>
    </div>

    <div class="right"></div>
  </div>
</body>
</html>