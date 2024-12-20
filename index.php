<?php
include('db.php');  // Inclui a conexão com o banco de dados

// Recupera todos os jogadores cadastrados
$sql = "SELECT * FROM jogadores";
$result = $conn->query($sql);
$jogadores = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $jogadores[] = $row;  // Adiciona cada jogador ao array
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo.png" type="image/png">
    <title>Contador de Detecções</title>
    <style>
    <?php include 'css/style.css'; ?>
    </style>
</head>
<body style="
    background-image: url('img/basquete.jpg');
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    min-height: 100vh;
">
<header>
        <nav>
            <ul>
                <div class="image-container">
                    <img src="img/logo.png" alt="Descrição da imagem">
                </div>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="cadastro.php">Cadastrar Jogadores</a></li>
                <li><a href="consultarJogadores.php">Jogadores</a></li>
                <li><a href="filtrar.php">Pontuação Geral</a></li>
                <li><a id="connectButton">Conectar ao Arduino</a></li>
                <li><label for="jogadores">Escolha um jogador:</label></li>
                <li><select id="jogadores">
                    <option value="">Selecione um jogador</option>
                        <?php foreach ($jogadores as $jogador): ?>
                    <option value="<?php echo htmlspecialchars($jogador['nome']); ?>"><?php echo htmlspecialchars($jogador['nome']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </li>
            </ul>
        </nav>
    </header>
    
   
        <h1 id="jogadorSelecionado">Selecione um Jogador</h1>
        <div class="tabela"></div>
        <div class="aro"></div>
        <div id="counter">0</div>
    

    <script src="script/script.js"></script>
    <script src="script/index.js"></script>

</body>
</html>
