<?php

$CI = & get_instance (); // Instancia do CI.
$url = $CI->config->slash_item ( 'base_url' );
$urlBase = $url.'index.php/';
$imagem = $CI->config->slash_item ( 'base_url' ) . 'images';

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<link rel="shortcut icon" href="/favicon.png" /> 
<title>Chat</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $url?>js/mask/jquery.mask.min.js"/></script>

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<!--[if IE 7]>
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome-ie7.min.css">
<![endif]-->
<link rel="stylesheet" href="<?php echo $url?>css/styles.css?<?php echo time(); ?>">
<script src="https://kit.fontawesome.com/e4dbad4be0.js" crossorigin="anonymous"></script>
<script>
  
</script>
</head>
<body>
<div id="Container">
  <?php echo $contents?>


</div>
<script src="<?php echo $url?>js/conversa.js" crossorigin="anonymous"></script>

</body>
</html>