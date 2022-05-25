$(document).ready(function(){
    $('.add-to-cart').click(function(){
        event.preventDefault();
        $("#empty").attr("type","button");
        $name = $(this).attr('name');
        $price = $(this).attr('price');
        $id = $(this).attr('id');
        $.ajax({
            method : 'POST',
            url : 'config.php',
            data :{
                cart : 'cart',
                id : $id,
                name : $name,
                price : $price
                
            },
            success : function(data){
                $('#myTable').html(data);
            }
        });
        
    });
    $('#myTable').on("click",".delete",function(){
        $id = $(this).attr('id');
        $.ajax({
            method : 'POST',
            url : 'config.php',
            data :{
                delete : 'cart',
                id : $id,
            },
            success : function(data){
                $('#myTable').html(data);
            }
        })
    });

    $("#empty").click(function(){
        $.ajax({
        type: 'POST',
        url: 'Logout.php',
        success: function(msg) {
        if (msg == 'loggedOut') {
            
           window.location.href = 'products.php';
          }
        }
    });
    });
});