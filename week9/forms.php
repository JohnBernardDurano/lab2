<!DOCTYPE HTML>  
<html>
<meta name="viewport" content="width=device-width", initial-scale="1.0">
    <meta charset="UTF-8">
    <title>FFHooray</title>
    <link rel="icon" type="image/x-icon" href="../images/FFHooray.png">
    <link rel="stylesheet" href="css/index_style.css">
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

$name = $email = $gender = $messages = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $website = test_input($_POST["website"]);
  $vtuber = test_input($_POST["vtuber"]);
  $messages = test_input($_POST["messages"]);
  $gender = test_input($_POST["gender"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<div>
            <img src="images/badudong.png" alt="The Badudong" >
        </div>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="text-align: right; color:aliceblue;">  
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
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $vtuber;
echo "<br>";
echo $gender;
echo "<br>";
echo $messages;
?>
</section>

    <footer>
        <p>&quot;You are now under the Badudong that is always watching.&quot;</p>
      </footer>
</body>
</html>