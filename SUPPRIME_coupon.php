<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Vérifier si l'ID du coupon est passé en paramètre
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id_coupon = $_GET['id'];

        try {
            $conn = new PDO("mysql:host=localhost;dbname=gestion_coupon", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Supprimer le coupon
            $sql = "DELETE FROM coupon WHERE id_coupon = :id_coupon";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id_coupon', $id_coupon);
            $stmt->execute();

            echo '<script>alert("Le coupon a été supprimé avec succès.")</script>';
            echo '<script>window.location.href="admin.php"</script>';
        } catch (PDOException $e) {
            // Gérer les erreurs éventuelles
            echo '<script>alert("Une erreur s\'est produite lors de la suppression du coupon.")</script>';
            echo '<script>window.location.href="admin.php"</script>';
        }
    } else {
        // Redirection si l'ID du coupon n'est pas défini
        echo '<script>window.location.href="admin.php"</script>';
    }
} else {
    // Redirection si la requête n'est pas de type GET
    echo '<script>window.location.href="admin.php"</script>';
}
?>
