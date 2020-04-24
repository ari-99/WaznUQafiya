<?php

    require_once("dbConn.php");
    if(isset($_POST['word'])){
        $word = $_POST['word'];
        $suggester = $_POST['suggester'];
        // echo "SELECT word, CASE WHEN word(word, -" . $numLetters . ") = '' THEN NULL WHEN word(word, -" . $numLetters . ") != '" . $word . "' THEN NULL ELSE TRUE END AS word1 FROM wordlist HAVING word1 IS NOT NULL;";
        $checkDUP = $conn -> query("SELECT word from wordlist WHERE word = '$word'") or die("duplicate db entry");
        if(mysqli_num_rows($checkDUP) == 0){
            $result = $conn -> query("INSERT INTO pending_words(word, suggester) VALUES('$word', '$suggester')") or die("duplicate entry");
            if($result){
                echo "success";
            }
        } else {
            echo "duplicate db entry";
        }
    }

?>