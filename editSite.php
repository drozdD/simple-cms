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
    <div id="top">
        <a href="edit.php">Tabela użytkowników</a>
        <a href="newNews.php">Dodaj newsa</a>
        <a href="newInfo.php">Dodaj informacje</a>
        <a href="index.html">Wyloguj</a>
    </div>
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

        if(isset($_POST['save'])){
            $id = intval(substr($_POST['save'], -1));
            $top = $_POST['top'];
            $title = $_POST['title'];
            $text = $_POST['text'];
            $lin = $_POST['link'];
            $link = mysqli_connect($host, $user, $password, $dbname);
            $qqq = "UPDATE elementy SET topik = '$top', header = '$title', txt = '$text', link = '$lin' WHERE id = $id";
            mysqli_query($link, $qqq);
            $_POST['save'] =  '';
        }

        if(isset($_POST['newNews'])){
            //echo 'weszlop tu';
            $top = $_POST['top'];
            $title = $_POST['title'];
            $text = $_POST['text'];
            $lin = $_POST['link'];
            $qqq = "INSERT INTO elementy (typ, topik, header, txt, link) VALUES ('news', '$top', '$title', '$text', '$lin');";
            mysqli_query($link, $qqq);
            $_POST['newNews'] =  '';
        }

        if(isset($_POST['newInfo'])){
            //echo 'weszlop tu';
            $top = $_POST['top'];
            $title = $_POST['title'];
            $text = $_POST['text'];
            $lin = $_POST['link'];
            $qqq = "INSERT INTO elementy (typ, topik, header, txt, link) VALUES ('info', '$top', '$title', '$text', '$lin');";
            mysqli_query($link, $qqq);
            $_POST['newInfo'] =  '';
        }

        if(isset($_POST['name'])){
            if(substr($_POST['name'], 0, 1) == 'd'){
                $id = intval(substr($_POST['name'], 1));
                $query = "DELETE FROM elementy WHERE id = $id;";
                mysqli_query($link, $query);
                $_POST['name'] = '';
                header('Location: editSite.php');
                exit();
            }else if(substr($_POST['name'], 0, 1) == 'e'){
                $id = substr($_POST['name'], 1);
                echo $_POST['name'];
                echo "<div id='editWindow'>
                <h2>Edycja</h2>
                <form action='editSite.php' method='POST'>
                    <label>Top header:</label>
                    <input type='text' size='50'name='top'> <br><br>
                    <label>Title: </label>
                    <input type='text' size='50' name='title'><br><br>
                    <label>Text:</label>
                    <textarea rows='2' cols='60' name='text'></textarea><br><br>
                    <label>Button Link source:</label>
                    <input type='text' size='50' name='link'>
                    <button type='submit' name='save' class='edit' value = '". $id . "' style='margin-top: 1%; margin-bottom: 1%; margin-right: 1%; float: right;'>
                        Zapisz
                    </button>
                    <button type='submit' class='del' style='margin-top: 1%; margin-bottom: 1%; float: right;'>
                        Anuluj
                    </button>
                </form>
                </div>";
                $_POST['name'] = '';
            }
        }

        $query = "SELECT * FROM elementy;";
        $queryRes = mysqli_query($link, $query);
        $results = mysqli_fetch_all($queryRes);
        $i = 0;

        for($i = 0; $i < count($results); $i++){
            if($results[$i]){
                if($results[$i][1] == 'news'){
                    $e = 'e' . $results[$i][0];
                    $d = 'd' . $results[$i][0];
                    echo "<div class='news'>
                    <div class='newsHeader'>" . $results[$i][2] . "</div>
                    <h3>". $results[$i][3] ."</h3>
                    <p>". $results[$i][4] ."</p>
                    <a href='". $results[$i][5] ."'><button class='more'>Czytaj...</button></a>
                    <form action='editSite.php' method='POST' style='margin-top: 1%;'>
                        <button type='submit' name='name' value=". $e . " class='edit'>
                            <i class='fas fa-edit'></i>
                            Edytuj
                        </button>

                        <button type='submit' name='name' value=". $d ." class='del'>
                            <i class='fas fa-trash-alt'></i>
                            Usuń
                        </button>
                    </form>
                    </div>";
                }else if($results[$i][1] == 'info'){
                    $e = 'e' . strval($results[$i][0]);
                    $d = 'd' . strval($results[$i][0]);
                    echo "<div id='info'>
                        <div id='infoHeader'>
                        ". $results[$i][2] ."
                        </div>
                        <h3>" .$results[$i][3] ."</h3>
                        <p>".$results[$i][4]."</p>
                        <div id='details'>
                            <a href='". $results[$i][5] ."'><button>Szczegóły</button></a>
                        </div>
                        <div style='min-height: 40px'>
                        <form action='editSite.php' method='POST'>
                            <button value=". $e . " type='submit' name='name' class='edit'>
                                <i class='fas fa-edit'></i>
                                Edytuj
                            </button>

                            <button value=" . $d ."  type='submit' name='name' class='del'>
                                <i class='fas fa-trash-alt'></i>
                                Usuń
                            </button>
                        </form>
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
</body>
</html>