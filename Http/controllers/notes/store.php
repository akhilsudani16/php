<?php

use Core\App;
use Core\Middleware\Auth;
use Core\Validator;
use Core\Database;


$db = App::resolve(Database::class);
$errors = [];

if(! Validator::string($_POST['title'], 3, 50)){
    $errors['title'] = 'A title of no more than 50 characters';
}

if (! Validator::string($_POST['body'], 8, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

if (! empty($errors)) {
    return view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}

$db->query('INSERT INTO notes(user_id, title, body, create_at, updated_at) VALUES(:user_id, :title, :body, NOW(), NOW() )', [
    'user_id' => 1,
    'title' => $_POST['title'],
    'body' => $_POST['body'],
]);

header('location: /notes');
die();

