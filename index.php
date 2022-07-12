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

    mysqli_query($conn, "CREATE TABLE IF NOT EXISTS users (id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL, username varchar(24) NOT NULL, password varchar(24) NOT NULL)");
    
    if(isset($_POST['submit-button']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $query = "SELECT * FROM users WHERE username='" . $username . "' AND password='" . $password ."' LIMIT 1";

        $result = $conn->query($query);
        if($result->num_rows > 0)
        {
            echo '
            <p class="correct-password">Login efetuado com sucesso.</p>
            ';
        }
        else 
        {
            echo '
            <p id="error" class="incorrect-password">Senha incorreta. Verifique as informações e tente novamente.</p>
            ';
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
        <h1>Efetuar Login</h1>
    </header>
    <main>
        <p>Efetue seu login digitando suas informações abaixo.</p>
        <form action="" method="post">
            <div class="login-container">
                <input id="input-username" type="text" name="username" placeholder="Usuário" autocomplete=off>
                <input id="input-password" type="password" name="password" placeholder="Senha">
                <a href="./sign-up.php">Registrar-se?</a>
                <a href="#">Esqueceu sua senha?</a>
                <input name="submit-button" class="button" type="submit" value="Login">
            </div>
    
        </form>
    </main>
    <footer>
        <p>Developed by <a href="https://github.com/luiz-tm">Luiz</a></p>
    </footer>
    <script src="app.js"></script>
</body>
</html>