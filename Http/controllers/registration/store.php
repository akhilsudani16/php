<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;
use Http\Forms\LoginForm;

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
        return view('registration/create.view.php', [
            'errors' => ['emailexits' => 'This email is already registered']
        ]);
        exit();
    }
    else {
        $db->query('INSERT INTO users(name, email, password, create_at) VALUES(:name, :email, :password, NOW())', [
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ]);

        $newUser = LoginForm::validate($attributes = [
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ]);


        $signedIn = (new Authenticator)->attempt
        ($attributes['email'], $attributes['password']);

        redirect('/');
    }


//
//        if (!$signedIn) {
//            $form->error(
//                'email', 'No Matching Account Found For That E-mail Address and password'
//            )->throw();
//        } else {
//            redirect('/');
//
//        }
