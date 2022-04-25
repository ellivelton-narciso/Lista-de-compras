<?php
require_once('./db/config.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Compras</title>
    <link rel="stylesheet" href="./assets/css/main.css">
</head>

<body>
    <div class="container">
        <div class="btn-ini">
            <button class="btn-ini--cad" onclick="abrirCadastro()">Cadastrar Produto</button>
            <button class="btn-ini--list" onclick="abrirListar()">Listar Produtos</button>
        </div>
        <div class="form-cad">
            <form action="./db/cad_produto.php" method="POST">
                <input type="text" name="name" placeholder="Nome do Produto">
                <label>
                    Quantidade:
                    <input type="number" name="quant" min="1" max="100" value="1">
                </label><br />
                <label>
                    Mês:
                    <select name="meses">
                        <option value="janeiro">Janeiro</option>
                        <option value="fevereiro">Fevereiro</option>
                        <option value="março">Março</option>
                        <option value="abril">Abril</option>
                        <option value="maio">Maio</option>
                        <option value="junho">Junho</option>
                        <option value="julho">Julho</option>
                        <option value="agosto">Agosto</option>
                        <option value="setembro">Setembro</option>
                        <option value="outubro">Outubro</option>
                        <option value="novembro">Novembro</option>
                        <option value="dezembro">Dezembro</option>
                    </select>
                </label>
                <button id="cadastro">Cadastrar</button>

            </form>
        </div>
        <div class="form-list">
            <form action="
            <?php

            $mes = $_POST['mes'];

            $s = sprintf("SELECT nome, quantidade, periodo FROM products WHERE periodo = '$mes'");
            $dados = mysqli_query($con, $s);
            $total = mysqli_num_rows($dados);
            $linha = mysqli_fetch_assoc($dados);

            ?>" method="POST">
                <input type="checkbox" name="mes" value="janeiro">
                <label for="janeiro">Janeiro</label><br>
                <input type="checkbox" name="mes" value="fevereiro">
                <label for="fevereiro">Fevereiro</label><br>
                <input type="checkbox" name="mes" value="março">
                <label for="marco">Março</label><br>
                <input type="checkbox" name="mes" value="abril">
                <label for="abril">Abril</label><br>
                <input type="checkbox" name="mes" value="maio">
                <label for="maio">Maio</label><br>
                <input type="checkbox" name="mes" value="junho">
                <label for="junho">Junho</label><br>
                <input type="checkbox" name="mes" value="julho">
                <label for="julho">Julho</label><br>
                <input type="checkbox" name="mes" value="agosto">
                <label for="agosto">Agosto</label><br>
                <input type="checkbox" name="mes" value="setembro">
                <label for="setembro">Setembro</label><br>
                <input type="checkbox" name="mes" value="outubro">
                <label for="outubro">Outubro</label><br>
                <input type="checkbox" name="mes" value="novembro">
                <label for="novembro">Novembro</label><br>
                <input type="checkbox" name="mes" value="dezembro">
                <label for="dezembro">Dezembro</label><br>
                <button onclick="mostrarTabela()">Listar</button>
            </form>
        </div>
        <div class="listagem">

            <p><?php if ($linha['periodo'] > 1) {
                    echo $linha['periodo'];
                } ?></p>
            <table>
                <?php
                if ($linha['periodo'] > 1) {
                    echo '<tr>
                    <th>Quantidade</th>
                    <th>Produto</th>
                </tr>';
                }
                ?>

                <?php
                if ($total > 0) {
                    do {
                ?>
                        <tr>
                            <td><?= $linha['quantidade'] ?></td>
                            <td><?= $linha['nome'] ?></td>
                        </tr>
                <?php
                    } while ($linha = mysqli_fetch_assoc($dados));
                }
                ?>
            </table>



        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="./assets/js/main.js"></script>


</html>
<?php
mysqli_free_result($dados);
?>