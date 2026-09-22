<?php

 
session_start();
 
if (isset($_POST["playlist"])) {
 
    $_SESSION["playlist"] = $_POST["playlist"];
 
    $_SESSION["playlist"] = array();
 
    header("Location: index.php");
    exit();
 
} else {
 
    echo "Nome da playlist não informado.";
}
 
?>
