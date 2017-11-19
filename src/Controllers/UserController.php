<?php

namespace Teorihandbok\Controllers;
use Teorihandbok\Models\UserModel;

class UserController extends AbstractController
    {
    public function login(): string
    {
        // If the request isn't POST-method -> back to homepage.
        // This is to prevent info to get displayed in the URL with GET-method. 
        if (!$this->request->isPost()) {
            $params = ['errorMessage' => 'Logga in för att skapa nya inlägg!'];
            return $this->render('views/layout.html', $params);
        }

        // Request-object gets parameters from URL.
        $params = $this->request->getParams();

        if (!$params->has('email')) {
            $params = ['errorMessage' => 'Du loggar in med din email!'];
            return $this->render('views/layout.html', $params);
        }

        // Save email in a new variable. New instance of UserModel 
        // because we want to get the right user -> email. 
        $email = $params->getString('email');
        $UserModel = new UserModel();

        try {
            // Now we can use the method getByEmail in the UserModel. 
            // And throw exception if we have to. 
            $user = $UserModel->getByEmail($email);
        } catch (NotFoundException $e) {
            $this->log->warn('Kunde inte hitta användare med denna email: ' . $email);
            $params = ['errorMessage' => 'Kunde ej hitta email'];
            return $this->render('views/layout.html', $params);
        }

        // 'user' gets the value of user-id. 
        setcookie('user', $user['id']);

        $properties = [
        ];
        // User is now logged in to admin-page with right URL
        return $this->render('views/admin.php', $properties);
    } 

    public function logOut()
    {
        $properties =[];

        setcookie('user', '', time()-500, '/');
        $this->redirect('/', $properties);
    }
}