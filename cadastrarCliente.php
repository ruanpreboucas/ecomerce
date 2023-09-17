<link rel="stylesheet" href="style.css">

<?php
require_once 'Cliente.php';

if ((isset($_POST['action']) && $_POST['action'] == 'salvar')) {
    if (($_POST['rg']) != '' && ($_POST['primeiroNome']) != '') {
        $cliente = new Cliente();
        $cliente->rg = $_POST['rg'];
        $cliente->primeiroNome = $_POST['primeiroNome'];
        $cliente->nomeDoMeio = $_POST['nomeDoMeio'];
        $cliente->ultimoNome = $_POST['ultimoNome'];
        $cliente->dataDeNascimento = $_POST['dataDeNascimento'];
        $cliente->pontuacao = 0;
        $cliente->salvar();
        header("location: gerenciarClientes.php");
    }
}
?>


<html>

<head>
    <title>Cadastrar Cliente</title>
</head>

<?php include 'navbar.php'; ?>

<body>
    <?php
    if ((isset($_POST['action']) && $_POST['action'] == 'salvar')) {
        if (($_POST['rg']) == '' || (is_null($_POST['rg'])) || ($_POST['primeiroNome']) == '' && (is_null($_POST['primeiroNome']))) {
            echo '<div>Você não pode salvar um novo cliente sem digitar seu RG e Nome</div>';
        }
    }
    ?>
    <div class="MainContainer">
    <h1>Adicionar novo cliente</h1>
        <div class="abc">
            <div class="Addheader">
                <h2>Adicionar dados do cliente</h2>
            </div>
            <div class="efg">
                <div class="descente">
                    <form action="cadastrarCliente.php" method="POST">
                        <input name="rg" type="text" required="true" placeholder="Digite seu RG" /> <br><br>
                        <input name="primeiroNome" required="true" type="text" placeholder="Digite seu primeiro nome" />
                        <br><br>
                        <input name="nomeDoMeio" required="true" type="text" placeholder="Digite seu nome do meio" />
                        <br><br>
                        <input name="ultimoNome" required="true" type="text" placeholder="Digite seu ultimo nome" />
                        <br><br>
                        <input name="dataDeNascimento" required="true" type="date"
                            placeholder="Selecione sua data de nascimento" /><br><br>
                        <input name="action" value="salvar" type="hidden" />
                        <input type="submit" value="Salvar" class="salvar">
                    </form>
                </div>
                <img src="img/costumer.png" alt="">
            </div>
        </div>
    </div>
</body>

</html>