<?php
if (empty($_POST) === false) {
	$errors = array();
	$name 		= $_POST['name'];
	$email		= $_POST['email'];
	$message 	= $_POST['message'];
	
	if (empty($name) === true || empty($email) === true || empty($message) === true){
		$errors[] = 'Name, email, and message are required';
	}
	else {
		if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			$errors[] = 'email address is not valid';
		}
		if (ctype_space(str_replace(' ', '', $name)))
		if (ctype_alpha($name) === false) {
			$errors[] = 'Name must contain only letters';
		}
	}
	if (empty($errors) === true) {
		mail('christycasey25@gmail.com','Contact Form Submission from:'.$name,$message,'From:'.$email);
		header('Location: index.php?sent');
		exit();
	}
	
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Contact Form</title>
		<link rel="stylesheet" href="../style.css">
	</head>
	<body>
	<?php
		if (isset ($_GET['sent']) === true){
			echo '<p class="thanks">Thanks for contacting us!</p><br><a href="" class="blackbutton">Back to Home</a>';
		} else {
			if (empty($errors)===false) {
				echo '<ul>';
				foreach($errors as $error) {
					echo '<li>', $error,'</li>';
				}
				echo '<ul>';
			}
			?>
			<form action="" method="post">
				<p>
					<label for="name">Name:</label><br>
					<input type="text" name="name" id="name" <?php if (isset($_POST['name'])  === true) {echo 'value="',strip_tags($_POST['name']),'"';} ?> >
				</p>
				<p>
					<label for="email">Email:</label><br>
					<input type="text" name="email" id="email" <?php if (isset($_POST['email'])  === true) {echo 'value="',strip_tags($_POST['email']), '"';} ?>>	
				</p>
				<p>
					<label for="message">Message:</label><br>
					<textarea name="message" id="message"><?php if (isset($_POST['message'])  === true) {echo strip_tags($_POST['message']);} ?></textarea>
				</p>
				<input class="submitbutton" type="submit" value="submit">
			</form>
			<?php
		}
		?>
	</body>

	
</html>