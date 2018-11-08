
$(function()
{
	$('#login_form').submit(function(e)
      {
        e.preventDefault();
        $('button[type="submit"]').prop('disabled', true);
        $('button[type="submit"]').prop('disabled', false);
        $form = $(this);
            $("#msg").html("");  
            $.ajax({
                type: "POST",
                url: 'handler.php',
                data: $form.serialize(),
                success:function(d){
                    $('button[type="submit"]').prop('disabled', false);
                    if(d==0){
                       $("#msg").css("color","red");
                        $("#msg").html("Login Failed. Retry again");
                      } 
                }
            });        
        
      });	
});