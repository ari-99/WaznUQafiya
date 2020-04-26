<?php

    require_once("dbConn.php");
    if(isset($_POST['poem'])){
        $poem = $_POST['poem'];
        $poet = $_POST['poet'];
        // echo "SELECT poem, CASE WHEN poem(poem, -" . $numLetters . ") = '' THEN NULL WHEN poem(poem, -" . $numLetters . ") != '" . $poem . "' THEN NULL ELSE TRUE END AS poem1 FROM poemlist HAVING poem1 IS NOT NULL;";
        $checkDUP = $conn -> query("SELECT poem from poems WHERE poem = '$poem'") or die("duplicate db entry");
        if(mysqli_num_rows($checkDUP) == 0){
            $result = $conn -> query("INSERT INTO pending_poems(poem, poet) VALUES('$poem', '$poet')") or die("duplicate entry");
            if($result){
                echo "success";
            }
        } else {
            echo "duplicate db entry";
        }
    }

?>