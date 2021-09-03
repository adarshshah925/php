$(function(){
   $('.errorMessage').hide();
   $('#login').submit(function(){
       var email, passowrd;
       if($('#email').val.length>=6){
           email=$('#email').val();
           $('#emailp').removeClass('error');
           $('$emailError').hide();
       }else{
           $('#emailP').addClass('error');
           $('#emailError').show();
       }
       if($('#password').val().length>0){
          passowrd=$('#password').val();
          $('#passwordP').removeClass('error');
          $('#passwordError').hide();
       }else{
        $('#passwordP').addClass('error');
        $('#passwordError').show();
       }
       //If both found
       if(email && passowrd){
           var data=new Object();
           data.email=email;
           data.passowrd=password;

           //creating new object for ajax action

           var options= new Object();
           options.data=data;
           options.dataType='text';
           options.type='get';
        options.success=function(response){
            if(response=='correct'){
                $('#login').hide();
                $('#results').removeClass('error');
                $('#results').text('you are now logged in');

            } else if (response == 'INCORRECT') {
                $('#results').text('The submitted credentials do not match those on file! ');
                $('#results').addClass('error');
            }
        else if (response ==
            'INCOMPLETE') {
             $('#results').text('Please provide an email address and a password! ');
             $('#results').addClass('error');
            } else if (response ==
            'INVALID_EMAIL') {
             $('#results').text('Please provide your email address!');
             $('#results').addClass('error');
            }
            options.url = 'login_ajax.php';
            $.ajax(options);
        }

       }
   })
})