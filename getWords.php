<?php
    $conn = mysqli_connect("localhost", "root", "", "WuQ") or die("problem connecting to database!");
    $substr = $_POST['substr'];
    $numLetters = $_POST['lettersNo'];
    // echo "SELECT word, CASE WHEN substr(word, -" . $numLetters . ") = '' THEN NULL WHEN substr(word, -" . $numLetters . ") != '" . $substr . "' THEN NULL ELSE TRUE END AS word1 FROM wordlist HAVING word1 IS NOT NULL;";
    $result = $conn -> query("SELECT word, CASE WHEN substr(word, -" . $numLetters . ") = '' THEN NULL WHEN substr(word, -" . $numLetters . ") != '" . $substr . "' THEN NULL ELSE TRUE END AS word1 FROM wordlist HAVING word1 IS NOT NULL;") or die("problem with the query!");
    
    while($res = $result -> fetch_assoc()){
        echo '<span class="word" data-clipboard-text="' . $res['word'] . '">' . $res['word'] . '</span>';
    }
