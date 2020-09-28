<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

$CI = & get_instance (); // Instancia do CI.
$url = $CI->config->slash_item ( 'base_url' );
$urlBase = $url.'index.php/';

?>
<div id="container">
    <h1>Conversa</h1>
    <div id="body">
        <div id="chat">
            <div id="infoChat"></div>
            <div id="messages">
                <?php foreach($mensagens as $m){?>
                    <div id="mensagem_<?php echo $m->idmensagem?>">
                        <input type="hidden" name="idmensagem" id="idmensagem" value="<?php echo $m->idmensagem?>"/>
                        <span class="chat_info"><?php echo ($m->iduser_from === $dados[0]->iduser)?'Eu: ': $userconversa[0]->nickname.': ';?></span>
                        <span class="chat_mensagem"><?php echo $m->mensagem?></span>
                        <?php if($m->iduser_from === $dados[0]->iduser){ ?>
                            <span class="chat_excluir" onClick='excluir("<?php echo $m->idmensagem?>")'>Excluir</span>
                        <?php } ?>
                    </div> 
                <?php }?>

            </div>    
        </div>
        
        <input type="text" id="mensagem" name="mensagem" class="input" placeholder="Digite a Menssagem ..">
        <input type="hidden" id="recipient_id" value="<?php echo $userconversa[0]->iduser?>">
        <button id="submit" value="POST">Enviar</button>
    </div>

    <p class="footer">
        <span style="float: left;" id="token"></span>
        Page rendered in <strong>{elapsed_time}</strong>
        seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
    </p>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    var url_base = '<?php echo  $urlBase ?>';
    var nickname = '<?php echo $dados[0]->nickname; ?>';
    var id_user = <?php echo $dados[0]->iduser; ?>;
    var nomeuserconversa = '<?php echo $userconversa[0]->nickname; ?>';
    var iduserconversa = '<?php echo $userconversa[0]->iduser; ?>';
    var ip = '<?php echo IP_ADDRESS?>';

</script>


