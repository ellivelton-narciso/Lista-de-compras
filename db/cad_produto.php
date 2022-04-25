<?php
    require_once("config.php");

$nome = $_POST['name'];
$quantidade = $_POST['quant'];
$meses = $_POST['meses'];

$search = mysqli_query($con, "SELECT * FROM products WHERE nome = '$nome' AND periodo = '$meses'");

//echo mysqli_num_rows($search);
if(mysqli_num_rows($search) > 0) 
    {
        mysqli_query($con, "UPDATE products SET quantidade = quantidade + '$quantidade' WHERE nome = '$nome' AND periodo = '$meses'");
        header('Location: ../index.php');
    }
else 
    {
        mysqli_query($con, "INSERT INTO products (id, nome, quantidade, periodo) VALUES (NULL, '$nome', '$quantidade', '$meses')");
        header('Location: ../index.php');
    }
?>