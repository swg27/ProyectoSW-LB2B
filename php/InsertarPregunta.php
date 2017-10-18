<?php

ob_start();
session_start();

if(isset($_SESSION['user'])!=""){
    header("Location: index.php");
}
include_once '../others/Dbconnect.php';

$error = false;

if(!isset($_FILES["image"]) || $_FILES["image"]["error"] > 0){
    $sql="INSERT INTO Preguntas(dificultad, tema, pregunta, respuesta, no_respuesta_1, no_respuesta_2, no_respuesta_3, email)
          VALUES ($_POST[level],'$_POST[tema]','$_POST[question]','$_POST[correctAns]','$_POST[incorrectAns1]','$_POST[incorrectAns2]','$_POST[incorrectAns3]','$_POST[email]')";
}
else {
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384;

    if (in_array($_FILES['image']['type'], $permitidos) && $_FILES['image']['size'] <= $limite_kb * 1024) {

        // Archivo temporal
        $imagen_temporal = $_FILES['image']['tmp_name'];

        // Tipo de archivo
        $tipo = $_FILES['image']['type'];

        $data = file_get_contents($imagen_temporal);

        $data=$conn->real_escape_string($data);

        $sql = "INSERT INTO Preguntas(dificultad, tema, pregunta, respuesta, no_respuesta_1, no_respuesta_2, no_respuesta_3, email, image, tipo_imagen)
          VALUES ($_POST[level],'$_POST[tema]','$_POST[question]','$_POST[correctAns]','$_POST[incorrectAns1]','$_POST[incorrectAns2]','$_POST[incorrectAns3]','$_POST[email]', '$data', '$tipo')";
    } else {
        echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
    }
}
if(!mysqli_query($conn, $sql)){
    echo "<p> <button onclick='window.history.back()'>Volver atras</button></p>";
    die('Error: ' . mysqli_error($conn));
}

echo "one record added";

echo "<p> <a href='visualizardatos.php'>Visualizar Registros</a>";

mysqli_close($conn);

?>
