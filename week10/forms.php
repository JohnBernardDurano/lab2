<!DOCTYPE HTML>  
<html>
<meta name="viewport" content="width=device-width", initial-scale="1.0">
    <meta charset="UTF-8">
    <title>FFHooray</title>
    <link rel="icon" type="image/x-icon" href="../images/FFHooray.png">
    <link rel="stylesheet" href="css/forms_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<head>
</head>
<body>  

<header>
        <div class="navigation">
          <a href="index.html">Home</a>|
          <a href="#">The Badudong</a>|
          <a href="resources.html">Resources</a>
      </header>

<section>
<?php

$name = $email = $gender = $messages = $website = $vtuber = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $website = test_input($_POST["website"]);
  $vtuber = test_input($_POST["vtuber"]);
  $gender = test_input($_POST["gender"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Input your details.</h2>;

<form method="post";action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="color: aliceblue; text-align:right">  
  Name: <input type="text" name="name">
  <br><br>
  E-mail: <input type="text" name="email">
  <br><br>
  Website: <input type="text" name="website">
  <br><br>
  Favorite Vtuber: <input type="text" name="vtuber"><br><br>
  Gender:
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="other">Other
  <br><br>
  Message: <textarea name="message" rows="5" cols="40"></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">
</form>

<?php
echo "<h2>Your Input:</h2>";
echo "<div style=\"color:aliceblue;\">" . $name . "</div>";
echo "<br>";
echo "<div style=\"color:aliceblue;\">" . $email . "</div>";
echo "<br>";
echo "<div style=\"color:aliceblue;\">" . $website . "</div>";
echo "<br>";
echo "<div style=\"color:aliceblue;\">" . $vtuber . "</div>";
echo "<br>";
echo "<div style=\"color:aliceblue;\">" . $gender . "</div>";
echo "<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "guestdb";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "INSERT INTO guests (gstname, email, website, vtuber, messages)
	VALUES ('$name', '$email', '$website', '$vtuber', '$messages')";
	
	if ($conn->query($sql) === TRUE) {
	echo "Thank you for voting for my website.";
	} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();
}
?>
</section>

    <footer>
        <p>&quot;You are now under the Badudong that is always watching.&quot;</p>
      </footer>
</body>
</html>