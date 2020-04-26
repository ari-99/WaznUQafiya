<?php
    require_once("dbConn.php");
    if(isset($_POST['arrow'])){
        $arrow = $_POST['arrow'];
        $pid = $_POST['pid'];
        if($arrow == 'leftArrow'){
            $poemQueryPID = $conn -> query("SELECT pid FROM `poems` WHERE pid < $pid ORDER BY pid DESC LIMIT 1");
        }else {
            $poemQueryPID = $conn -> query("SELECT pid FROM `poems` WHERE pid > $pid ORDER BY pid ASC LIMIT 1");
        }
        if(mysqli_num_rows($poemQueryPID) == 1){
            $PID = $poemQueryPID -> fetch_assoc();
            echo "<script>var pid = {$PID['pid']}</script>";
            $poemQuery = $conn -> query("SELECT * FROM `poems` WHERE pid = {$PID['pid']}");
            if(mysqli_num_rows($poemQuery) == 1){
                $poem = $poemQuery -> fetch_assoc();
                echo $poem['poem'] . '<h4 id="author">' . $poem['poet'] . '-</h4>';
            }
        }else{
            echo 'none';
        }
    }
?>