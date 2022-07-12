<?php
    

    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "dblogin";

    $conn = mysqli_connect($host, $user, $pass, $dbname);

    if($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['submit-button']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $query = "SELECT * FROM users WHERE username='" . $username ."'";

        $result = $conn->query($query);

        if($result->num_rows > 0)
        {
            echo '<p id="error" class="incorrect-password">Conta já registrada. Tente novas informações.</p>';
        }
        else 
        {
            echo '
            <p class="correct-password">Conta registrada com sucesso.</p>
            ';
            $query = "INSERT INTO `users` (username, password) VALUES ('" .$username."', '".$password."') LIMIT 1";

            $conn->query($query);
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <header>
        <h1>Registrar-se
        </h1>
    </header>
    <main>
        <p>Registre-se digitando suas informações abaixo.</p>
        <form action="" method="post">
            <div class="login-container">
                <input id="input-username" type="text" name="username" placeholder="Usuário" autocomplete=off>
                <input id="input-password" type="password" name="password" placeholder="Senha">
                <a href="./index.php">Já possui uma conta?</a>
                <a href="#">Esqueceu sua senha?</a>
                <input name="submit-button" class="button" type="submit" value="Registrar-se">
            </div>
        </form>
    </main>
    <footer>
        <p>Developed by Luiz</p>
    </footer>
    <script src="app.js"></script>
</body>
</html>