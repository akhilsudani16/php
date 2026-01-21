<?php

use Core\App;
use Core\Middleware\Auth;
use Core\Validator;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);
$errors = [];

$currentUserId = Session::get('user')['id'];

if(! Validator::string($_POST['title'],1, 50)){
    $errors['title'] = 'Title is required';
}

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

if (!empty($errors)) {
    return view('notes/create.view.php', [
        'heading' => 'Create Note',
        'errors'  => $errors
    ]);
}

$db->query(
    'INSERT INTO notes (title, body, user_id, create_at, updated_at) VALUES (:title, :body, :user_id, NOW(), NOW())',
    [
        ':title' => $_POST['title'],
        ':body'    => $_POST['body'],
        ':user_id' => $currentUserId
    ]
);

$_SESSION['user_id'] = $db->lastInsertId();

redirect('/notes');
