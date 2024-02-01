<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Accueil</title>
    <style>
        /* Your CSS styles here */
    </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar', 'corechart']
        });
        google.charts.setOnLoadCallback(drawCharts);

         function drawCharts() {
            var data = new google.visualization.arrayToDataTable([
    
            ['les statistiques', 'NOMBRE'],
            <?php
            $database = new PDO("mysql:host=localhost;dbname=gestion_coupon","root","");
          $graph_value = 0;
          $graph_value1 = 0;
          $graph_value2 = 0;
            $query = $database->prepare("SELECT * FROM `categorie` ;");
            $query->execute();
            $M = $query->fetchAll();
            foreach ($M as $ligne) {
               $graph_value++; 
            } 
            $query2 = $database->prepare("SELECT * FROM `coupon`;");
            $query2->execute();
            $M2 = $query2->fetchAll();
            foreach ($M2 as $ligne) {
               $graph_value1++; 
            } 
            $query3 = $database->prepare("SELECT * FROM `mark`;");
            $query3->execute();
            $M3 = $query3->fetchAll();
            foreach ($M3 as $ligne) {
               $graph_value2++; 
            } 
          ?>['<?php echo "categories";?>', <?php echo $graph_value;?>],
            ['<?php echo "coupons";?>', <?php echo $graph_value1;?>],
            ['<?php echo "marques";?>', <?php echo $graph_value2;?>],
        ]);

            var barOptions = {
                title: 'LE NOMBRE DE CATEGORIE , COUPON ET MARQUE',
                width: 1000,
                legend: {
                    position: 'none'
                },
                chart: {
                    title: 'LE NOMBRE DE CATEGORIE , COUPON ET MARQUE',
                    subtitle: ''
                },
                bars: 'vertical',
                axes: {
                    x: {
                        0: {
                            side: 'top',
                            label: ''
                        }
                    }
                },
                bar: {
                    groupWidth: "90%"
                }
            };

            var pieOptions = {
                title: 'les statistiques de notre site',
                width: 1000,
                height: 500,
                is3D: true,
            };

            var barChart = new google.charts.Bar(document.getElementById('top_x_div'));
            barChart.draw(data, barOptions);

            var pieChart = new google.visualization.PieChart(document.getElementById('piechart'));
            pieChart.draw(data, pieOptions);
        }
    </script>
</head>

<body>
    <div class="nav-bar">
        <div class="logo">
            <img src="https://th.bing.com/th/id/R.4199176c190492e3e1ff81babf864df1?rik=OXzy5Op%2fnIAvmA&pid=ImgRaw&r=0"
                alt="Logo" height="120px" width="120px">
        </div>
        <div class="nav-el"><a href="accueil.php">Accueil</a></div>
        <div class="nav-el"><a href="login.html">Login</a></div>
    </div>

    <div class="details" style="align-items: center; top: 70px;">
        <div class="GS">
            <div id="top_x_div" style="margin-left: 48px; margin-top: 50px; margin: 25px"></div>
            <div id="top_x_divD" style="margin-left: 48px; margin-top: 50px; margin: 25px"></div>
            <div id="piechart" style="width: 900px; height: 500px; margin-left: 48px; margin-top: 50px; margin: 25px"></div>
        </div>
    </div>

    <script>
        // Your JavaScript code here
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');

        toggle.onclick = function () {
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }

        let list = document.querySelectorAll('.navigation li ');

        function activeLink() {
            list.forEach((item) =>
                item.classList.remove('hovered'));
            this.classList.add('hovered');
        }

        list.forEach((item) =>
            item.addEventListener('mouseover', activeLink));
    </script>

</body>

</html>
