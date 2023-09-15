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
                    <input type="submit" value="Finalizar compra" />
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
                    <img src="<?= $listaDeProdutos[$i]->imagem ?>" alt="<?= $listaDeProdutos[$i]->nome ?>" width="200"
                        height="200"><br>
                    <div>R$
                        <?= $listaDeProdutos[$i]->preco ?>
                    </div>
                    <form action="vitrine.php" method="POST">
                        <input type="hidden" name="produtoSelecionado" value="<?= $listaDeProdutos[$i]->id ?>" />
                        <input class="compra" type="submit" value="Comprar agora!">
                    </form>
                </fieldset>

            <?php } ?>
        </div>
    </div>
</body>

</html>