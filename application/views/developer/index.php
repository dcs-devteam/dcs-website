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

      <section id="developers">
        <h3>Developers</h3>
        <input type="button" value="Add New" class="button green" data-behavior="create-item" />
        <input type="button" value="Cancel" class="button red hidden" data-behavior="cancel-creation" />
        <?= form_open('developer/create', array('class' => 'clearfix hidden')); ?>
          <input type="text" name="username" placeholder="username" required />
          <input type="password" name="password" placeholder="password" required />
          <input type="submit" value="Save" class="button green" />
        <?= form_close(); ?>
        <?php foreach ($developers as $developer): ?>
          <div class="item clearfix">
            <label><?= $developer->username; ?></label>
            <?php if ($developer->username == $this->session->userdata('developer')): ?>
              <div class="actions">
                <a href="#" data-behavior="change-password">Change Password</a>
              </div>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </section>
    </div>

    <div class="right">
      <section id="polls" class="clearfix">
        <div class="content">
          <h3>Polls</h3>
          <input type="button" value="Add New" class="button green" data-behavior="create-item" />
          <input type="button" value="Cancel" class="button red hidden" data-behavior="cancel-creation" />
          <?= form_open('polls/create', array('class' => 'clearfix hidden')); ?>
            <input type="text" name="question" placeholder="poll question" required />
            <input type="submit" value="Save" class="button green" />
          <?= form_close(); ?>
          <?php foreach ($polls as $poll): ?>
            <div class="item clearfix" data-id="<?= $poll->id; ?>">
              <label><?= $poll->question; ?></label>
              <div class="actions">
                <?= anchor('polls/delete/' . $poll->id, 'Delete'); ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="answers">
          <input type="button" value="Close" class="button red" data-behavior="close-answers" />
          <div class="clearfix"></div>
        </div>
      </section>
    </div>
  </div>
</body>
</html>