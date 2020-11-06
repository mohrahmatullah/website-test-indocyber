<!-- Footer -->
	<footer class="py-5 bg-dark" style="margin-top: 35rem;">
		<div class="container">
		  <p class="m-0 text-center text-white">Copyright &copy; Shop 2020</p>
		</div>
	<!-- /.container -->
	</footer>

	<!-- Bootstrap core JavaScript -->
	<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
	<!-- Import Sweetalert -->
	<script src="<?php echo base_url('assets/sweetalert/sweetalert.min.js'); ?>"></script>
	<script type="text/javascript">
	    $(".remove-cart").click(function(){
        	const id_cart = $(this).data('id');
        	const id_produk = $(this).data('id_produk');
        	const qty = $(this).data('qty');
	    
			swal({
				title: "Are you sure?",
				text: "You will not be able to recover this imaginary file!",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Yes, delete it!",
				cancelButtonText: "No, cancel plx!",
				closeOnConfirm: false,
				closeOnCancel: false
			},
			function(isConfirm) {
				if (isConfirm) {
				  $.ajax({
				     url: '/delete-cart/'+id_cart+'/'+id_produk+'/'+qty,
				     type: 'DELETE',
				     error: function() {
				        alert('Something is wrong');
				     },
				     success: function(data) {
				          // $("#"+id).remove();
				          swal("Deleted!", "Your imaginary file has been deleted.", "success");
				     }
				  });
				} else {
				  swal("Cancelled", "Your imaginary file is safe :)", "error");
				}
			});
	     
	    });
	    
	</script>
</body>

</html>