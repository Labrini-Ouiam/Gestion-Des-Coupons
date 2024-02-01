<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des valeurs des inputs 
    $nom_mark = $_POST['nom_mark'];
    $id_cats = isset($_POST['id_cat']) ? $_POST['id_cat'] : [];

    // Exécution de la requête
    try {
        $conn = new PDO("mysql:host=localhost;dbname=gestion_coupon", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Utilisation d'une requête préparée pour éviter les attaques par injection SQL
        $sqlcat = 'SELECT * FROM mark WHERE nom_mark = :nom_mark';
        $stmt = $conn->prepare($sqlcat);
        $stmt->bindParam(':nom_mark', $nom_mark);
        $stmt->execute();

        // Récupération des résultats
        $nbr_cat = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Nombre de résultats
        $nombre_resultats = $stmt->rowCount();

        if ($nombre_resultats > 0) {
            echo '<script>alert("Cette marque existe déjà !")</script>';
            echo '<script>window.location.href="ajoutmark.php"</script>';
        } else {
            // Insertion de la nouvelle marque
            $sql = "INSERT INTO `mark`(`nom_mark`) VALUES (:nom_mark)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nom_mark', $nom_mark);
            $stmt->execute();

            // Récupération de l'ID de la marque nouvellement insérée
            $id_mark = $conn->lastInsertId();

            // Insertion des liens entre la marque et les catégories sélectionnées
            foreach ($id_cats as $id_cat) {
                $sql2 = "INSERT INTO `contient`(`id_mark`, `id_cat`) VALUES (:id_mark, :id_cat)";
                $stmt2 = $conn->prepare($sql2);
                $stmt2->bindParam(':id_mark', $id_mark);
                $stmt2->bindParam(':id_cat', $id_cat);
                $stmt2->execute();
            }

            echo "<script> alert('La marque a été ajoutée avec succès') </script>";
            echo '<script>window.location.href="admin.php"</script>';
        }
    } catch (PDOException $e) {
        // Gestion des erreurs
        // echo $sql . "<br>" . $e->getMessage();
        echo '<script>alert("Cette marque existe déjà !")</script>';
        echo '<script>window.location.href="ajoutmark.php"</script>';
    }
}
?>
