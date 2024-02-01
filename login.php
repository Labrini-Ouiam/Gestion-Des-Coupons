<?php
$conn = new PDO("mysql:host=localhost;dbname=gestion_coupon","root","");
$email = $_POST["login-mail"];
$password = $_POST["login-password"];

// Prepare and execute the SQL query
$sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);
$nbr=$result->rowCount();
$row = $result->fetchAll();
if ($nbr > 0) {
    header("Location: admin.php");
    exit();
} else {
    //echo $sql . " error";
    echo '<script>alert("your password or username is incorrect !")</script>';
    echo '<script> window.location.href="login.html"</script>';

}
?>
