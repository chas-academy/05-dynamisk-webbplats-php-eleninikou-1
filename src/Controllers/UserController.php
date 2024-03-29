<?php

namespace Teorihandbok\Controllers;
use Teorihandbok\Models\UserModel;
use Teorihandbok\Models\PostModel;
use Teorihandbok\Exceptions\NotFoundException;

class UserController extends AbstractController
    {
    public function login(): string
    {
        // If the request isn't POST-method -> back to homepage.
        // This is to prevent info to get displayed in the URL with GET-method. 
        if (!$this->request->isPost()) {
            $params = ['errormessage' => 'Du loggar in med din email!'];
            return $this->render('views/layout.php', $params);
        }

        // Request-object gets parameters from URL.
        $params = $this->request->getParams();

        if (!$params->has('email')) {
            $params = ['errormessage' => ''];
            return $this->render('views/layout.php', $params);
        }

        // Save email in a new variable. New instance of UserModel 
        // because we want to get the right user -> email. 
        $email = $params->getString('email');
        $UserModel = new UserModel();

        try {
            // Now we can use the method getByEmail in the UserModel. 
            // And throw exception if we have to. 
            $user = $UserModel->getByEmail($email);
            // 'user' gets the value of user-id. 
            setcookie('user', $user['id']);

            return $this->redirect('admin');

        }   catch (Exception $e) {
                $params = ['errormessage' => 'Du loggar in med din email!'];
                return $this->render('views/layout.php', $params);
        }        
    }       

    public function dashboard() {

        if (!isset($_COOKIE['user'])) {
            return $this->redirect('login');
        }

        $postmodel = new PostModel();
        $posts = $postmodel->reallygetAll();

        $params = [
            'posts' => $posts
        ];
        // User is now logged in to admin-page 
        return $this->render('views/adminposts.php', $params);   
    }

    public function logout()
    {
        $params =[];

        //if (isset($_COOKIE['user'])) {
        //    unset($_COOKIE['user']);
        //    setcookie($user['id'], '', time() - 3600, '/'); 
        //}
        setcookie('user' ,"", time()-3600, '/');
        unset ($_COOKIE['user']);

        $this->redirect('/', $params);
    }
}