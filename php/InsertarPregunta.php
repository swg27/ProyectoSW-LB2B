<?php

ob_start();
session_start();

if(isset($_SESSION['user'])!=""){
    header("Location: index.php");
}
include_once '../others/Dbconnect.php';

$error = false;

$sql="INSERT INTO Preguntas(dificultad, tema, pregunta, respuesta, no_respuesta_1, no_respuesta_2, no_respuesta_3, email)
        VALUES ($_POST[level],'$_POST[tema]','$_POST[question]','$_POST[correctAns]','$_POST[incorrectAns1]','$_POST[incorrectAns2]','$_POST[incorrectAns3]','$_POST[email]')";

if(!mysqli_query($conn, $sql)){
    echo "<p> <button onclick='window.history.back()'>Volver atras</button></p>";
    die('Error: ' . mysqli_error($conn));
}

echo "one record added";

echo "<p> <a href='visualizardatos.php'>Visualizar Registros</a>";

mysqli_close($conn);

?>
