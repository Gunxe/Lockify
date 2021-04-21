<?php

    namespace App\Controller;

    use App\Repository\PasswordRepository;
    use App\Repository\UserRepository;
    use App\View\View;


    class PasswordController{
        public function index()
        {
            $passwordRepository = new PasswordRepository();
            $view = new View('password/index');
            $view->title = 'Passwords';
            $view->passwords = $passwordRepository->readByUserID($_SESSION['id']);
            $view->display();
        } 

        public function create()
        {
            $view = new View('password/create');
            $view->title = 'Create password';
            $view->display();
        }

        public function doCreate()
        {
            if (isset($_POST['send'])) {
                $title = $_POST['title'];
                $username = $_POST['uname'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $notes = $_POST['notes'];

                $userRepository = new UserRepository();
                $userRepository->create($title, $username, $password, $email, $notes);
            }

            // Anfrage an die URI /user weiterleiten (HTTP 302)
            header('Location: /password/index');
        }
    }
?>