<?php
session_start();
$coupon=0;
$mark=0;
$categorie=0;
$database = new PDO("mysql:host=localhost;dbname=gestion_coupon","root","");

//----------------------------pour LES CATEGORIES-----------------------------------------

$sqlcat = 'SELECT * FROM categorie';
    $stmt = $database->prepare($sqlcat);
    $stmt->execute();
    // Récupération des résultats
    $nbr_cat = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($nbr_cat as $ligne) {
        $categorie++;
     }  

     $_SESSION['$categorie']=$nbr_cat;

//----------------------------pour les COUPONS------------------------------------------
$sqlcoup = 'SELECT * FROM coupon';
    $stmt = $database->prepare($sqlcoup);
    $stmt->execute();
    // Récupération des résultats
    $nbr_coup = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($nbr_coup as $ligne) {
        $coupon++;
     }  

     $_SESSION['$coupon']=$nbr_coup;

//----------------------------pour les MARKS------------------------------------------
     $sqlmark = 'SELECT * FROM mark';
         $stmt = $database->prepare($sqlmark);
         $stmt->execute();
         // Récupération des résultats
         $nbr_mark = $stmt->fetchAll(PDO::FETCH_ASSOC);
         foreach ($nbr_mark as $ligne) {
             $mark++;
          }  
     
          $_SESSION['$mark']=$nbr_mark;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="espace.css">
    <title>Document</title>
    <script type="text/javascript" src="gap.js"></script>
    <style>
    @media (max-width: 991px) {
    .navigation {
        left: -300px;
    }
    .main {
        width: 100%;
        left: 0;

    }
    .navigation.active {
        width: 300px;
        left: 0;
    }
    .main.active {
        left: 300px;
        /* left: 0px; */

    }
    .cardBox {
        grid-template-columns: repeat(2,1fr);
    }
}

@media (max-width:768px) {
    .details {
        grid-template-columns: repeat(1,1fr);
    }

    .GS {
        overflow-x: auto;

    } 
    .status.des,
    .status.indes{
        white-space: nowrap;
    }
}

@media (max-width: 480px) {
    .cardBox {
        grid-template-columns: repeat(1,1fr);
    }
    .cardHeader h2{
        font-size: 20px;
    }
    .user {
        min-width: 40px;
    }
    .navigation {
        width: 100%;
        left: -100%;
        z-index: 1000;
    }
    .navigation.active {
        width: 100%;
        left: 0;
    }
    .toggle {
        z-index: 10001;
         
    }
    .main.active {
        left: 0px;

    }
    .main.active .toggle {
        position: fixed;
        right: 0;
        left: initial;
        color: var(--white);
    }
}
</style>
</head>
<body>
<div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <img src="https://th.bing.com/th/id/R.4199176c190492e3e1ff81babf864df1?rik=OXzy5Op%2fnIAvmA&pid=ImgRaw&r=0" alt="" height="94px" width="94px"  >
                        </span>
                    </a>
                </li>
                <li>
                    <a href="admin.php">
                        <span class="icon">
                            <img src="icon/homeT1.ico" height="32px" width="32px"  >
                        </span>
                        <span class="title">Accueil</span>
                    </a>
                </li>
                <li>
                    <a href="coupon.php">
                        <span class="icon">
                            <img src="icon/coupon.ico" alt=""  height="32px" width="32px" >
                        </span>
                       <span class="title">Gestion des Coupons</span>
                    </a>
                </li>
                <li>
                    <a href="categorie.php">
                        <span class="icon">
                            <img src="icon/categorie.ico" alt=""  height="32px" width="32px" >
                        </span>
                       <span class="title">Gestion des Catégories</span>
                    </a>
                </li>
                <li>
                    <a href="mark.php">
                        <span class="icon">
                            <img src="icon/mark.ico" alt=""  height="32px" width="32px" >
                        </span>
                       <span class="title">Gestion des Marks</span>
                    </a>
                </li>
                <li>
                    <a href="accueil.php">
                        <span class="icon">
                            <img src="icon/LOGOU3.ico" alt=""   height="32px" width="32px" >
                        </span>
                        <span class="title">Déconnexion</span>
                    </a>
                </li>
            </ul>
        </div>
    </div> 

    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <img src="icon/menuT1.ico" alt="" height="64px" width="64px" >
            </div>
            <div class="search">
                <label for="">
                    <input type="text" name="" id="" placeholder="Search here">
                    <!-- <img src="55h/search1.ico" alt=""  height="32px" width="32px" > -->
                </label>
            </div>
            <div class="user">
                <img src="https://th.bing.com/th/id/R.4199176c190492e3e1ff81babf864df1?rik=OXzy5Op%2fnIAvmA&pid=ImgRaw&r=0" alt=""  height="94px" width="94px">
            </div>
   </div>
   <br>
   <br>
   <br>
   <br>
    <div class="details">
        <div class="GS">
                <div class="cardHeader">
                    <h2>     Bonjour Mensieur admin dans votre espace personnel<?php 
                        //echo $nom." ". $prenom;
                    ?></h2>
                    <!-- <a href="#" class="btn">View All</a> -->
                </div>
        </div>
</div>
<br>
<br>
<br>
<br>
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?php  echo $coupon;?></div>
                        <div class="cardName">Coupons</div>
                    </div>
                    <div class="iconBx"> 
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php  echo $categorie; ?></div>
                        <div class="cardName">Catégories</div>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php  echo $mark;  ?></div>
                        <div class="cardName">Marks</div>
                    </div>
                </div>
            </div>
    <script>
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');

        toggle.onclick =function(){
            navigation.classList.toggle('active');
            main.classList.toggle('active');

        }

        let list =document.querySelectorAll('.navigation li ');
        function activeLink(){
            list.forEach((item) =>
            item.classList.remove('hovered'));
            this.classList.add('hovered');
        }  
        list.forEach((item) =>
        item.addEventListener('mouseover',activeLink));
           
    </script>
</body>
</html>