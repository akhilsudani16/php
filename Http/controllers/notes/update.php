<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Core\Session;

$db = App::resolve(Database::class);

$currentUserId = Session::get('user')['id'];

$note = $db->query(
    'SELECT * FROM notes WHERE id = :id',
    [
        'id' => $_POST['id']
    ]
)->findOrFails();

authorize($note['user_id'] === $currentUserId);

$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

if (!empty($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors'  => $errors,
        'note'    => $note
    ]);
}

$db->query(
    'UPDATE notes SET body = :body WHERE id = :id',
    [
        ':id'   => $_POST['id'],
        ':body' => $_POST['body']
    ]
);

redirect('/notes');