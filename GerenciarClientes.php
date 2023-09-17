<?php
require_once 'Cliente.php';

$cliente = new Cliente();

$arrayFiltrado = array();


if (isset($_POST['acao']) && $_POST['acao'] == 'filtrar') {

    $cliente = new Cliente();

    if ($_POST['opcaoFiltragem'] == "nomeCompleto") {
        $arrayFiltrado = $cliente->buscar('nomeCompleto', $_POST['query']);
    } else if ($_POST['opcaoFiltragem'] == "primeiroNome") {
        $arrayFiltrado = $cliente->buscar('primeiroNome', $_POST['query']);
    } else if ($_POST['opcaoFiltragem'] == "nomeDoMeio") {
        $arrayFiltrado = $cliente->buscar('nomeDoMeio', $_POST['query']);
    } else if ($_POST['opcaoFiltragem'] == "ultimoNome") {
        $arrayFiltrado = $cliente->buscar('ultimoNome', $_POST['query']);
    }
} else {
    $arrayFiltrado = $cliente->buscar('', '');
}
?>


<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Gerenciar Clientes</title>
</head>
<style>
    table {
        background-color:  white;
        border: solid black 1px;
        border-collapse: collapse;
        border-spacing: 0;
        box-shadow: 0px 12px 17px -5px rgba(0,0,0,0.1);
    }
    fieldset{
        display: flex;
        flex-direction: row;
        gap: 15px;
        background-color: white;
        padding-inline: 30px;
        padding-block: 20px;
        border: none;
        border-radius: 20px;
        box-shadow: 0px 12px 17px -5px rgba(0,0,0,0.1);
    }
    .input{
        display: flex;
        flex-direction: row;
        gap: 20px;
    }
    main{
        display: flex;
        flex-direction: column;
        gap: 35px;
    }
    thead{
        background-color: rgb(137, 43, 226);
        color: white;
    }
    tr{
        padding: 20px;
    }
    th{
        padding: 10px;
        border: solid black 1px;
    }
    td{
        text-align: center;
        padding: 10px;
        border: solid black 1px;
    }
    .coluna:hover{
        background-color: #DBDBDB;
    }
    input[type=text]{
        padding: 10px;
        border-radius: 10px;
        border: solid #2E2B29 0.5px;
    }
    select{
        padding: 10px;
        border-radius: 10px;
        border: solid #2E2B29 0.5px;
    }
    input[type=submit]{
        padding-inline: 20px;
        padding-block: 10px;
        border-radius: 20px;
        border: none;
        background-color: rgb(137, 43, 226);
        color: white;
    }
</style>

<?php include 'navbar.php'; ?>

<body>
    <main>
    <h1>Clientes cadastrados no sistema</h1>

<table >
    <thead >
        <tr>
            <th>RG</th>
            <th>Nome completo</th>
            <th>Data de Nascimento</th>
            <th>Pontuação</th>
        </tr>
    </thead>

    <fieldset style="margin-bottom: 20px">
        <h4>Filtrar</h4>
        <form method="POST" action="GerenciarClientes.php">
            <select name="opcaoFiltragem">
                <option value="nomeCompleto">Nome completo </option>
                <option value="primeiroNome">Primeiro nome</option>
                <option value="nomeDoMeio">Nome do meio</option>
                <option value="ultimoNome">Último nome</option>
            </select>
            <input type="text" name="query" placeholder="Digite um nome para filtrar">
            <input type="hidden" name="acao" value="filtrar" />
            <input type="submit" value="Filtrar">
        </form>
    </fieldset>
    <tbody>
        <?php
        for ($i = 0; $i < count($arrayFiltrado); $i++) {
            echo '<tr class=coluna>';
            echo '<td> ' . $arrayFiltrado[$i]->rg . '</td>';
            echo '<td> ' . $arrayFiltrado[$i]->primeiroNome . ' ' . $arrayFiltrado[$i]->nomeDoMeio . ' ' . $arrayFiltrado[$i]->ultimoNome . '</td>';
            echo '<td> ' . $arrayFiltrado[$i]->dataDeNascimento . '</td>';
            echo '<td> ' . $arrayFiltrado[$i]->pontuacao . '</td>';

            echo '</tr>';
        }
        ?>
    </tbody>
</table>


    </main>
    
</body>

</html>