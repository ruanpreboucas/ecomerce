<link rel="stylesheet" href="style.css">

<?php
require_once 'Produto.php';
require_once 'Cliente.php';

$listaDeProdutos = Produto::getListaDeProdutos();

$compraFeita = false;

if (isset($_POST['action']) && $_POST['action'] == 'finalizarCompra') {
    $rgComprador = $_POST['rgComprador'];
    $comprador = new Cliente();
    $comprador = $comprador->buscarPorId($rgComprador);
    $pontos = $comprador->pontuacao;
    $pontos += 100;
    $comprador->pontuacao = $pontos;
    $comprador->atualizar();
    $compraFeita = true;
}
?>



<html>

<head>
    <title>Vitrine SuperCliente</title>
</head>

<?php include 'navbar.php'; ?>

<body>


    <?php if ($compraFeita) { ?>
        <h3 style="margin: 20px; padding: 20px; background-color:#99ff99">Compra realizada com sucesso</h3>
    <?php } ?>

    <?php if (isset($_POST['produtoSelecionado']) && $_POST['produtoSelecionado'] != "") { ?>
        <div class="finalizar">
            <fieldset>
                <p>Finalizar pagamento</p>
                <form method="POST" action="vitrine.php">
                    <input type="text" name="rgComprador" placeholder="Digite o seu RG" />
                    <input type="hidden" name="action" value="finalizarCompra">
                    <input class="m" type="submit" value="FINALIZAR" style="background-color:rgb(0, 140, 255); color:white; padding:5px;border: 1px solid;   border-radius: 5px; border-color:black;  box-shadow: 0.5px 0.5px 5px gray;
    border-color: rgba(0, 0, 0, 0.164);  font-family: 'Segoe UI', Tahoma, Geneva," />
                </form>
            </fieldset>
        </div>
    <?php } ?>

    <div class="MainContainer">
        <h1>Confira nossos produtos</h1>
        <div class="ProdutosSection">
            <?php for ($i = 0; $i < count($listaDeProdutos); $i++) { ?>
                <fieldset>
                    <h3>
                        <?= $listaDeProdutos[$i]->nome ?>
                    </h3>
                    <img src="<?= $listaDeProdutos[$i]->imagem ?>" alt="<?= $listaDeProdutos[$i]->nome ?>" width="150"
                        height="150"><br>
                    <div class="desconto">
                        <p>30% off!</p>
                    </div>
                    <div style="display:flex; flex-direction: rowtext-align: start;
                    color: black;
                    width: 200px;
                    padding-left:10px ;
                    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;" ;>
                        <p> R$</p>
                        <?= $listaDeProdutos[$i]->preco ?>
                    </div>
                    <form action="vitrine.php" method="POST">
                        <input type="hidden" name="produtoSelecionado" value="<?= $listaDeProdutos[$i]->id ?>" />
                        <input class="buttoncompra" type="submit" value="COMPRAR">
                    </form>
                </fieldset>

            <?php } ?>
        </div>
    </div>
</body>

</html>