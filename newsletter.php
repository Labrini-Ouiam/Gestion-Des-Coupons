<?php include 'db.php';

$nom = $_POST['firstName'];
$prenom = $_POST['lastName'];
$email = $_POST['email'];

// Insert data into the database
$sql = "INSERT INTO utilisateur (nom, prenom, email) VALUES ('$nom', '$prenom', '$email')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
        exit(); 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close(); ?>