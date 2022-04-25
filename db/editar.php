<?php
require_once('config.php');

$produtName = $_POST['produtoName'];
$quant = $_POST['quant'];
$name = $_POST['nome'];

$sql = mysqli_query($con, "SELECT * FROM products WHERE 1");
if(mysqli_num_rows($sql) > 0){
    mysqli_query($con, "UPDATE products SET quantidade = '$quant', nome = '$name' WHERE nome = '$produtName'");
    header('Location: ../index.php');
}

?>