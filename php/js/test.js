
    $(function(){
        $('.errorMessage').hide();
        //$('#submit').addClass('btn'); adding class
       // $('#submit').removeClass('btn'); // removing class
        $("form").submit(function(){
          // initializeing variable
       var quantity, price, total, tax; 
       //validiate the quantity
       if ($('#quantity').val() > 0) {
        quantity = $('#quantity').val();
      
       } else {
        $('.errorMessage').show();
       }
       if ($('#price').val() > 0) {
        price = $('#price').val();
        $('')
      
       } else {
        $('.errorMessage').show();
       }
       if ($('#tax').val() > 0) {
        
        tax = $('#tax').val();
       } else {
        $('.errorMessage').show();
       }
       // performing calculations
      
       if (quantity && price && tax) {
        total = quantity * price;
        total += total * (tax/100);
        $('#results').html('The total is <strong>$' + total + '</strong>.');
        
    }
    return false;
    });       
   });

   