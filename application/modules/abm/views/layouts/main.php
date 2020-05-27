<div class="content-wrapper">
	<section class="content">
		<div class="row container">
			<?php 
				if(isset($_view) && $_view)
			    $this->load->view($_view);
			?>			
		</div>
	</section>
</div>
