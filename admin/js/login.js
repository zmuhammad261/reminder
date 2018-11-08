
$(function()
{
	$('#login_form').submit(function(e)
      {
        e.preventDefault();
        $('button[type="submit"]').addClass('disabled');
        $('button[type="submit"]').prop('disabled', false);
        $form = $(this);
            $("#msg").html("");  
            $.ajax({
                type: "POST",
                url: 'includes/login.php',
                data: $form.serialize(),
                success:function(d){
                    $('button[type="submit"]').prop('disabled', false);
                    if(d==1){
                      $('#login_form')[0].reset();
                      $("#msg").css("color","green");
                      $("#msg").html("Login Successful");
                      document.location = 'dashboard';
                    }else{
                       $("#msg").css("color","red");
                        $("#msg").html("Something went wrong. Please try again");
                      } 
                }
            });        
        
      });	
});