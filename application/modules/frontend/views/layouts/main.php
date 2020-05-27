<?php  
        $ci = &get_instance();
        $ci->load->model("Escuela_model");

        $data['escuela']= $ci->Escuela_model->get_escuela(1);
        $data['escuela']['claro'] = $ci->Escuela_model->aclararColor($data['escuela']['color'], 60);
?>

<!DOCTYPE html>
<html>
	<?php 
		$this->load->view('head');
	?>
	<body>
		<?php $this->load->view('nav', $data);?>
		
		<div class="container col-lg-12">
		<?php 
			if(isset($_view) && $_view)
		    $this->load->view($_view);
		?>
		</div>
	

		<hr>
		<?php 
			$this->load->view('footer', $data);
		?>
	</body>
</html>

