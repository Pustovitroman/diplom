$(document).ready(function(){
  

  function showCart(cart){
  
  	$('#cart .modal-body').html(cart);
  	$('#cart').modal();
  
  }

	  $('#clear').on('click', function(e) {
	    e.preventDefault();
	    $.ajax({  
	
	        url: "/cart/clear",  
	       	type: "GET",  
	
	       	success:function(res){
		      if(!res) alert ("False")
		      //console.log(res);
		      showCart(res);
	       	},
		       	error:function(){
		       	alert ("Помилка");
	       	
	       	}
	  
		});
	});
  
  
  
 $( ".add-to-cart" ).on('click',function (e) {
    e.preventDefault();
    var id = $(this).data('id'),
    qty = $('#qty').val();
    $.ajax({  

        url: "/cart/add",  
       	data: {id: id, qty: qty},
       	type: "GET",  

       	success:function(res){
	      if(!res) alert ("False")
	      //console.log(res);
	      showCart(res);
       	},
	       	error:function(){
	       	alert ("Помилка");
       	
       	}
  
	});
   
});







$( '#cart .modal-body' ).on('click','.del-item',function() {
   
   var id = $(this).data('id');
   $.ajax({  

        url: "cart/del-item",  
       	data: {id: id},
       	type: "GET",  

       	success:function(res){
	      if(!res) alert ("False")
	      //console.log(res);
	      showCart(res);
       	},
	       	error:function(){
	       	alert ("Помилка");
       	
       	}
  
	});
		
});







 $( "#cart-button" ).on('click',function (e) {
    e.preventDefault();
     $.ajax({  

        url: "/cart/show",  	
       	type: "GET",  

       	success:function(res){
	      if(!res) alert ("False")
	      //console.log(res);
	      showCart(res);
       	},
	       	error:function(){
	       	alert ("Помилка");
       	
       	}
  
});
});   
    
    
  







});



