
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
          <div class="card-body table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Image</th>
                  <th scope="col">Produk</th>
                  <th scope="col">Harga Satuan</th>
                  <th scope="col">Qty</th>
                  <th scope="col">Harga Total</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($database)){ ?>
                <?php $sum_tot_Price  = 0 ?>
                <?php foreach($database as $db) : ?> 
                <tr>
                  <td><a href="<?php echo base_url('detail/'.$db->id_produk); ?>"><img src="<?php echo base_url('assets/uploads/'.$db->image); ?>" width="50px" height="50px"></a></td>
                  <td><?php echo $db->nama_produk; ?></td>
                  <td><?php echo money($db->harga); ?></td>
                  <td><?php echo $db->qty; ?></td>
                  <td><?php echo money($db->qty*$db->harga); ?></td>
                  <td>
                    <a href="<?php echo base_url('delete-cart/'.$db->id.'/'.$db->id_produk.'/'.$db->qty); ?>">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-archive-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
                      </svg>
                    </a>
                    <!-- <a href="#" class="remove-cart" data-id_cart="<?php echo $db->id; ?>" data-id_produk="<?php echo $db->id_produk; ?>" data-qty="<?php echo $db->qty; ?>">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-archive-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
                      </svg>
                    </a> -->
                  </td>
                </tr>
                <?php $sum_tot_Price += $db->qty*$db->harga ?>
                <?php endforeach; ?>
                <tr>
                  <td colspan="4" align="center">Grand Total</td>
                  <td><?php echo money($sum_tot_Price); ?></td>
                  <td></td>
                </tr>
                <?php }else{ ?>
                  <tr>
                    <th colspan="6" class="text-center">Empty Cart</th>
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

