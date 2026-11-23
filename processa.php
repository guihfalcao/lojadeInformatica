<?php
$produto = $_POST['produto'] ?? '';
$qtd = intval($_POST['qtd'] ?? 0);
$pagamento = $_POST['pagamento'] ?? '';
$parcelas = intval($_POST['parcelas'] ?? 1);

// Validação simples
if ($qtd <= 0) {
    echo "Quantidade inválida! <a href='index.php'>Voltar</a>";
    exit;
}

// Preços dos produtos
switch ($produto) {
    case 'teclado':
        $nome = "Teclado Mecânico";
        $preco = 120.00;
        break;
    case 'monitor':
        $nome = "Monitor";
        $preco = 900.00;
        break;
    case 'cadeira':
        $nome = "Cadeira Gamer";
        $preco = 1200.00;
        break;
    case 'mouse':
        $nome = "Mouse Gamer";
        $preco = 80.00;
        break;
    default:
        echo "Produto não encontrado! <a href='index.php'>Voltar</a>";
        exit;
}

$subtotal = $preco * $qtd;
$total = $subtotal;
$desconto = 0;
$juros = 0;

// Cálculos
if ($pagamento == 'pix') {
    $desconto = $subtotal * 0.05;
    $total = $subtotal - $desconto;
} else {
    if ($parcelas > 3) {
        $juros = $subtotal * 0.015 * $parcelas;
        $total = $subtotal + $juros;
    }
}

$valorParcela = $total / $parcelas;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resumo</title>
</head>
<body>
    <h2>Resumo da Compra</h2>
    
    <p><strong>Produto:</strong> <?= $nome ?></p>
    <p><strong>Valor Unitário:</strong> R$ <?= number_format($preco, 2, ',', '.') ?></p>
    <p><strong>Quantidade:</strong> <?= $qtd ?></p>
    <p><strong>Subtotal:</strong> R$ <?= number_format($subtotal, 2, ',', '.') ?></p>

    <?php if ($pagamento == 'pix'): ?>
        <p><strong>Desconto (PIX):</strong> - R$ <?= number_format($desconto, 2, ',', '.') ?></p>
    <?php else: ?>
        <p><strong>Parcelas:</strong> <?= $parcelas ?>x de R$ <?= number_format($valorParcela, 2, ',', '.') ?></p>
        <?php if ($juros > 0): ?>
            <p><strong>Juros aplicados:</strong> R$ <?= number_format($juros, 2, ',', '.') ?></p>
        <?php endif; ?>
    <?php endif; ?>

    <h3>Total a pagar: R$ <?= number_format($total, 2, ',', '.') ?></h3>

    <br>
    <a href="index.php">Fazer outra compra</a>
</body>
</html>