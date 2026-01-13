<?php

$_SESSION['name'] = 'John';

view("indexview.php", [
    'heading' => 'Dashboard'
]);
