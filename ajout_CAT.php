<?php
//session_start(); 
//$id_admi=$_SESSION['id_admin'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des valeurs des inputs 
    $cat = $_POST['cat'];
// Exécution de la requête
try {
    $conn = new PDO("mysql:host=localhost;dbname=gestion_coupon","root","");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Utilisation d'une requête préparée pour éviter les attaques par injection SQL
$sqlcat = 'SELECT * FROM categorie WHERE nom_cat = :cat';
$stmt = $conn->prepare($sqlcat);
$stmt->bindParam(':cat', $cat);  // Liaison de la valeur de $cat à la requête préparée
$stmt->execute();

// Récupération des résultats
$nbr_cat = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Nombre de résultats
$nombre_resultats = $stmt->rowCount();
    if($nombre_resultats >0){
      echo '<script>alert("cette categorie est deja existe  !")</script>';
      echo '<script> window.location.href="ajoutcategorie.php"</script>';
    }
    else{
      //$sql = "INSERT INTO `categorie`(`nom_cat`, `id_admin`) VALUES ('$cat','$id_admi')";
      //$conn->exec($sql);
      $sql = "INSERT INTO `categorie`(`nom_cat`, `id_admin`) VALUES ('$cat','1')";
      $conn->exec($sql);
      echo '<script>alert("la categorie ajouter avec succès .")</script>';
      echo '<script> window.location.href="admin.php"</script>';
    }
  } catch(PDOException $e) {
    //echo $sql . "<br>" . $e->getMessage();
        echo '<script>alert("cette categorie est deja existe  !")</script>';
        echo '<script> window.location.href="ajoutcategorie.php"</script>';
  }

  }
  
?>