<?php

class UserController {
    private $userManager;
    private $user;

    public function __construct($userManager) {
        require('./Model/User.php');
        require_once('./Model/UserManager.php');
        $this->userManager = $userManager;
    }

    public function login() {
        require('./View/login.php');
    }

    public function doLogin() {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $result = $this->userManager->login($email, $password);

            if ($result) {
                $info = "Connexion réussie";
                $_SESSION['user'] = $result;
                header("Location: index.php?ctrl=topic&action=display");
                exit();
            } else {
                $info = "Identifiants incorrects.";
                require('./View/login.php');
            }
        } else {
            $info = "Veuillez fournir l'email et le mot de passe.";
            require('./View/login.php');
        }
        echo $info;
    }

    public function create() {
        if (
            isset($_POST['email']) &&
            isset($_POST['password']) &&
            isset($_POST['lastName']) &&
            isset($_POST['firstName']) &&
            isset($_POST['address']) &&
            isset($_POST['postalCode']) &&
            isset($_POST['city']) &&
            isset($_POST['country'])
        ) {
            $alreadyExist = $this->userManager->findByEmail($_POST['email']);
            if (!$alreadyExist) {
                $newUser = new User($_POST);
                $this->userManager->create($newUser);
                require('./View/login.php');
                exit;
            } else {
                $error = "ERROR: This email (".$_POST['email'].") is used by another user";
                echo $error;
            }
        }
        require('./View/createAccount.php');
    }

    public function display() {
        require('./View/home.php');
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
    }

    public function showUsers() {
        if (isset($_SESSION['user']) && $_SESSION['user']['admin'] == 1) {
            $users = $this->userManager->findAll();
            require('./View/usersList.php');
        } else {
            require('./View/unauthorized.php');
        }
    }
}
?>
