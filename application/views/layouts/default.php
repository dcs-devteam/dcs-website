<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('partials/head'); ?>
  <script>

    var DCS = { BASE_URL: '<?= base_url(); ?>' };

  </script>
  <title>{page_title}</title>
</head>

<body class="<?= body_classes($controller, $action); ?>">
  <div id="main-wrapper" class="default">    
    <?php if ($this->session->flashdata('alert')): ?>
        <p class="notification alert"><?=$this->session->flashdata('alert')?></p>
    <?php endif;?>

    <?php if ($this->session->flashdata('notice')): ?>
        <p class="notification notice"><?=$this->session->flashdata('notice')?></p>
    <?php endif;?>  
    
    
    
    <?php $this->load->view('partials/header'); ?>
    <div class="wrapper clearfix">
      <aside id="main-sidebar">{sidebar_content}</aside>
      <div id="main-content">{main_content}</div>
    </div>
  </div>
  <?php $this->load->view('partials/footer'); ?>
</body>
</html>