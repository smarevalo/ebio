<!-- Footer Section -->				
		<!-- REQUIRED JS SCRIPTS -->
		<!-- Bootstrap 3.3.6 -->
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
		<!-- DataTables -->
		<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
		<!-- SlimScroll -->
		<script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
		<!-- FastClick -->
		<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.min.js"></script>
		<!-- AdminLTE App -->
		<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
		<!-- iCheck -->
		<script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
		<script>
		$(function () {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-green',
				radioClass: 'iradio_square-green',
				increaseArea: '20%' // optional
			});
		});
		</script>
		<script>
			$(function () {
				$("#example1").DataTable();
				$('#example2').DataTable({
					"paging": true,
					"lengthChange": false,
					"searching": false,
					"ordering": true,
					"info": true,
					"autoWidth": false
				});
			});
		</script>
	</body>
</html>