<?php

class User extends Connect
{
    protected $_pdo;

    public function __construct()
    {

        $this->_pdo = $this->connexion();
    }

    /**
     * récupère tous les user et sinon vient en créer un
     * utilisé dans la page home , listing 
     */

    public function findAllUser()
    {
    }

    public function createOne()
    {
        
            if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['address']) && !empty($_POST['firstName']) && !empty($_POST['lastName'])) :

                $sql = "INSERT INTO `users`(`email`, `password`, `address`, `firstName`, `lastName`) VALUES (:email, :password, :address,:firstName, :lastName)";
                $q = $this->_pdo->prepare($sql);
                $q->execute([
                    ':email' => $_POST['email'],
                    ':password' => $_POST['password'],
                    ':address' => $_POST['address'],
                    ':firstName' => $_POST['firstName'],
                    ':lastName' => $_POST['lastName']
                ]);
                return 'félicitations votre compte à bien été crée';
        endif;
    }
}
