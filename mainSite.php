<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css2?family=PT+Sans&display=swap' rel='stylesheet'>
    <script src='https://kit.fontawesome.com/1b775f8497.js' crossorigin='anonymous'></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles1.css" type="text/css">
    <title>Main Site</title>
</head>
<body>
    <div id="marginxSmall"></div>
    <div id="header">
        <div>
            <i class="fas fa-home"></i>
            Home
        </div>
        <div>
            Aktualnosci
        </div>
    </div>
    <div id="marginxSmall"></div>
    <div id="content">
        <?php
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbname = "jdrozd";

        $link = mysqli_connect($host, $user, $password, $dbname);
        mysqli_query($link, "set names utf8");

        $query = "SELECT * FROM elementy;";
        $queryRes = mysqli_query($link, $query);
        $results = mysqli_fetch_all($queryRes);
        $i = 0;

        for($i = 0; $i < count($results); $i++){
            if($results[$i]){
                if($results[$i][1] == 'news'){
                    echo "<div class='news'>
                    <div class='newsHeader'>" . $results[$i][2] . "</div>
                    <h3>". $results[$i][3] ."</h3>
                    <p>". $results[$i][4] ."</p>
                    <a href='". $results[$i][5] ."'><button class='more'>Czytaj...</button></a>
                    </div>";
                }else if($results[$i][1] == 'info'){    
                    echo "<div id='info'>
                    <div id='infoHeader'>
                       ". $results[$i][2] ."
                    </div>
                    <h3>" .$results[$i][3] ."</h3>
                    <p>".$results[$i][4]."</p>
                    <div id='details'>
                    <a href='". $results[$i][5] ."'><button>Szczegóły</button></a>
                    </div>
                </div>";
                }else{
                    echo "blad, cos poszlo nie tak";
                }
            }
        }
        ?>
        <div id="footer">
            Stopka ©ZSŁ Jakub Drozd
        </div>
        <!-- <div class="news">
            <div class="newsHeader">UWAGA! Ogłoszenie najwyższej wagi</div>
            <h3>Lorem ipsum xyz</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores doloremque molestias molestiae ea voluptatem. Vel neque, libero sed eveniet aspernatur amet, reprehenderit dolorum totam a aperiam quos accusantium, vero voluptates.</p>
            <a href="http://www.google.com"><button class="more">Czytaj...</button></a>
        </div>
        <div class="news">
            <div class="newsHeader">UWAGA! Ogłoszenie najwyższej wagi</div>
            <h3>Lorem ipsum xyz</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores doloremque molestias molestiae ea voluptatem. Vel neque, libero sed eveniet aspernatur amet, reprehenderit dolorum totam a aperiam quos accusantium, vero voluptates.</p>
            <button class="more">Czytaj...</button>
        </div>
        <div class="news">
            <div class="newsHeader">UWAGA! Ogłoszenie najwyższej wagi</div>
            <h3>Lorem ipsum xyz</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores doloremque molestias molestiae ea voluptatem. Vel neque, libero sed eveniet aspernatur amet, reprehenderit dolorum totam a aperiam quos accusantium, vero voluptates.</p>
            <button class="more">Czytaj...</button>
        </div>
        <div class="news">
            <div class="newsHeader">UWAGA! Ogłoszenie najwyższej wagi</div>
            <h3>Lorem ipsum xyz</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores doloremque molestias molestiae ea voluptatem. Vel neque, libero sed eveniet aspernatur amet, reprehenderit dolorum totam a aperiam quos accusantium, vero voluptates.</p>
            <button class="more">Czytaj...</button>
        </div>
        <div id="info">
            <div id="infoHeader">
                Nowa informacja prosto dla ciebie byczku!
            </div>
            <h3>Loremik</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut quia animi mollitia voluptate nulla. Iusto mollitia earum facilis, a fugiat deleniti atque inventore, ullam ab sit unde dignissimos quidem maiores!</p>
            <div id="details">
                <button>Szczegóły</button>
            </div>
        </div>
    </div>
    <div id="footer">
        Stopka ©ZSŁ Jakub Drozd
    </div> -->
</body>
</html>