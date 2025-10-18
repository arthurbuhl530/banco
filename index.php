<?php

// A instrução 'require_once' é essencial para carregar as definições da classe ContaBancaria.
require_once 'ContaBancaria.php';

// 2. CRIAÇÃO DO OBJETO (INSTÂNCIA DA CLASSE)
// Aqui, é criada uma nova conta com um saldo inicial de R$ 1000,00 e armazenada na sessão.
session_start();
if (!isset($_SESSION['conta'])) {
    // A conta só é criada com 1000 na primeira vez que o usuário acessa.
    $_SESSION['conta'] = new ContaBancaria(5000.00);
}

// Agora, $conta é um objeto persistente.
$conta = $_SESSION['conta'];

// 3. TAREFA: PROCESSAMENTO DO FORMULÁRIO


// c) Pegar o valor digitado no campo de input.
// d) Chamar o método correspondente no objeto $conta ($conta->depositar(...) ou $conta->sacar(...)).
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $valor = $_POST['valor'];
    $acao = $_POST['acao'];
    if($acao === 'depositar'){
        $conta->depositar($valor);
    } else if($acao === 'sacar'){
        $conta->sacar($valor);
    }
} else {
}
    



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Caixa Eletrônico Digital</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 50px auto;
        }

        .caixa {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
        }

        .saldo {
            background-color: #f0f0f0;
            padding: 15px;
            text-align: center;
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 15px;
        }

        input,
        button {
            padding: 10px;
            width: calc(100% - 22px);
            margin-top: 5px;
        }

        button {
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="caixa">
        <h1>Caixa Eletrônico</h1>

        <div class="saldo">
            Saldo Atual: R$ <?php echo number_format($conta->getSaldo(), 2, ',', '.'); ?>
        </div>

        <hr>

        <form method="POST" action="index.php">
            <h3>Faça um Depósito ou Saque</h3>
            <input type="number" name="valor" placeholder="Digite o valor" step="0.01" required>
            <button type="submit" name="acao" value="depositar">Depositar</button>
            <button type="submit" name="acao" value="sacar">Sacar</button>
        </form>

    </div>

</body>

</html>