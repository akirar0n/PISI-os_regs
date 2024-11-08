<?php
session_start(); 

$host = 'localhost'; 
$dbname = 'os_registrator'; 
$username = 'root'; 
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
        die("Erro ao conectar: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email']; 
    $senha = $_POST['senha']; 

    $stmt = $pdo->prepare("SELECT * FROM login_user WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        if ($senha === $usuario['senha']) {
            $_SESSION['idUser'] = $usuario['idUser']; 
            $_SESSION['tipoUser'] = $usuario['tipoUser']; 
            
            // Verifica o tipo de usuário e redireciona para a página correta
            if ($usuario['tipoUser'] == 1) {
                header("Location: HomeAdm.php");
            } elseif ($usuario['tipoUser'] == 2) {
                header("Location: HomeCliente.php");
            } else {
                header("Location: " . $_SERVER['PHP_SELF'] . "?error=3"); // Caso tipoUser não seja nem 1 nem 2
            }
            exit;
        } else {
            header("Location: " . $_SERVER['PHP_SELF'] . "?error=2"); // Senha incorreta
            exit;
        }
    } else {
        header("Location: " . $_SERVER['PHP_SELF'] . "?error=1"); // Usuário não encontrado
        exit;
    }
    
    //if ($usuario) {
      //  if ($senha === $usuario['senha']) {
        //    $_SESSION['idUser'] = $usuario['idUser']; 
          //  $_SESSION['tipoUser'] = $usuario['tipoUser']; 

            //header("Location: " . ($usuario['tipoUser'] == 1 ? "HomeAdm.php" : "HomeAdm.php"));
            //exit; 
//        } else {
  //          header("Location: " . $_SERVER['PHP_SELF'] . "?error=2");
    //        exit;
 //       }
  //  } else {
    //    header("Location: " . $_SERVER['PHP_SELF'] . "?error=1");
   //     exit;
    //}
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./Visao/CSS/home.css">
    <link rel="stylesheet" href="./Visao/CSS/reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<?php include 'MenuOff.php';?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="text-form">    Entrar  </h1>
                <form method ="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-floating">
                    <label for="floatingInput">Email</label>
                    <input type="email" class="form-control" id="floatingInput" name="email">
                </div>
                <div class="form-floating mb-2">
                    <label for="floatingPassword">Senha</label>
                    <input type="password" class="form-control" id="floatingPassword" name="senha">
                </div>
                    <button type="submit" class="btn-entrar-um"> Entrar </button>
                </form>
        </div>
    </div>
</div>

<?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger mt-3">
        <?php
            if ($_GET['error'] == 1) {
                echo "Email não encontrado.";
            } elseif ($_GET['error'] == 2) {
                echo "Senha incorreta.";
            }
        ?>
    </div>
        <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
