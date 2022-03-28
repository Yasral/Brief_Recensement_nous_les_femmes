<?php
class Users extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function register() {
        $data = [
            'identifiant' => '',
            'email_user' => '',
            'password' => '',
            'confirmPassword' => '',
            'usernameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'identifiant' => trim($_POST['identifiant']),
                'email_user' => trim($_POST['email_user']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            //Validate username on letters/numbers
            if (empty($data['identifiant'])) {
                $data['usernameError'] = "Entrez un nom d'utilisateur.";
            } elseif (!preg_match($nameValidation, $data['identifiant'])) {
                $data['usernameError'] = 'Votre nom ne peut contenir que des chaines de caracteres et des nombres.';
            }

            //Validate email
            if (empty($data['email_user'])) {
                $data['emailError'] = 'Entrez une adresse email.';
            } elseif (!filter_var($data['email_user'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = "Le format n'est pas correct.";
            } else {
                //Check if email exists.
                if ($this->userModel->findUserByEmail($data['email_user'])) {
                $data['emailError'] = "L'email existe deja.";
                }
            }

            

           // Validate password on length, numeric values,
            if(empty($data['password'])){
              $data['passwordError'] = 'Entrez un mot de passe.';
            } elseif(strlen($data['password']) < 6){
              $data['passwordError'] = 'Un minimum de 8 caracteres est requis.';
            } elseif (preg_match($passwordValidation, $data['password'])) {
              $data['passwordError'] = 'Doit contenir au minimun une valeur numerique.';
            }

            //Validate confirm password
            if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Confirmez votre mot de passe.';
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                $data['confirmPasswordError'] = 'Mauvais mot de passe, Reessayer a nouveau.';
                }
            }

            // Make sure that errors are empty
            if (empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register user from model function
                if ($this->userModel->register($data)) {
                    //Redirect to the login page
                    header('location: ' . URLROOT . '/users/login');
                } else {
                    die("Une erreur s'est produite.");
                }
            }
        }
        $this->view('users/register', $data);
    }

    public function login() {
        $data = [
            'identifiant' => '',
            'password' => '',
            'usernameError' => '',
            'passwordError' => ''
        ];

        //Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'identifiant' => trim($_POST['identifiant']),
                'password' => trim($_POST['password']),
                'usernameError' => '',
                'passwordError' => '',
            ];
            //Validate username
            if (empty($data['identifiant'])) {
                $data['usernameError'] = 'Entrez votre identifiant.';
            }

            //Validate password
            if (empty($data['password'])) {
                $data['passwordError'] = 'Entrez votre mot de passe.';
            }

            //Check if all errors are empty
            if (empty($data['usernameError']) && empty($data['passwordError'])) {
                $loggedInUser = $this->userModel->login($data['identifiant'], $data['password']);

                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['passwordError'] = 'Mot de passe ou Identifiant incorrect. Veuillez reessayer svp.';

                    $this->view('users/login', $data);
                }
            }

        } else {
            $data = [
                'identifiant' => '',
                'password' => '',
                'usernameError' => '',
                'passwordError' => ''
            ];
        }
        $this->view('users/login', $data);
    }

    public function createUserSession($user) {
        $_SESSION['id_user'] = $user->id_user;
        $_SESSION['identifiant'] = $user->identifiant;
        $_SESSION['email_user'] = $user->email_user;
        header('location:' . URLROOT . '/index');
    }

    public function logout() {
        unset($_SESSION['id_user']);
        unset($_SESSION['identifiant']);
        unset($_SESSION['email_user']);
        header('location:' . URLROOT . '/users/login');
    }
}
