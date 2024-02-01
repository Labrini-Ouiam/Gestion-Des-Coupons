<?php
session_start();
$idCoupon = $_SESSION['idCoupon'];

// Vérifiez si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérez les données du formulaire
    $nomCoupon = $_POST['nom_coupon'];
    $pourcentage = $_POST['poursentage'];
    $dateDebut = $_POST['date_debut'];
    $dateFin = $_POST['date_fin'];
    $idMark = $_POST['id_mark'];
    try {
        $database = new PDO("mysql:host=localhost;dbname=gestion_coupon", "root", "");
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'UPDATE coupon SET nom_coupon = :nom, poursentage = :pourcentage, date_debut = :date_debut, date_fin = :date_fin, id_mark = :id_mark WHERE id_coupon = :id_coupon';
        $stmt = $database->prepare($sql);
        $stmt->bindParam(':nom', $nomCoupon);
        $stmt->bindParam(':pourcentage', $pourcentage);
        $stmt->bindParam(':date_debut', $dateDebut);
        $stmt->bindParam(':date_fin', $dateFin);
        $stmt->bindParam(':id_mark', $idMark);
        $stmt->bindParam(':id_coupon', $idCoupon);
        $stmt->execute(); // Use execute instead of exec

        echo '<script>alert("le coupon est modifier avec succès .")</script>';
        echo '<script> window.location.href="admin.php"</script>';
    } catch (PDOException $e) {
        //echo $sql . "<br>" . $e->getMessage();
        echo '<script>alert("Ce coupon est deja existe !")</script>';
        echo '<script> window.location.href="coupon.php"</script>';
    }
}
?>
