<?php
if($_GET['pwd'] != '2c8d72a50650b58af33d5206147fe9d6c12856b87c655ca2a979f2db'){
    header("Location: https://google.com");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="node_modules/simplebar/dist/simplebar.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" href="resources/splash.png">
    <title> Admin وەزن و قافییە</title>
</head>

<body>
    <div class="header">
        <img src="resources/splash.png" alt="" id="logo">
        <h3 style="color: whitesmoke">Admin Panel</h3>
        <span id="copyright">©Ari Qaradaghi</span>
    </div>

    <div class="container-fluid">
        <h3>ووشە داخڵکراوەکان</h3>
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>ڕەتکردنەوە</th>
                    <th>وەرگرتن</th>
                    <th>ووشە</th>
                    <th>بەشداربوو</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once("dbConn.php");
                    $pending_words = $conn -> query("SELECT * FROM pending_words");
                    if(mysqli_num_rows($pending_words) > 0){
                        while($pending_word = $pending_words -> fetch_assoc()){
                            echo '<tr>
                            <td><button type="button" name="" id="reject" class="btn btn-danger" btn-lg btn-block data-word="' . $pending_word['word'] . '" data-contributor="' . $pending_word['suggester'] . '"">ڕەتکردنەوە</button></td>
                            <td><button type="button" name="" id="accept" class="btn btn-success" btn-lg btn-block data-word="' . $pending_word['word'] . '" data-contributor="' . $pending_word['suggester'] . '"">وەرگرتن</button></td>
                                <td scope=" row">' . $pending_word['word'] . '</td>
                                <td scope=" row">' . $pending_word['suggester'] . '</td>
                            </tr>';
                        }
                    }
                ?>
                
            </tbody>
        </table>
    </div>
    <div class="container-fluid">
        <h3>هۆنراوە داخڵکراوەکان</h3>
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>ڕەتکردنەوە</th>
                    <th>وەرگرتن</th>
                    <th>هۆنراوە</th>
                    <th>شاعیر</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $pending_poems = $conn -> query("SELECT * FROM pending_poems");
                    if(mysqli_num_rows($pending_poems) > 0){
                        while($pending_poem = $pending_poems -> fetch_assoc()){
                            echo '<tr>
                            <td><button type="button" name="" id="reject" class="btn btn-danger" btn-lg btn-block data-poet="' . $pending_poem['poet'] . '"">ڕەتکردنەوە</button></td>
                            <td><button type="button" name="" id="accept" class="btn btn-success" btn-lg btn-block  data-poet="' . $pending_poem['poet'] . '"">وەرگرتن</button></td>
                                <td class="poem" scope=" row">' . $pending_poem['poem'] . '</td>
                                <td scope=" row">' . $pending_poem['poet'] . '</td>
                            </tr>';
                        }
                    }
                ?>
                
            </tbody>
        </table>
    </div>
    <hr class="style14">
    <div class="links">
        <a target="_blank" href="https://github.com/ari-99/WaznUQafiya"
            aria-placeholder="My Project is open-source! :)"><i class="fab fa-github"></i></a>
        <a target="_blank" href="https://www.facebook.com/ary56"><i class="fab fa-facebook"></i></a>
        <a target="_blank" href="https://twitter.com/arriii99"><i class="fab fa-twitter"></i></a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="node_modules/simplebar/dist/simplebar.js"></script>
    <script src="node_modules/clipboard/dist/clipboard.min.js"></script>
    <script src="admin.js"></script>
</body>

</html>