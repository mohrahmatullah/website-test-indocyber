
<?php $this->load->view("_partials/head.php") ?>

<body>

  <?php $this->load->view("_partials/navbars.php") ?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-12">

        
        <!-- /.card -->

        <div class="card card-outline-secondary my-4">
          <div class="card-header">
            Cart
          </div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Image</th>
                  <th scope="col">Produk</th>
                  <th scope="col">Qty</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($database)){ ?>
                <?php foreach($database as $db) : ?> 
                <tr>
                  <th scope="row">1</th>
                  <td><img src="<?php echo base_url('assets/uploads/'.$db->image); ?>" width="50px" height="50px"></td>
                  <td><?php echo $db->nama_produk; ?></td>
                  <td><?php echo $db->qty; ?></td>
                  <td>
                    <a href="<?php echo base_url('delete-cart/'.$db->id); ?>">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-archive-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
                      </svg>
                    </a>
                  </td>
                </tr>
                <?php endforeach; ?>
                <?php }else{ ?>
                  <tr>
                    <th colspan="5" class="text-center">Empty Cart</th>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.card -->

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

<?php $this->load->view("_partials/footer.php") ?>
