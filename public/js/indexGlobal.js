$(document).ready(function() {
  $( "#cep" ).focusout(function() {
      if ( $( this ).val() != '' )
      {
          $.getJSON("https://viacep.com.br/ws/"+$( this ).val()+"/json/", function(result){
              $.each(result, function(i, field){
                  if ( i == 'logradouro' )
                     $('#logradouro').val(field);    
                  else if ( i == 'bairro' )
                     $('#bairro').val(field);   
                  else if ( i == 'complemento' )
                     $('#additional').val(field); 
                  else if ( i == 'uf' )
                     $('#uf').val(field);  
                  else if ( i == 'cidade' )
                     $('#cidade').val(field);   
              });
          });
      }

    });
});