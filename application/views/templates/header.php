<html>
    <head>
        <title>StarriAD</title>
        <link rel ="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
        <link rel ="stylesheet" href="<?php echo base_url();?>/assets/css/style.css">
        <link rel ="stylesheet" href="<?php echo base_url();?>/assets/css/sb-admin.css">
    </head>
    <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="<?php echo base_url();?>pages/admin">StarriAD</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if(!$this->session->userdata('logged_in')) : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>users/login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>users/cadastrar">Cadastro</a>
          </li>
        <?php endif; ?>
          <?php if($this->session->userdata('logged_in')) : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>users/logout">Sair</a>
          </li>
        <?php endif; ?>
      </ul>
      
    </div>
  </nav>

<div class="wrapper">

<?php if($this->session->userdata('logged_in')) : ?>
  <div id="wrapper">

<!-- Sidebar -->
<ul class="sidebar navbar-nav">
  <li class="nav-item active">
    <a class="nav-link" href="home">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Home</span>
    </a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="admin">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Criar Campanha</span></a>
  </li>
  
</ul>

<div id="content-wrapper">

  <div class="container-fluid">
<?php endif; ?>

<!-- Flash messages -->
  
  <?php if($this->session->flashdata('login_failed')) : ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
  <?php endif; ?>
  <?php if($this->session->flashdata('user_loggedout')) : ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
  <?php endif; ?>
  <?php if($this->session->flashdata('file_exists')) : ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('file_exists').'</p>'; ?>
  <?php endif; ?>
  <?php if($this->session->flashdata('invalid_file')) : ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('invalid_file').'</p>'; ?>
  <?php endif; ?>
  <?php if($this->session->flashdata('upload_success')) : ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('upload_success').'</p>'; ?>
  <?php endif; ?>
  <?php if($this->session->flashdata('upload_error')) : ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('upload_error').'</p>'; ?>
  <?php endif; ?>
  

