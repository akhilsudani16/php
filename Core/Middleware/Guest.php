<?php

namespace Core\Middleware;
class Guest
{
    public function handle()
    {
        if($_SESSION['user'] ?? false){
            header('location: /');
            exit();
        }
    }
}

//  <?php

// namespace Core\Middleware;

// use Core\Session;

// class Guest
// {
//     public function handle()
//     {
//         if (Session::get('user')) {
//             redirect('/');
//         }
//     }
// }
