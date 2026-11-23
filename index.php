<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Loja de Informática</title>
</head>
<body>
    <h2>Faça seu pedido</h2>
    
    <form action="processa.php" method="POST">
        <label>Produto:</label>
        <select name="produto">
            <option value="teclado">Teclado Mecânico - R$ 120,00</option>
            <option value="monitor">Monitor - R$ 900,00</option>
            <option value="cadeira">Cadeira Gamer - R$ 1200,00</option>
            <option value="mouse">Mouse Gamer - R$ 80,00</option>
        </select>
        <br><br>

        <label>Quantidade:</label>
        <input type="number" name="qtd" value="1" min="1">
        <br><br>

        <label>Pagamento:</label>
        <select name="pagamento">
            <option value="pix">PIX (5% de desconto)</option>
            <option value="cartao">Cartão de Crédito</option>
        </select>
        <br><br>

        <label>Parcelas:</label>
        <select name="parcelas">
            <?php for($i = 1; $i <= 12; $i++): ?>
                <option value="<?= $i ?>"><?= $i ?>x</option>
            <?php endfor; ?>
        </select>
        <br><br>

        <button type="submit">Enviar Pedido</button>
    </form>
</body>
</html>