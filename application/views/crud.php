<!Doctype html>
<html lang="es">
  <head>
      <meta charset='utf8'>
    <title>Etic</title> 
     <!-- Importamos las librerias de html de grocery_CRUD, de lo contrario no funcionar� -->
     <?php
        if(!empty($css_files) && !empty($js_files)):
        foreach($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?= $file ?>" />
        <?php endforeach; ?>
        <?php foreach($js_files as $file): ?>
        <script src="<?= $file ?>"></script>
        <?php endforeach; ?>                
    <?php endif; ?>                     
     <link rel="stylesheet" href="<?php echo base_url('style.css'); //Esto generar� http://localhost/style.css, dependiendo del valor colocado en el config.php ?>">
  </head>
  <body>
    <?= $output ?>
  </body>
</html>
