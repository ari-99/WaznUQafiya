<?php 
    $conn = mysqli_connect("localhost", "root", "12345", "wwq") or die("problem connecting to database!");

    foreach($_POST as $key => $value){
        if(isset($_POST['type'])){
            break;
        }
        mysqli_real_escape_string($conn, $_POST[$key]);
        if($key == 'poem'){
            
            $_POST[$key] = strip_tags($value, '<p><em><br><sup><strong><sub><span>');
        }else{
            $_POST[$key] = filter_var($value, FILTER_SANITIZE_STRING);
        }
    }
?>