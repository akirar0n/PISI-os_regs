<?php
session_start(); // Inicia uma sessão para armazenar informações do usuário

// Conexão com o banco de dados
$host = 'localhost'; // Endereço do seu servidor de banco de dados
$dbname = 'os_registrator'; // Nome do seu banco de dados
$username = 'root'; // Seu nome de usuário do banco de dados
$password = ''; // Sua senha do banco de dados


try {
    // Conectando ao banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email']; // Captura o email do formulário
    $senha = $_POST['senha']; // Captura a senha do formulário

    // Prepara a consulta para buscar o cliente
    $stmt = $pdo->prepare("SELECT * FROM login_user WHERE email = :email");
    $stmt->execute(['email' => $email]); // Executa a consulta
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC); // Obtém os dados do cliente

    // Verifica se o cliente existe e se a senha está correta
    if ($cliente && password_verify($senha, $cliente['senha'])) {
        $_SESSION['cliente_id'] = $cliente['id']; // Armazena o ID do cliente na sessão
        header("Location:pagina_cliente.php"); // Redireciona para a página do cliente
        exit; // Para evitar que o código continue executando
    } else {
        echo "Email ou senha incorretos."; // Mensagem de erro
    }
}
?>