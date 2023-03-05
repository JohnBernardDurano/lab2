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

$gstname = $email = $gender = $messages = $website = "";
$gstnameErr = $emailErr = $genderErr = $messagesErr = $websiteErr = $vtuberErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["gstname"])) {
    $gstnameErr = "Name is required";
  } else {
    $gstname = test_input($_POST["gstname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$gstname)) {
      $gstnameErr = "Only letters and white space allowed";
    }
  }
}
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

if (empty($_POST["name"])) {
  $nameErr = "Name is required";
} else {
  $name = test_input($_POST["lastname"]);
  // check if lastname only contains letters and whitespace
  if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
    $lastnameErr = "Only letters and white space allowed";
  }
}

if (empty($_POST["email"])) {
  $emailErr = "Email is required";
} else {
  $email = test_input($_POST["email"]);
  // check if e-mail address is well-formed
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
  }
}
  
if (empty($_POST["website"])) {
  $website = "";
} else {
  $website = test_input($_POST["website"]);
  // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
  if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
    $websiteErr = "Invalid URL";
  }
}

if (empty($_POST["gender"])) {
  $genderErr = "Selecting something is required";
} else {
  $gender = test_input($_POST["gender"]);
}

if (empty($_POST["comment"])) {
  $comment = "";
} else {
  $comment = test_input($_POST["comment"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<h2>Input your details.</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="text-align: right; color:aliceblue;">  
  Name: <input type="text" name="gstname">
  <br><br>
  E-mail: <input type="text" name="email">
  <br><br>
  Website: <input type="text" name="website">
  <br><br>
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
echo "<div style=\"color:aliceblue;\">" . $gstname . "</div>";
echo "<br>";
echo "<div style=\"color:aliceblue;\">" . $email . "</div>";
echo "<br>";
echo "<div style=\"color:aliceblue;\">" . $website . "</div>";
echo "<br>";
echo "<div style=\"color:aliceblue;\">" . $gender . "</div>";
echo "<br>";
echo "<div style=\"color:aliceblue;\">" . $messages . "</div>";
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

	$servername = "localhost";
	$username = "webprogmi212";
	$password = "webprogmi212";
	$dbname = "webprogmi212";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "INSERT INTO mnturingan_myallies (firstname, lastname, email)
	VALUES ('$name', '$lastname', '$email')";
	
	if ($conn->query($sql) === TRUE) {
	echo "You just joined the alliance. There is no going back. Hehe";
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