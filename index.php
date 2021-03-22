<?php

    /*
     *                      --> Observações sobre <--
     * O sistema tem o intuito somente de login e cadastro no banco de dados
     * não fiz uso de sessões porque as páginas disponíveis são somente as de
     * login e cadastro.
     * 
     * Tecnologias: HTML, CSS, PHP e JavaScript(usado somente para avisos)
     * 
     * By Jairo Silva.
     * */

    include './connect/connect_db.php';
    
    if(isset($_POST['Submit-data'])) {
        if(empty($_POST['email']) || empty($_POST['password'])) {
            echo "<script>alert('Preencha os campos!');</script>";
        } else {
            $Email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $Password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
            $SlctDB = $Connect -> prepare("SELECT * FROM logins WHERE email=:email");
            $SlctDB -> bindValue(":email", $Email);
            $SlctDB -> execute();
            
            if($SlctDB -> rowCount() == 0) {
                /* Caso o usuário não esteja no sistema */
                echo "<script>alert('Usuário não existe!');</script>";
            } else {
                /* Caso o usuário esteja no sistema */
                $PassVerify = $Connect -> prepare("SELECT * FROM logins WHERE email=:email and password=:password");
                $PassVerify -> bindValue(":email", $Email);
                $PassVerify -> bindValue(":password", $Password);
                $PassVerify -> execute();
                
                if($PassVerify -> rowCount() == 0) {
                    echo "<script>alert('Usuário e senha não conferem!');</script>";
                } else {
                    echo "<script>alert('Usuário existente!');</script>";
                }
            }
        }
    }
?>

<html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge" />
       <meta name="viewport" content="width=device-width, initial-scale=1.0" />
       <link rel="stylesheet" href="./style.css" />
       <title> Pibot - Projects Delevopment </title>
   </head>
   <body>
     <div class="container">
      <h1>Login - PDO</h1>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="email" name="email" maxlength="45" class="email" placeholder="Email*" />
        <input type="password" name="password" class="password" maxlength="12" placeholder="Password*" />
        <input type="submit" name="Submit-data" value="Login" class="submit" />
      </form>
     </div>
     <a href="./register.php"><button class="register">Não estou cadastrado</button></a>
   </body>
   <script src="script.js"></script>
</html>
