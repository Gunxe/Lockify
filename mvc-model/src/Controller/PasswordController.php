<?php

    namespace App\Controller;

    use App\Repository\PasswordRepository;
    use App\Repository\UserRepository;
    use App\View\View;


    class PasswordController{
        public function index()
        {

            if (!isset($_SESSION['login']) && !$_SESSION['login']){
                header("location:/login/");
            }
            $passwordRepository = new PasswordRepository();
            $view = new View('password/index');
            $view->title = 'Passwords';

            $view->passwords = $passwordRepository->readByUserID($_SESSION['id']);
            if(isset($_SESSION['login'])){
                $view->login = $_SESSION['login'];      
            }
            $view->display();
        } 

        public function create()
        {


            if (!isset($_SESSION['login']) && !$_SESSION['login']){
                header("location:/login/");
            }
            $view = new View('password/create');
            $view->title = 'Create password';
            if(isset($_SESSION['login'])){
                $view->login = $_SESSION['login'];      
            }
            $view->display();
        }

        public function update()
        {
            $ivlen = openssl_cipher_iv_length('cast5-cbc');
            $iv = openssl_random_pseudo_bytes($ivlen);
            
            if (!isset($_SESSION['login']) && !$_SESSION['login']){
                header("location:/login/");
            }
            $view = new View('password/update');
            $view->title = 'Update password';
            $passwordRepository = new PasswordRepository();
            $view->password = $passwordRepository->readById($_GET['id']);
            $view->password->password = openssl_decrypt($view->password->password,'cast5-cbc', '187', 0, "12345678");
            if(isset($_SESSION['login'])){
                $view->login = $_SESSION['login'];      
            }
            if (!isset($_SESSION['login']) || !$_SESSION['login'] || $view->password->userID != $_SESSION['id']){
                header("location:/password/");
            }
            $view->display();
        }

        public function show()
        {
            $ivlen = openssl_cipher_iv_length('cast5-cbc');
            $iv = openssl_random_pseudo_bytes($ivlen);
            $view = new View('password/show');
            $passwordRepository = new PasswordRepository();
            $view->password = $passwordRepository->readById($_GET['id']);
            $view->password->password = openssl_decrypt($view->password->password,'cast5-cbc', '187', 0, "12345678");
            $view->title = 'Update password';
            if(isset($_SESSION['login'])){
                $view->login = $_SESSION['login'];      
            }
            
            if (!isset($_SESSION['login']) && !$_SESSION['login']){
                header("location:/login/");
            }

            if (!isset($_SESSION['login']) || !$_SESSION['login'] || $view->password->userID != $_SESSION['id']){
                header("location:/password/");
            }
            $view->display();
        }

        public function doCreate()
        {

            $uppercase = preg_match('@[A-Z]@', $_POST['password']);
            $lowercase = preg_match('@[a-z]@', $_POST['password']);
            $number    = preg_match('@[0-9]@', $_POST['password']);
            $specialChars = preg_match('@[^\w]@', $_POST['password']);
        

            if (isset($_POST['send'])) {
                $notes = $_POST['notes'];
        
                if(isset($_POST['title']) && ! empty($_POST['title'])){
                    $title = $_POST['title'];
                }else{
                    $_SESSION['error'] = 'Title not set.';
                    header("location: /password/create");
                    return;
                }

                if(isset($_POST['uname']) && ! empty($_POST['uname'])){
                    $username = $_POST['uname'];
                }else{
                    $_SESSION['error'] = 'Username not set.';
                    header("location: /password/create");
                    return;
                }

                if($uppercase && $lowercase && $number && $specialChars && strlen($_POST['password']) >= 8) {
                    $password = $_POST['password'];
                }else{
                    $_SESSION['error'] = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
                    header("location: /password/create");
                    return;
                }

                if (isset($_POST['email']) && ! empty($_POST['email'])) {
                    $email = $_POST['email'];
                    
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $_SESSION['error'] = 'This is not an email';
                        header("location: /password/create");
                        return;
                    }
                } else {
                    $_SESSION['error'] = 'Email not set';
                    header("location: /password/create");
                    return;
                }
                
                $passwordRepository = new PasswordRepository();
                $passwordRepository->create($title, $username, $password, $email, $notes);
            }
            // Anfrage an die URI /user weiterleiten (HTTP 302)
            header('Location: /password/index');
        }   

        public function doUpdate()
        {
            
            $uppercase = preg_match('@[A-Z]@', $_POST['password']);
            $lowercase = preg_match('@[a-z]@', $_POST['password']);
            $number    = preg_match('@[0-9]@', $_POST['password']);
            $specialChars = preg_match('@[^\w]@', $_POST['password']);
        

            if (isset($_POST['send'])) {
                $notes = $_POST['notes'];
        
                if(isset($_POST['title']) && !empty($_POST['title'])){
                    $title = $_POST['title'];
                }else{
                    $_SESSION['error'] = 'Title not set.';
                    header('location: /password/update?id='. $_GET['password_ID']);
                    return;
                }

                if(isset($_POST['uname']) && !empty($_POST['uname'])){
                    $username = $_POST['uname'];
                }else{
                    $_SESSION['error'] = 'Username not set.';
                    header('Location: /password/update?id='. $_GET['password_ID']);
                    return;
                }

                if(isset($_POST['password']) && $uppercase && $lowercase && $number && $specialChars && strlen($_POST['password']) >= 8) {
                    $password = $_POST['password'];
                }else{
                    $_SESSION['error'] = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
                    header('location: /password/update?id='. $_GET['password_ID']);
                    return;
                }

                if (isset($_POST['email']) && !empty($_POST['email'])) {
                    $email = $_POST['email'];
                    
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $_SESSION['error'] = 'This is not an email';
                        header('location: /password/update?id='. $_GET['password_ID']);
                        return;
                    }
                } else {
                    $_SESSION['error'] = 'This is not an email';
                    header('location: /password/update?id='. $_GET['password_ID']);
                    return;
                }

                $passwordRepository = new PasswordRepository();
                $passwordRepository->update($_GET['password_ID'], $title, $username, $password, $email, $notes);
                header('location: /password');
            }   


        }
        public function delete()
        {
            $passwordRepository = new PasswordRepository();
            $password = $passwordRepository->readById($_GET['id']);
            if (!isset($_SESSION['login']) || !$_SESSION['login'] || $password->userID != $_SESSION['id']){
                header("location:/password/");
                return;
            }

            $passwordRepository->deleteById($_GET['id']);
    
            
            // Anfrage an die URI /user weiterleiten (HTTP 302)
            header('Location: /password');
        }
    }
?>