<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 3;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->findOrFails();

authorize($note['users_id'] === $currentUserId);

view("notes/show.view.php" , [
    'heading' => 'Note',
    'note' => $note
]);