<?php
    namespace App\Controller;

    use App\View\View;
    use App\Repository\UserRepository;


    class LoginController
    {
        /**
         * Die index Funktion des DefaultControllers sollte in jedem Projekt
         * existieren, da diese ausgeführt wird, falls die URI des Requests leer
         * ist. (z.B. http://my-project.local/). Weshalb das so ist, ist und wann
         * welcher Controller und welche Methode aufgerufen wird, ist im Dispatcher
         * beschrieben.
         */
        public function index()
        {
            // In diesem Fall möchten wir dem Benutzer die View mit dem Namen
            //   "default_index" rendern. Wie das genau funktioniert, ist in der
            //   View Klasse beschrieben.

            if (isset($_SESSION['login']) && $_SESSION['login']){
                header("location:/");
            }

            $view = new View('login/index');
            $view->title = 'Login';
            $view->javascript = 'Login';
            $view->display();
        }

        public function doLogin()
        {
            if(isset($_POST['uname']) && !empty($_POST['uname']) && isset($_POST['password']) && !empty($_POST['password'])){
                $repository = new UserRepository();

                $user = $repository->readByUsernamePassword($_POST['uname'], $_POST['password']);

                if (!$user){
                    header("location:/login/index");
                }else{
                    $_SESSION['id'] = $user->id;
                    $_SESSION['login'] = true;
                    header("location:/");
                }
            }
        }
        public function logOut()
        {
            session_destroy();
            unset($_SESSION);

            header("location:/");
        }
    }
?>