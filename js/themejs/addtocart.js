/* -------------------------------------------------------------------------------- /
	
	Magentech jQuery
	Created by Magentech
	v1.0 - 20.9.2016
	All rights reserved.
	
/ -------------------------------------------------------------------------------- */


	// Cart add remove functions
	var cart = {
		'add': function(product_id,image,name,quantity) {
			var photo= '<img src="vendor/product_photo/'+image+'" alt="">';
			addProductNotice3(product_id,quantity,name+' added to Cart',photo, '<h3><font color="brown">Thank You</font></h3>', 'success');
		}
	}

	var wishlist = {
		'add': function(product_id,image,name,quantity) {
			var photo= '<img src="vendor/product_photo/'+image+'" alt="">';
			addProductNotice(product_id,quantity,'Sorry !', photo, '<h3>You must <a href="#">login</a>  to save <a href="#">'+name+'</a> to your <a href="#">wish list</a>!</h3>', 'success');
		}
	}
	
	var wishlist3 = {
		'add': function(product_id,image,name,quantity) {
			var photo= '<img src="vendor/product_photo/'+image+'" alt="">';
			addProductNotice1(product_id,quantity,name+' added to Wishlist', photo, '<h3><font color="brown">Thank You</font></h3>', 'success');
		}
	}
	var compare = {
		'add': function(product_id,image,name,quantity) {
			var photo= '<img src="vendor/product_photo/'+image+'" alt="">';
			compareProduct(product_id,quantity, 'Product added to compare', photo, '<h3>Success: You have added <a href="#">'+name+'</a> to your <a href="#">product comparison</a>!</h3>', 'success');
		}
	}

	/* ---------------------------------------------------
		jGrowl – jQuery alerts and message box
	-------------------------------------------------- */
	
	function addProductNotice3(product_id,quantity,title, thumb, text, type) {
		
		title = title.replace("@#@#@#@#", "'");
		$.post(
		"set_add2cart.php",
		{product_id:product_id,quantity:quantity},
		function(r){
			var data=r.split("||");

				$("#crt_dtls").html(data[0]);
				$("#ckt_dtls").html(data[1]);
		}
		);
		$.jGrowl.defaults.closer = false;
		//Stop jGrowl
		//$.jGrowl.defaults.sticky = true;
		var tpl = thumb + '<h3>'+text+'</h3>';
		$.jGrowl(tpl, {		
			life: 4000,
			header: title,
			speed: 'slow',
			theme: type
		});
		
	}
	
	function addProductNotice(product_id,quantity,title, thumb, text, type) {
		
		/* $.post(
		"set_add2cart.php",
		{product_id:product_id,quantity:quantity},
		function(r){	
		}
		); */
		text = text.replace("@#@#@#@#", "'");

		$.jGrowl.defaults.closer = false;
		//Stop jGrowl
		//$.jGrowl.defaults.sticky = true;
		var tpl = thumb + '<h3>'+text+'</h3>';
		$.jGrowl(tpl, {		
			life: 4000,
			header: title,
			speed: 'slow',
			theme: type
		});
		
	}

	
	function addProductNotice1(product_id,quantity,title, thumb, text, type) {
		title = title.replace("@#@#@#@#", "'");

		// $.post(
		// "set_add2wish.php",
		// {product_id:product_id},
		// function(r){
		// $("#wish").html(r);	
		// location.reload();
		// }
		// );
		$.jGrowl.defaults.closer = false;
		//Stop jGrowl
		//$.jGrowl.defaults.sticky = true;
		var tpl = thumb + '<h3>'+text+'</h3>';
		$.jGrowl(tpl, {		
			life: 4000,
			header: title,
			speed: 'slow',
			theme: type
		});
		
	}
function compareProduct(product_id,quantity,title, thumb, text, type) {
		text = text.replace("@#@#@#@#", "'");
		
		$.post(
		"set_add2compare.php",
		{product_id:product_id},
		function(r){
		var r=r.split("||");
		
		if(r[0].trim() != 0){
		$.jGrowl.defaults.closer = false;
		var tpl = thumb + '<h3>'+text+'</h3>';
		$.jGrowl(tpl, {		
			life: 4000,
			header: title,
			speed: 'slow',
			theme: type
		});
		}else{
		$.jGrowl.defaults.closer = false;
		var tpl ='<h3>'+'<h3><font color="brown">Thank You</font></h3>'+'</h3>';
		$.jGrowl(tpl, {		
			life: 4000,
			header: ' You added allready 3 Items',
			speed: 'slow',
			theme: 'Failed'
		});	
		}
		
		$("#compare").html(r[1]);	
		}
		);
	}