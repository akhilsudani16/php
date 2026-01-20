<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUser = 1;



$notes =  $db -> query('select * from notes where user_id = :currentUser',[
    'currentUser' => $currentUser
])->get();



view("notes/index.view.php" , [
    'heading' => 'My Notes',
    'notes' => $notes
]);