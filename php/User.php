<?php
class User {
    private $name;
    private $lastname;
    private $email;
    private $id;

    function __construct($id, $name, $lastname, $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
    }
    function getId() {return $this->id;}
    function getName() {return $this->name;}
    function getLastname() {return $this->lastname;}
    function getEmail() {return $this->email;}

    static function addUser($name, $lastname, $email, $pass) {
        global $mysqli;
        $email = trim(mb_strtolower($email));
        $pass = trim($pass);
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        $result = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email'");
        if ($result->num_rows !== 0) {
            return json_encode(["result"=>"exist"]);
        } else {
            $mysqli->query("INSERT INTO `users`(`name`, `lastname`, `email`, `pass`) VALUES ('$name', '$lastname', '$email', '$pass')");
            return json_encode(["result"=>"success"]);
        }
    }
    static function authUser($email, $pass) {
        global $mysqli;
        $email1 = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email'");
        $Arrayenter = $email1->fetch_assoc();
        if ($email1->num_rows !== 0) {
            if (password_verify($pass, $Arrayenter["pass"])) {
                return json_encode(["result"=>"entered"]); 
            } else {
                return json_encode(["result"=>"wrpass"]);
            }
        } else {
            return json_encode(["result"=>"wremail"]);
        }
    }
}
?>