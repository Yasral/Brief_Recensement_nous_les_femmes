<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function register($data) {
        $this->db->query('INSERT INTO User (identifiant, email_user, password) VALUES(:identifiant, :email_user, :password)');

        //Bind values
        $this->db->bind(':identifiant', $data['identifiant']);
        $this->db->bind(':email_user', $data['email_user']);
        $this->db->bind(':password', $data['password']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        } 
    }

    public function login($identifiant, $password) {
        $this->db->query('SELECT * FROM User WHERE identifiant = :identifiant');

        //Bind value
        $this->db->bind(':identifiant', $identifiant);

        $row = $this->db->single();

        $hashedPassword = $row->password;

        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }

    //Find user by email. Email is passed in by the Controller.
    public function findUserByEmail($email) {
        //Prepared statement
        $this->db->query('SELECT * FROM User WHERE email_user = :email_user');

        //Email param will be binded with the email variable
        $this->db->bind(':email_user', $email);

        //Check if email is already registered
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
} 
