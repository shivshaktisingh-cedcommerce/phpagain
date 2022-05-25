
	$(document).ready(function(){
		$(".add-to-cart").click(function(event){
			event.preventDefault();
			$("#myTable").css("display","block");
			//alert("shiv");
            $("#empty1").attr("type","button");
			var product_id=$(this).attr("id");
			var product_name=$(this).attr("name");
			var product_price=$(this).attr("price");
		    $.ajax({
				dataType:"HTML",
			    method:"POST",
                url:"store_items.php",
                data:{
					product_id:product_id,
                    product_name:product_name,
                    product_price:product_price
			    	},
                    success:function(data){
						$('#myTable').html(data);
                       }
					});
                });
		
				 
				  $("#myTable").on("click","#Delete",function(){
					//event.preventDefault();
					  var rowToDelete = $(this).attr("name");
					 // alert(rowToDelete);
                      $.ajax({
						  datatype:"HTML",
						  method:"POST",
						  url:"store_items.php",
						  data:{
                             rowToDelete:rowToDelete
						   },
						  success:function(data){
						   $('#myTable').html(data);
                           }
				    	});
					});

					$("#empty1").click(function(){
						var empty=$(this).attr("id");
						//alert(empty);
			    	    $.ajax({
                        method: "POST",
                        url: 'store_items.php',
						data:{
                             empty:empty
				     		},
							 success:function(data){
								 $("#myTable").css("display","none");
                                 $("#empty1").attr("type","hidden");
						   $('#myTable').html(data);
                           }
                         });
                    });
					 
			       
});