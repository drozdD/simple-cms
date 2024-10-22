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
<div id='editWindow'>
    <h2>Nowy News</h2>
    <form action='editSite.php' method='POST'>
        <label>Top header:</label>
        <input type='text' size='50'name='top'> <br><br>
        <label>Title: </label>
        <input type='text' size='50' name='title'><br><br>
        <label>Text:</label>
        <textarea rows='2' cols='60' name='text'></textarea><br><br>
        <label>Button link source:</label>
        <input type='text' size='50' name='link'>
        <button type='submit' name='newNews' class='edit' value = '1' style='margin-top: 1%; margin-bottom: 1%; margin-right: 1%; float: right;'>
            Zapisz
        </button>
        <button type='submit' class='del' style='margin-top: 1%; margin-bottom: 1%; float: right;'>
            Anuluj
        </button>
    </form>
</div>
</body>
</html>