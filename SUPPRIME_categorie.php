<?php
$id_mark = $_GET['id'];
try {
    $conn = new PDO("mysql:host=localhost;dbname=gestion_coupon","root","");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo '<script>alert("Voulez vous supprimer cette catégorie  ? ")</script>';
    $sql = "DELETE FROM categorie where id_cat='$id_mark' ";
    $conn->exec($sql);
    
    echo '<script>alert("la Catégorie est supprimer avec succès .")</script>';
    echo '<script> window.location.href="admin.php"</script>';
    
  } catch(PDOException $e) {
    //echo $sql . "<br>" . $e->getMessage();
        echo '<script>alert("la Catégorie n\'est pas supprimer avec succès   !")</script>';
        echo '<script> window.location.href="categorie.php"</script>';
  }
?>