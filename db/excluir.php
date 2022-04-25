<?php
require_once('config.php');

$produtoName = $_POST['produtoName'];
$produtoPeriodo = $_POST['produtoPeriodo'];

$sql = mysqli_query($con, "SELECT * FROM products WHERE 1");

if(mysqli_num_rows($sql) > 0){
    mysqli_query($con, "DELETE FROM products WHERE nome = '$produtoName' AND periodo = '$produtoPeriodo'");
    header('Location: ../index.php');
}
?>