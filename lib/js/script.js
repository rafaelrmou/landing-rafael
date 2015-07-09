$(document).ready(function(){
  $('#form').formValidation({
    icon: {
      valid: 'glyphicon glyphicon-ok',
      invalid: 'glyphicon glyphicon-remove',
      validating: 'glyphicon glyphicon-refresh'
    },
    err: {
      container: 'tooltip'
    },
    fields: {
      'name': {
        validators: {
          notEmpty: {
            message: 'Este campo é necessário.'
          }
        }
      },
      'mail': {
        validators: {
          notEmpty: {
            message: 'Este campo é necessário.'
          },
            emailAddress: {
          message: 'Este endereço não é valido.'
        }
        }
      },
      'tel': {
        validators: {
          notEmpty: {
            message: 'Este campo é necessário.'
          }
        }
      },
      'msg': {
        validators: {
         notEmpty: {
          message: 'Este campo é necessário.'
        }
      }
    }
  }
}).on('success.form.fv', function(e) {
$('#form').submit(function(){
    var dados = $( this ).serialize();
    $.ajax({
      type: "POST",
      url: "app/send.php",
      data: dados,
      success: function( data )
      {
       $('#myModal').modal('show').each(function(){
            $( "#close" ).click(function() {
              $('#myModal').modal('hide');
              location.reload();
            });
          });
        $("#form").each(function(){ 

          this.reset();

        });

      }
    });
    return false;
  });
  })
});
