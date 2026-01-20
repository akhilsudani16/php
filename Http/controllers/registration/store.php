<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

    if(! Validator::string($name, 2, 50 )){
        $errors['name'] = "Enter your full name";
    }

    if(! Validator::email($email) ){
        $errors['email'] = 'Please enter a valid email address';
    }

    if(! Validator::string($password,8, 255) ){
        $errors['password'] = 'Please enter at least 8 characters';
    }

    if(! empty($errors)){
        return view('registration/create.view.php', [
            'errors' => $errors
        ]);
    }

    $user = $db->query('SELECT * FROM users WHERE email = :email' ,  [
        'email' => $email
    ])->find();

    if ($user){
        header('Location: /');
        exit();
    }
    else {

        $db->query('INSERT INTO users(name, email, password, create_at) VALUES(:name, :email, :password, NOW())', [
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ]);

        login($user);

        header('Location: /');
        exit();
    }