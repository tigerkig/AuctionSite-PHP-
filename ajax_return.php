<?php
session_start();
require_once("function.php")
?>
<script type="text/javascript">
$(document).ready(function() {
	$("#ajax_des").on('submit',(function(e){  
	 if (!$("input[name='reason']:checked").val()) {
       alert('Select Reason !');
        return false;
    }
	if (!$("input[name='open_or_not']:checked").val()) {
       alert('Select Product open or not !');
        return false;
    }
	var details=$("#details").val();
	if(details.trim()==""){
		alert("Comment Required !");
		$("#details").focus();
		return false;
	}
	$.ajax({
        	url: "ajax_return_product.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			if(data==1){
				alert("Your Request Under Process...");
				window.location="order-history.php";
			}
			if(data==0){
				alert("Something went wrong..pls try again...");
				window.location="order-history.php";
			}
		    },
		    error: function() 
	    	{
	    	}	        
	   });
	
	}));
		  
	  });
</script>
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="index.php"><i class="fa fa-home"></i></a></li>
			<li><a href="order-history.php"><?php echo $lang_9;  ?></a></li>
			<li><a href="return.php"><?php echo $lang_10;  ?></a></li>
		</ul>
		
		<div class="row">
			<!--Middle Part Start-->
			<div id="content" class="col-sm-12">
				<h2 class="title"><?php echo $lang_11;  ?></h2>
				<p><?php echo $lang_12;  ?></p>

				<form class="form-horizontal" action="javascript:void(0);" method="post" id="ajax_des">
					
					<fieldset>
						<legend><?php echo $lang_13;  ?></legend>
						
					    
						<div class="form-group required">
							<label class="col-sm-2 control-label"><?php echo $lang_14;  ?></label>
							<div class="col-sm-10">
								<label class="input-text">
									<input type="number" name="quantity" min="1" max="<?php echo $_POST["quantity"];  ?>" value="1">
								</label>
								
							</div>
						</div>
						
						
						<div class="form-group required">
							<label class="col-sm-2 control-label"><?php echo $lang_15;  ?></label>
							<div class="col-sm-10">
								<div class="radio">
									<label>
										<input type="radio" value="1" name="reason"><?php echo $lang_16;  ?></label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" value="2" name="reason"><?php echo $lang_17;  ?></label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" value="3" name="reason"><?php echo $lang_18;  ?></label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" value="4" name="reason"> <?php echo $lang_19;  ?>
									</label>
								</div>

							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label"><?php echo $lang_20;  ?></label>
							<div class="col-sm-10">
								<label class="radio-inline">
									<input type="radio" value="1" name="open_or_not"> <?php echo $lang_21;  ?>
								</label>
								<label class="radio-inline">
									<input type="radio" checked="checked" value="0" name="open_or_not"> <?php echo $lang_22;  ?>
								</label>
							</div>
						</div>
						
					<input type="hidden" name="arp_ass_id" value="<?php echo $_POST["arp_ass_id"];  ?>" />	
					<input type="hidden" name="arp_apa_id" value="<?php echo $_POST["arp_apa_id"];  ?>" />	
					<input type="hidden" name="arp_ac_id" value="<?php echo $_POST["arp_ac_id"];  ?>" />	
					<input type="hidden" name="arp_vr_id" value="<?php echo $_POST["arp_vr_id"];  ?>" />	
						
						
						
						
						<div class="form-group">
							<label for="input-comment" class="col-sm-2 control-label"><?php echo $lang_23;  ?></label>
							<div class="col-sm-10">
								<textarea class="form-control"  placeholder="Other details" rows="10" name="details" id="details" ></textarea>
							</div>
						</div>
					</fieldset>
					<div class="buttons clearfix">
						<!--<div class="pull-left"><a class="btn btn-default buttonGray" href="order-information.php"><?php echo $lang_24;  ?></a>-->
						<!--<div class="pull-left"><a class="btn btn-default buttonGray" href="order-information.php?id=<?php echo $_POST["arp_ass_id"];?>"><?php echo $lang_24;  ?></a>-->
						<div class="pull-left"><a class="btn btn-default buttonGray" href="order-history.php"><?php echo $lang_24;  ?></a>
						</div>
						<div class="pull-right">
							<input type="submit" class="btn btn-primary" value="Submit">
						</div>
					</div>
				</form>


			</div>
			<!--Middle Part End-->
			<!--Right Part Start -->
			
			<!--Right Part End -->
		</div>
	</div>
	