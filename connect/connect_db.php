<?php

    try {
        $Connect = new PDO("mysql:host=localhost;dbname=loginpdo", "root", ""); // Coloque a senha do seu MySQL
    } catch(PDOException $Error) {
        echo "Database error: " . $Error -> getMessage();
    } catch(Exception $Error) {
        echo "Erro: " . $Error -> getMessage();
    }
