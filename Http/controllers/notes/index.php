<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$currentUserId = Session::get('user')['id'];

$notes = $db->query(
    'SELECT * FROM notes WHERE user_id = :user_id',
    [
        'user_id' => $currentUserId
    ]
)->get();


view('notes/index.view.php', [
    'heading' => 'My Notes',
    'notes'   => $notes
]);
