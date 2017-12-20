<?php 
$errors = '';
$myemail = 'whitecoveporthgwidden@gmail.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['email']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$message = $_POST['message'];
$last_name = $_POST['lastName'];
$phone_number = $_POST['phoneNumber'];
$from_date = $_POST['fromDate'];
$to_date = $_POST['toDate'];
$number_adults = $_POST['numberAdults'];
$number_children = $_POST['numberChildren'];
$age_children = $_POST['ageChildren'];
$dog = $_POST['haveDog'];
$address = $_POST['address'];
$city = $_POST['city'];
$post_code = $_POST['postCode'];
$country = $_POST['country'];
$names_list = $_POST['namesList'];

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Contact form submission: $name";
	$email_body = "You have received a new message from the White Cove bookings page. ".
	" Here are the details:\n Name: $name \n Last name: $last_name \n Email: $email_address \n Phone number: $phone_number \n From date: $from_date \n To date: $to_date \n Number of adults: $number_adults \n Number of children: $number_children \n Age of children: $age_children \n Dog: $dog \n Address line 1: $address \n City or Town: $city \n Post code: $post_code \n Country: $country \n List of names: $names_list \n Message: \n $message"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: contact-form-thank-you.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>