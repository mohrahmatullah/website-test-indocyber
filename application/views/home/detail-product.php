
<?php $this->load->view("_partials/head.php") ?>

<body>

  <?php $this->load->view("_partials/navbars.php") ?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">
      <div class="col-lg-12">

        <div class="col-lg-9">

          <div class="card mt-4">
            <img class="card-img-top img-fluid" src="<?php echo base_url('assets/uploads/'.$database->image); ?>" alt="">
            <div class="card-body">
              <h3 class="card-title"><?php echo $database->nama_produk; ?></h3>
              <h4><?php echo money($database->harga); ?></h4>
              <h5>Remaining Stock : <?php echo $database->stock; ?></h5>
              <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#people-pop-up-add-to-cart">Add to cart</a>

              <!-- Pop Up People Login -->
              <div class="modal" id="people-pop-up-add-to-cart" tabindex="-1" role="dialog" aria-labelledby="people-pop-up-add-to-cart" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content w-75">
                    <form class="modal-body" method="POST" action="<?php echo base_url('cart/add_to_cart/'.$database->id); ?>">
                      <a class="d-block text-center mb-2"><img class="text-center" src="<?php echo base_url('assets/uploads/'.$database->image); ?>" width="100%" height="100%" /></a>
                      <h3 class="card-title"><?php echo $database->nama_produk; ?></h3>
                      <h5><?php echo money($database->harga); ?></h5>
                      <h5>Remaining Stock : <?php echo $database->stock; ?></h5>
                      <small>Qty</small> <input type="number" name="qty_beli" value="1" class="form-control mb-2" min="1" max="<?php echo $database->stock; ?>" />
                      <input type="submit" class="btn btn-primary text-white d-block w-100" value="Add to cart">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card -->

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->
      

      

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

<?php $this->load->view("_partials/footer.php") ?>
