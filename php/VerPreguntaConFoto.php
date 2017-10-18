<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17/10/17
 * Time: 18:48
 */

ob_start();
session_start();

if(isset($_SESSION['user'])!=""){
    header("Location: index.php");
}
include_once '../others/Dbconnect.php';
$error=false;

$preguntas=mysqli_query($conn, "SELECT * FROM Preguntas");
echo '<table border=1> 
        <tr> 
        <th>CodPregunta</th> 
        <th>Dificultad</th>  
        <th>Tema</th> 
        <th>Pregunta</th> 
        <th>Respuesta</th> 
        <th>Respuesta incorrecta 1</th> 
        <th>Respuesta incorrecta 2</th> 
        <th>Respuesta incorrecta 3</th>
        <th>email</th>
        <th>Imagen relacionada</th>
        </tr>';

while($row = mysqli_fetch_array($preguntas)){
    echo
    '<tr>
    <td align="center">'.$row['CodPregunta'].'</td>
    <td align="center">'.$row['dificultad'].'</td>
    <td align="center">'.$row['tema'].'</td>
    <td align="center">'.$row['pregunta'].'</td>
    <td align="center">'.$row['respuesta'].'</td>
    <td align="center">'.$row['no_respuesta_1'].'</td>
    <td align="center">'.$row['no_respuesta_2'].'</td>
    <td align="center">'.$row['no_respuesta_3'].'</td>
    <td align="center">'.$row['email'].'</td>
    <td align="center">'
    .'<img src="data:image/type;base64,'.base64_encode( $row['image']).'"/>'.
    '</td>
    </tr>';
}
    echo '</table>';
    $preguntas->close();
    mysqli_close($conn);

?>