<?php
$CI = & get_instance(); // Instancia do CI.
$url = $CI->config->slash_item('base_url');
$urlBase = $url . 'index.php/';
$imagem = $CI->config->slash_item('base_url') . 'imagens';
?>
<div id="Content">
	
  
  <?php echo form_open('Principal/verificar_nickname') ?>
   <label for="nickname">Nickename</label> <input type="text" name="nickname" id="nickname" placeholder="Digite seu Nickename" class="input">
   <?php echo form_error('nickname'); ?>
    <button type="submit" id="submit">Entrar</button>
  </form>  
		
</div>
	