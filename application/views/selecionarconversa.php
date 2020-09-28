<?php
$CI = & get_instance(); // Instancia do CI.
$url = $CI->config->slash_item('base_url');
$urlBase = $url . 'index.php/';
$imagem = $CI->config->slash_item('base_url') . 'imagens';
?>
<div id="Content">
	
  
  <?php echo form_open('User/entrarChat') ?>
   <label for="nickname">Selecione</label>
   <?php 
   $options = array();
  foreach($dados as $d){
    if($d->iduser !==$meuid)
      $options[$d->iduser] = $d->nickname;
  }

   ?>
   <div class="input">
	   <?php	echo form_dropdown('user_id_conversa', $options, '')?>
  </div>
      <input type="hidden" name="user_id" value="<?php echo $meuid ?>">
			<button type="submit" id="submit">Entrar</button>
  </form>  
		
</div>
	