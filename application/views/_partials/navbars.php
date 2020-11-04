<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/">Shop</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <?php if(!empty($this->session->userdata("email"))){ ?>
          <li class="nav-item">
            <a class="nav-link"></a>
          </li>
          <li class="nav-item">
            <div class="dropdown">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                <?php echo $this->session->userdata("email"); ?>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="<?php echo base_url('auth/logout'); ?>">Logout</a>
              </div>
            </div>
          </li>
          <?php }else{ ?>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#people-pop-up-register">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#people-pop-up-login">Login</a>
            </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('cart'); ?>">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bag" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 1a2.5 2.5 0 0 0-2.5 2.5V4h5v-.5A2.5 2.5 0 0 0 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5H2z"/>
              </svg>
              <?php if($count_cart > 0){ ?>
              <span class="badge badge-primary badge-pill">
                <?php echo $count_cart; ?>                
              </span>
              <?php } ?>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<!-- Pop Up People Login -->
<div class="modal" id="people-pop-up-login" tabindex="-1" role="dialog" aria-labelledby="people-pop-up-login" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content w-75">
      <!-- <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <form class="modal-body" method="POST" action="<?php echo base_url('auth/aksi_login'); ?>">
        <a href="" class="d-block text-center mb-2">Login</a>
        <small>Masukan email</small>
        <input type="text" name="login_email" class="form-control mb-0" />
        <small>Masukan password</small>
        <input type="password" name="login_password" class="form-control mb-2" />
        <input type="submit" class="btn btn-primary text-white d-block w-100" value="Sign In">
      </form>
    </div>
  </div>
</div>

<!-- Pop Up People Login -->
<div class="modal" id="people-pop-up-register" tabindex="-1" role="dialog" aria-labelledby="people-pop-up-register" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content w-75">
      <!-- <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <form class="modal-body" method="POST" action="">
        <a href="" class="d-block text-center mb-2">Register</a>
        <?php
            $errors = $this->session->flashdata('errors');
            if(!empty($errors)){
            ?>
            <div class="row">
                <div class="col-md-12">
                <div class="alert alert-danger text-center">
                    <?php foreach($errors as $key=>$error){ ?>
                    <?php echo "$error<br>"; ?>
                    <?php } ?>
                </div>
                </div>
            </div>
        <?php } ?>
        <input type="hidden" name="_token" id="_token" value="">
        <small>Masukan username atau email</small>
        <input type="text" name="login_username" class="form-control mb-0" />
        <small>Masukan password</small>
        <input type="password" name="login_password" class="form-control mb-2" />
        <input type="submit" class="btn primary text-white d-block w-100" value="Sign In">
      </form>
    </div>
  </div>
</div>