<?php

	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
	
	


	
//   	$_SESSION['onlineorderid']="Request" . rand(00000,11111);
	

	
$_SESSION['onlineprice']=$tokenmoney;
/*$_SESSION['onlinecomname']=$_GET['comname'];
$_SESSION['onlinegstno']=$_GET['gstno'];
$_SESSION['onlinecomnumber']=$_GET['comnumber'];
$_SESSION['onlineshipcharges']=$_GET['shipcharges'];
$_SESSION['onlinecoupon']=$_GET['coupon'];
$_SESSION['onlinediscountcharge']=$_GET['discountcharge'];
$_SESSION['onlinesubtotal']=$_GET['subtotal'];
$_SESSION['onlinecodcharges']=$_GET['codcharges'];
$_SESSION['onlinedelievry']=$_GET['delievry'];
$_SESSION['onlinefinalvolume']=$_GET['finalvolume'];
$_SESSION['onlineaddress']=$_GET['address'];*/
?>

	<form method="post" action="<?php echo base_url('Artnhub/pgRedirect'); ?>" name="f1">
		
				<input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo $transaction_id ; ?>">
					
			
					<input  type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $_SESSION['session_id']; ?>">
				
			
				<input  type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
					<input  type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					
				
					<input title="TXN_AMOUNT" tabindex="10"
						type="hidden" name="TXN_AMOUNT"
						value="<?php echo $tokenmoney ;?>">

							<input title="comname" tabindex="10"
						type="hidden" name="comname"
						value="<?php echo $_GET['comname']; ?>">



							<input title="gstno" tabindex="10"
						type="hidden" name="gstno"
						value="<?php echo $_GET['gstno']; ?>">

							<input title="comnumber" tabindex="10"
						type="hidden" name="comnumber"
						value="<?php echo $_GET['comnumber']; ?>">

							<input title="shipcharges" tabindex="10"
						type="hidden" name="shipcharges"
						value="<?php echo $_GET['shipcharges']; ?>">

							<input title="coupon" tabindex="10"
						type="hidden" name="coupon"
						value="<?php echo $_GET['coupon']; ?>">

							<input title="discountcharge" tabindex="10"
						type="hidden" name="discountcharge"
						value="<?php echo $_GET['discountcharge']; ?>">



							<input title="subtotal" tabindex="10"
						type="hidden" name="subtotal"
						value="<?php echo $_GET['subtotal']; ?>">


							<input title="codcharges" tabindex="10"
						type="hidden" name="codcharges"
						value="<?php echo $_GET['codcharges']; ?>">


							<input title="delievry" tabindex="10"
						type="hidden" name="delievry"
						value="<?php echo $_GET['delievry']; ?>">
				

						<input title="finalvolume" tabindex="10"
						type="hidden" name="finalvolume"
						value="<?php echo $_GET['finalvolume']; ?>">
				

						<input title="address" tabindex="10"
						type="hidden" name="address"
						value="<?php echo $_GET['address']; ?>">
				
					
		</form>
			<script type="text/javascript">
			document.f1.submit();
		</script>