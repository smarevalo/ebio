<div class="alert alert-<?= $tipo ?> alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    
    <h4>
        <?php switch($tipo){
            case 'danger': echo '<i class="icon fa fa-ban">'; break;
            case 'success': echo '<i class="icon fa fa-info">'; break;
            case 'info': ; echo '<i class="icon fa fa-check">'; break;
            default: echo '<i class="icon fa fa-warning">'; break;
        } 
        ?>
        </i> <?= $titulo ?> 
    </h4>
    <?= $mensaje ?>
</div>