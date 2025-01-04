<?php
$field_name = $_POST['name'];
$field_email = $_POST['email'];
$field_phone = $_POST['phone'];
$field_dtype = $_POST['dtype'];
$field_message = $_POST['message'];
$field_from = "Enquiry from Pojo Technology";

$mail_to = 'info@pojotechnology.com';
$subject = 'Message from a site visitor '.$field_name;

$body_message = 'From: '.$field_name."\n";
$body_message .= 'E-mail: '.$field_email."\n";
$body_message .= 'Phone: '.$field_phone."\n";
$body_message .= 'Requirement: '.$field_dtype."\n";
$body_message .= 'Message: '.$field_message."\n";
$body_message .= 'Form From: '.$field_from;

$headers = 'From: '.$field_email."\r\n";
$headers .= 'Reply-To: '.$field_email."\r\n";

$mail_status = mail($mail_to, $subject, $body_message, $headers);

if ($mail_status) { ?>
	<script language="javascript" type="text/javascript">
		alert('Thank you for contacting us. Someone will be in touch with you shortly');
		window.location = 'index.html';
	</script>
<?php
}
else { ?>
	<script language="javascript" type="text/javascript">
		alert('Message failed. Please, send an email to info@pojotechnology.com');
		window.location = 'index.html';
	</script>
<?php
}
?>