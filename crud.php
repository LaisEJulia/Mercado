<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $codigo = $_POST["codigo"];
        $descricao = $_POST["descricao"];
        $quantidade = $_POST["quantidade"];
        $validade = $_POST["validade"];
        $preco = $_POST["preco"];
        $medida = $_POST["medida"];

        include("conecta.php");

        $unidade_medida = isset($_POST['medida']) ? $_POST['medida'] : '';

        if (isset($_POST["inserir"])) {
            $comando = $pdo->prepare("INSERT INTO mercado VALUES($codigo,'$descricao','$quantidade','$validade','$preco','$medida')");
            $resultado = $comando->execute();
            header("location: index.html");
        }

        if (isset($_POST["excluir"])) {
            $comando = $pdo->prepare("DELETE FROM mercado WHERE codigo=$codigo");
            $resultado = $comando->execute();
            header("location: index.html");
        }

        if (isset($_POST["alterar"])) {
            $comando = $pdo->prepare("UPDATE mercado SET descricao='$descricao', quantidade='$quantidade', validade='$validade', preco='$preco', medida='$medida' WHERE codigo=$codigo");
            $resultado = $comando->execute();
            header("location: index.html");
        }

        if (isset($_POST["listar"])) {
            header("location: listar.php"); 
        }
    }
?>
