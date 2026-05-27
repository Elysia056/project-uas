<?php
  session_start();

 
  if (isset($_SESSION["login_success"])) {
    header("Location: index.php");
    die(); 
  }


  if ($_POST) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once "database.php";

    //$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    //$result = $mysqli->query($sql);


    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
    $stmt =$mysqli->prepare($sql);
    $stmt->blind_param("ss",$email,$password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

      $_SESSION["login_success"] = true;
      $_SESSION["email"] = $email;


      header("Location: index.php");
      die();
    } else {
      echo "<script>alert('Wrong email or password')</script>";
    }
  }
?>
<html>
  <head><title>Login</title></head>
  <body>
    <h1>Login</h1>
    <form method="post" action="login.php">
      Email:
      <input type="email" name="email" required>
      

      Password:
      <input type="password" name="password" required>
      

      <input type="submit" name="submit" value="Login">
    </form>
  </body>
</html>