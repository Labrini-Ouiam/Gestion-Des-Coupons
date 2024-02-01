
<?php
$id_mark = $_GET['id'];

try {
    $conn = new PDO("mysql:host=localhost;dbname=gestion_coupon", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo '<script>alert("Voulez vous supprimer cette mark  ? ")</script>';

    // Supprimer les relations dans la table contient
    $sql_delete_relations = "DELETE FROM contient WHERE id_mark = :id_mark";
    $stmt_delete_relations = $conn->prepare($sql_delete_relations);
    $stmt_delete_relations->bindParam(':id_mark', $id_mark);
    $stmt_delete_relations->execute();

    // Supprimer la marque elle-même
    $sql_delete_mark = "DELETE FROM mark WHERE id_mark = :id_mark";
    $stmt_delete_mark = $conn->prepare($sql_delete_mark);
    $stmt_delete_mark->bindParam(':id_mark', $id_mark);
    $stmt_delete_mark->execute();

   echo '<script>alert("la mark est supprimer avec succès .")</script>';
    echo '<script> window.location.href="admin.php"</script>';
} catch (PDOException $e) {
    // Gestion des erreurs
    echo '<script>alert("la mark n\'est pas supprimer avec succès   !")</script>';
        echo '<script> window.location.href="mark.php"</script>';
}
?>
