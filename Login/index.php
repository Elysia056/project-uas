<?php
session_start();
if (isset($_SESSION['username'])) {
    echo "<h2>Halo, " . $_SESSION['username'] . "!</h2>";
    echo "<p>Anda sudah login. <a href='logout.php'>Logout</a></p>";
    header("login.php");
    die();
    
}
?>

<html>
    <head>

    </head>
<body>
<center>
    <form action=login.php method=post>
<?php
session_start();
$username = $_POST['user'];
    $password = $_POST['pass'];
$user = "admin";
$pass = "admin123";


    if ($username == $user && $password == $pass) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
    } else {
        header("Location: login.php");
    }

?>
<input type=submit value=Back>
</center>
</body>
</html>