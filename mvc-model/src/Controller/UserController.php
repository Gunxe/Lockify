<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\View\View;

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    public function index()
    {
        $userRepository = new UserRepository();

        $view = new View('user/index');
        $view->title = 'Benutzer';
        $view->heading = 'Benutzer';
        $view->users = $userRepository->readAll();
        $view->display();
    }

    public function create()   
    {
        $view = new View('user/create');
        $view->title = 'Create User';
        $view->display();
    }

    public function doCreate()
    {

        $uppercase = preg_match('@[A-Z]@', $_POST['password']);
        $lowercase = preg_match('@[a-z]@', $_POST['password']);
        $number    = preg_match('@[0-9]@', $_POST['password']);
        $specialChars = preg_match('@[^\w]@', $_POST['password']);

        if(isset($_POST['uname']) && ! empty($_POST['uname'])){
            $uname = $_POST['uname'];
        }else{
            $_SESSION['error'] = 'Username not set.';
            header("location: /user/create");
            return;
        }

        if(isset($_POST['email']) && ! empty($_POST['email'])){
            $email = $_POST['email'];
        }else{
            $_SESSION['error'] = 'Email not set.';
            header("location: /user/create");
            return;
        }

        if($uppercase && $lowercase && $number && $specialChars && strlen($_POST['password']) >= 8) {
            $password = $_POST['password'];
        }else{
            $_SESSION['error'] = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
            header("location: /user/create");
            return;
        }

        if (isset($_POST['send'])) {

            $userRepository = new UserRepository();
            $userRepository->create($uname, $email, $password);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /password');
    }

    public function delete()
    {
        $userRepository = new UserRepository();
        $userRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }
}
