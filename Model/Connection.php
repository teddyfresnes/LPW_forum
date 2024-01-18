<?php

use MongoDB\Client;

class Connection
{
    private string $uri;
    private $db;

    public function __construct()
    {
        $this->uri = 'mongodb+srv://binome1:forumincroyable53@cluster0.xxndqih.mongodb.net/?retryWrites=true&w=majority';

        try {
            $this->db = new Client($this->uri);
            //echo "<script>console.log('Connexion à la base de données MongoDB réussie!');</script>";
        } catch (Exception $e) {
            echo "Erreur de connexion à la base de données MongoDB: " . $e->getMessage();
        }
    }

    public function getDb()
    {
        return $this->db;
    }





    public function listDatabases()
    {
        $databases = $this->db->listDatabases();

        echo "<h2>Liste des bases de données:</h2>";
        echo "<ul>";
        foreach ($databases as $database) {
            echo "<li>".$database->getName()."</li>";
        }
        echo "</ul>";
    }
}


?>