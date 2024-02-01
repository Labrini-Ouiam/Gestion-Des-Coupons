<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="espace.css">
    <link rel="stylesheet" type="text/css" href="GS.css">
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
   
   <div class="details" style="align-items: center; top: 70px;">
        <div class="GS">
                <div class="cardHeader">
                    <h2>Ajouter Catégorie</h2>
                    <!-- <a href="#" class="btn">View All</a> -->
                </div>
                <table>
    <form method="post" action="ajout_CAT.php">
                    <tbody>
                        <tr>
                            <td>
                                <label for="salle">Nom de categorie :</label>
                                <input type="text" name="cat" id="cat" style="padding: 12px; width: 200px; border-radius: 10px;">
                            </td>
                            <td>
                                
                             </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button class="btn" style="width: 100px; height: 40px;">Ajouter Catégorie</button>
                            </td>
                                </form>
                            <td>
                                <button class="btn" style="width: 100px; height: 40px;" onclick="f2()">annuler</button>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
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
        function f2() {
  window.location.href="categorie.php";
    }
           
    </script>
</body>
</html>