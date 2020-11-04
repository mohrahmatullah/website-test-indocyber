
<?php $this->load->view("_partials/head.php") ?>

<body>

  <?php $this->load->view("_partials/navbars.php") ?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Shop Name</h1>
        <div class="list-group">
          <a href="#" class="list-group-item">Category 1</a>
          <a href="#" class="list-group-item">Category 2</a>
          <a href="#" class="list-group-item">Category 3</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="col-lg-9">

          <div class="card mt-4">
            <img class="card-img-top img-fluid" src="<?php echo base_url('assets/uploads/'.$database->image); ?>" alt="">
            <div class="card-body">
              <h3 class="card-title"><?php echo $database->nama_produk; ?></h3>
              <h4><?php echo $database->harga; ?></h4>
              <h5>Remaining Stock : <?php echo $database->stock; ?></h5>
              <a href="#" class="btn btn-success" data-toggle="modal" data-target="#people-pop-up-add-to-cart">Add to cart</a>

              <!-- Pop Up People Login -->
              <div class="modal" id="people-pop-up-add-to-cart" tabindex="-1" role="dialog" aria-labelledby="people-pop-up-add-to-cart" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content w-75">
                    <!-- <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div> -->
                    <form class="modal-body" method="POST" action="">
                      <small>Masukan username atau email</small>
                      <input type="text" name="login_username" class="form-control mb-0" />
                      <small>Masukan password</small>
                      <input type="password" name="login_password" class="form-control mb-2" />
                      <input type="submit" class="btn btn-primary text-white d-block w-100" value="Sign In">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card -->

        </div>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

<?php $this->load->view("_partials/footer.php") ?>
