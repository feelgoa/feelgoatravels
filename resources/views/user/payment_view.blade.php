@extends('layouts.app')

@section('content')
<section>
<?php

$MERCHANT_KEY = PAYU_MERCHANT_KEY;
$SALT = PAYU_SALT_KEY;

$PAYU_BASE_URL = PAYU_BASE_URL;
$action = '';
$txnid = $data['txnid'];
$posted = array();
$posted = array(
    'key' => $MERCHANT_KEY,
    'txnid' => $txnid,
    'amount' => $data['amount'],
    'firstname' => $data['firstname'],
    'email' => $data['email'],
	  'productinfo' => $data['productinfo'],
	  'phone' => $data['phone'],
);

#if(empty($posted['txnid'])) {
#    $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
#} 
#else 
#{
#    $txnid = $posted['txnid'];
#}

$hash = '';
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
    $hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';  
    foreach($hashVarsSeq as $hash_var) {
        $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
        $hash_string .= '|';
    }
    $hash_string .= $SALT;

    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
} 
elseif(!empty($posted['hash'])) 
{
    $hash = $posted['hash'];
    $action = $PAYU_BASE_URL . '/_payment';
}
?>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
           payuForm.submit();
    }
  </script>
<body onload="submitPayuForm()">
	<form action="<?php echo $action; ?>" method="post" name="payuForm" style="display:none;"><br />
  {{ csrf_field() }}
		<input type="text" name="key" value="<?php echo $MERCHANT_KEY ?>" /><br />
		<input type="text" name="hash" value="<?php echo $hash ?>"/><br />
		<input type="text" name="txnid" value="<?php echo $txnid ?>" /><br />
		<input type="text" name="amount" value="<?php echo $data['amount'] ?>" /><br />
		<input type="text" name="phone" value="<?php echo $data['phone']?> " /><br />
		<input type="text" name="firstname" id="firstname" value="<?php echo $data['firstname'] ?>" /><br />
		<input type="text" name="email" id="email" value="<?php echo $data['email'] ?>" /><br />
		<input type="text" name="productinfo" value="<?php echo $data['productinfo'] ?>"><br />
		<input type="text" name="surl" value="<?php echo SITE_URL.PAYMENT_SUCCESS_URL ?>" /><br />
		<input type="text" name="furl" value="<?php echo SITE_URL.PAYMENT_FAILURE_URL ?>" /><br />
		<input type="text" name="service_provider" value="<?php echo PAYMENT_SERVICE_PROVIDER ?>"  /><br />
		<?php
		if(!$hash) { ?>
			<input type="submit" value="Submit" />
		<?php } ?>
	</form>
</body>
</section>
@endsection
