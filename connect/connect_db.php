<?php

    try {
        $Connect = new PDO("mysql:host=localhost;dbname=loginpdo", "user", "password"); // Usuário e senha do seu banco de dados
    } catch(PDOException $Error) {
        echo "Database error: " . $Error -> getMessage();
    } catch(Exception $Error) {
        echo "Erro: " . $Error -> getMessage();
    }
