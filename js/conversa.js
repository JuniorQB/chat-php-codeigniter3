
    var enterSubmit = document.onkeydown=function(evt){

      var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
      if(keyCode == 13)
      {
          enviar();
      }
  }
  
  var conn = new WebSocket('ws://'+ip+':8282');
  var client = {
      user_id: id_user,
      recipient_id: null,
      type: 'socket',
      token: null,
      message: null
  };
  

  conn.onopen = function (e) {
      conn.send(JSON.stringify(client));
      $('#infoChat').append('<font color="green">Conectado como '+nickname+'</font><br>');
      $('#infoChat').append('<font color="red">Conversando com '+nomeuserconversa+'</font><br>');
  };

  conn.onmessage = function (e) {
      var data = JSON.parse(e.data);
      if (data.message) {
          $('#messages').append(
              '<div>'+
                  '<span class="chat_info">'+nomeuserconversa + ' : </span>'+
                  '<span class="chat_mensagem">' + data.message + '</span>'+
                  '<span></span>'+
              '</div>');
      }
      if (data.type === 'token') {
          $('#token').html('JWT Token : ' + data.token);
      }
  };

  $('#submit').click(function () {
      enviar();
  });


  function enviar(){
      client.message = $('#mensagem').val();
      client.token = $('#token').text().split(': ')[1];
      client.type = 'chat';
      if ($('#recipient_id').val()) {
          client.recipient_id = $('#recipient_id').val();
          $('#messages').append(
              '<div>'+
                  '<span class="chat_info">Eu: </span>'+
                  '<span class="chat_mensagem">' + client.message + '</span>'+
                  '<span></span>'+
              '</div>');
      }
      conn.send(JSON.stringify(client));

      $.ajax({
          type: 'POST',
          url: url_base+'Mensagem/salvarMensagem',
          data: {
              'iduser_from':client.user_id,
              'iduser_to':iduserconversa,
              'mensagem': client.message 
          },
          success: function (response) {
              //
          },
      })

      $('#mensagem').val('');
  }

  function excluir(idmensagem){
      $.ajax({
          type: 'POST',
          url: url_base+'Mensagem/excluirMensagem',
          data: {
              'idmensagem':idmensagem,
              
          },
          success: function (response) {
              $( "#mensagem_"+idmensagem ).remove();
          },
      })

  }