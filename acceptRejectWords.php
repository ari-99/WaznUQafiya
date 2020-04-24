<?php

    require_once("dbConn.php");
    if(isset($_POST['word'])){
        $word = $_POST['word'];
        $contributor = $_POST['contributor'];
        $action = $_POST['action'];
        // echo "SELECT word, CASE WHEN word(word, -" . $numLetters . ") = '' THEN NULL WHEN word(word, -" . $numLetters . ") != '" . $word . "' THEN NULL ELSE TRUE END AS word1 FROM wordlist HAVING word1 IS NOT NULL;";
        if($action == "accept"){
            $result = $conn -> query("INSERT INTO wordlist(word, contributor) VALUES('$word', '$contributor')") or die("insert failed");
            if($result){
                echo "success";
                $conn -> query("DELETE FROM pending_words WHERE word = '$word'") or die("delete failed");
            }
        }else if($action == "reject"){
            $result = $conn -> query("DELETE FROM pending_words WHERE word = '$word'") or die("delete failed");
            if($result){
                echo "success";
            }
        } 
    }

?>