<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des valeurs des inputs
    $nom_coupon = $_POST['nom_coupon'];
    $poursentage = $_POST['poursentage'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $id_mark = $_POST['id_mark'];

    try {
        // Connexion à la base de données
        $database = new PDO("mysql:host=localhost;dbname=gestion_coupon", "root", "");
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Vérifier si le coupon existe déjà
        $sqlCheck = 'SELECT * FROM coupon WHERE nom_coupon = :nom_coupon';
        $stmtCheck = $database->prepare($sqlCheck);
        $stmtCheck->bindParam(':nom_coupon', $nom_coupon);
        $stmtCheck->execute();

        if ($stmtCheck->rowCount() > 0) {
            echo '<script>alert("Ce coupon existe déjà !")</script>';
            echo '<script>window.location.href="coupon.php"</script>';
        } else {
            // Insérer le nouveau coupon dans la base de données
            $sqlInsert = 'INSERT INTO coupon (nom_coupon, poursentage, date_debut, date_fin, id_mark) VALUES (:nom_coupon, :poursentage, :date_debut, :date_fin, :id_mark)';
            $stmtInsert = $database->prepare($sqlInsert);
            $stmtInsert->bindParam(':nom_coupon', $nom_coupon);
            $stmtInsert->bindParam(':poursentage', $poursentage);
            $stmtInsert->bindParam(':date_debut', $date_debut);
            $stmtInsert->bindParam(':date_fin', $date_fin);
            $stmtInsert->bindParam(':id_mark', $id_mark);
            $stmtInsert->execute();

            echo '<script>alert("Coupon ajouté avec succès !")</script>';
            echo '<script>window.location.href="admin.php"</script>';
        }
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
}
?>
