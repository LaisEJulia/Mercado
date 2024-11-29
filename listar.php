<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="../mercado/Listar.css">

</head>
<body>

    <div class="logo-titulo">
        <a href="Index.html"><img src="Logo.jpg" alt="logo" class="logo"></a>
        <h1>Gerenciamento de Produtos</h1>
    </div>

    <div class="table-container">
        <h2 class="Titulo" >Lista de Produtos</h2>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th>Quantidade</th>
                    <th>Data de Validade</th>
                    <th>Preço</th>
                    <th>Unidade de Medida</th>
                </tr>
            </thead>
            <tbody>

            <?php

            
                include("conecta.php");
                $comando = $pdo->prepare("SELECT * FROM mercado");
                $comando->execute();

                if (isset($_GET['excluir'])) {
                    $codigoExcluir = $_GET['excluir'];
                    $comandoExcluir = $pdo->prepare("DELETE FROM mercado WHERE codigo = :codigo");
                    $comandoExcluir->bindParam(':codigo', $codigoExcluir, PDO::PARAM_INT);
                    $comandoExcluir->execute();
                }

                while($linha = $comando->fetch()) {
                    $codigo = $linha["codigo"];
                    $descricao = $linha["descricao"];
                    $quantidade = $linha["quantidade"];
                    $data_validade = $linha["validade"];
                    $preco = $linha["preco"];
                    $unidade_medida = $linha["medida"];

                    echo("<tr>
                        <td>$codigo</td>
                        <td>$descricao</td>
                        <td>$quantidade</td>
                        <td>$data_validade</td>
                        <td>$preco</td>
                        <td>$unidade_medida</td>
                        <td>
                            <!-- Botão para excluir -->
                            <a href='?excluir=$codigo' class='excluir-btn'\")'>Excluir</a>
                        </td>
                    </tr>");
                }
            ?>

            </tbody>
        </table>
    </div>
</body>
</html>
