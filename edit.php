<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='https://fonts.googleapis.com/css2?family=PT+Sans&display=swap' rel='stylesheet'>
    <script src='https://kit.fontawesome.com/1b775f8497.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="styles.css">
    <title>Zalogowano!</title>
    <style>
    </style>
</head>
<?php
if (!$db_link = mysqli_connect('localhost', 'root', '', 'jdrozd')) {
    echo 'Błąd podczas próby połączenia z serwerem MySQL...<br>';
    exit;
}
?>
<body>
    <div id="top">
        <a href="#">Tabela użytkowników</a>
        <a href="editSite.php">Edytuj stronę</a>
        <a href="index.html">Wyloguj</a>
    </div>
    <div id='marginSmall'></div>
        <?php
            $query = 'SELECT * FROM users';
            $queryRes = mysqli_query($db_link, $query);
            $results = mysqli_fetch_all($queryRes);
        
            if(isset($_POST['name'])){
                if(substr($_POST['name'], 0, 1) == 'd'){
                    $id = intval(substr($_POST['name'], 1));
                    $query = "DELETE FROM users WHERE id = $id";
                    $queryRes = mysqli_query($db_link, $query);
                    $_POST['name'] = '';
                }else{
                    echo "
                    <div id='main'>
                        <h2>Edycja Użytkownika</h2>
                        <form id='formik' action='edit.php' method='POST'>
                            <label>Imię i nazwisko:</label><br>
                            <input class='input' type='text' name='imieNazwisko'><br>
                            <label>Login:</label><br>
                            <input class='input' type='text' name='login'><br>
                            <label>Adres email:</label><br>
                            <input class='input' type='mail' name='email'><br>
                            <label>Hasło:</label><br>
                            <input class='input' type='password' name='password'><br>
                            <label>Powtórz hasło:</label><br>
                            <input class='input' type='password' name='password'><br>
                            <button type='submit' id='save' name='new' value='" . substr($_POST['name'], -1, 1) . "'>
                                Zapisz
                            </button>
                        </form>
                    </div>
                    ";
                    $_POST['name'] = '';
                    $_POST['new'] = '';
                    exit;
                }
                $_POST['name'] = '';
            }
            if(isset($_POST['new'])){
                $id = intval(substr($_POST['new'], 1));
                $dane = explode(" ", $_POST['imieNazwisko']);
                $imie = $dane[0];
                $nazwisko = $dane[1];
                $login = $_POST['login'];
                $mail = $_POST['email'];
                $password = $_POST['password'];
                $id = $_POST['new'];
                $query = "UPDATE users SET imie = '$imie', nazwisko = '$nazwisko', mail = '$mail', login = '$login', password = '$password' WHERE id = $id";
                $queryRes = mysqli_query($db_link, $query);
                $_POST['new'] = '';
            }
            if(isset($_POST['add'])){
                echo "
                    <div id='main'>
                        <h2>Nowy użytkownik</h2>
                        <form id='formik' action='edit.php' method='POST'>
                            <label>Imię i nazwisko:</label><br>
                            <input class='input' type='text' name='imieNazwisko'><br>
                            <label>Login:</label><br>
                            <input class='input' type='text' name='login'><br>
                            <label>Adres email:</label><br>
                            <input class='input' type='mail' name='email'><br>
                            <label>Hasło:</label><br>
                            <input class='input' type='password' name='password'><br>
                            <label>Powtórz hasło:</label><br>
                            <input class='input' type='password' name='password'><br>
                            <button type='submit' id='save' name='newUser' value='ok'>
                                Dodaj
                            </button>
                        </form>
                    </div>
                ";
                $_POST['add'] = '';
                exit;
            }
            if(isset($_POST['newUser'])){
                $dane = explode(" ", $_POST['imieNazwisko']);
                $imie = $dane[0];
                $nazwisko = $dane[1];
                $login = $_POST['login'];
                $mail = $_POST['email'];
                $password = $_POST['password'];
                $query = "INSERT INTO users (imie, nazwisko, mail, login, password) VALUES ('$imie', '$nazwisko', '$mail', '$login', '$password');";
                $queryRes = mysqli_query($db_link, $query);
                $_POST['newUser'] = '';
            }
            echo"
            <table>
            <tr class='tr'>
                <th class='ID'>ID</th>
                <th class='imieNazwisko'>Imię i nazwisko</th>
                <th class='login'>Login</th>
                <th class='typKonta'>Typ konta</th>
                <th class='edycja'>Edycja</th>
            </tr>
            ";
            $query = 'SELECT * FROM users';
            $queryRes = mysqli_query($db_link, $query);
            $results = mysqli_fetch_all($queryRes);
            for($i = 0; $i < count($results); $i++){
                echo "<tr><td>" . $results[$i][0] . "</td>
                <td>" . ucfirst($results[$i][1]) . " " . ucfirst($results[$i][2]) . "</td>
                <td>" . $results[$i][4] . "</td>
                <td>" . $results[$i][6] . "</td>
                <td>
                    <form action='edit.php' method='POST'>
                        <button type='submit' name='name' value=" . 'e' . strval($i + $results[0][0]) . " class='edit'>
                            <i class='fas fa-edit'></i>
                            Edytuj
                        </button>

                        <button type='submit' name='name' value=". "d" . strval($i + $results[0][0]) ." class='del'>
                            <i class='fas fa-trash-alt'></i>
                            Usuń
                        </button>
                    </form>
                </td>
                </tr>
                ";
            }
            echo "</table>
            <div style='width: 70%; margin:auto'>
                <form action='edit.php' method='POST'>
                    <button type='submit' name= 'add' value='ok' id='add'>
                        Nowy
                    </button>
                </form>
            </div>
            "
        ?>
    
</body>
</html>