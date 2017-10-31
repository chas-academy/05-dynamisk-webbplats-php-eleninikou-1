<?php 
include './templates/header.php'; 
require_once ('databse.php'); //Include the databse connection

// Run the code only if form is submitted
if (isset($_POST['create_user'])) 
{   
        // The inserted values from input below are stored in $_POST array
        $new_user = array(
            'firstname' => $_POST['firstname'],
            'lastname'  => $_POST['lastname'],
            'email'     => $_POST['email'],
            'password'  => $_POST['password']
        );
            
        try {
            // Adding new user into users table
            $add_user = $connection->query('INSERT INTO users (firstname, lastname, email, password) 
            values (:firstname, :lastname, :email, :password)');

            //The query returns a PDO statement as a string
            $statement = $connection->prepare($add_user);
            $statement->execute($new_user);

        } catch (Exception $e) 
        {       
            //getMessage method from exception model
            echo $e->getMessage();
            die();
        }


} //else { (isset($_POST['login']))-- Logga in till create_post.php }

?>

<section class ="new-user-info">

    <form class = "create-user" method="POST">
    	<input type="text" name="firstname" id="firstname" placeholder =" < Ditt förnamn > ">
    	<input type="text" name="lastname" id="lastname" placeholder = " < Ditt efternamn > ">
        <input type="text" name="email" id="email" placeholder =" < Email > ">
        <input type="text" name="password" id="password" placeholder =" < Lösenord > ">
        <div class ="submit-buttons">
            <input type="submit" name="create_user" value="SKAPA ANVÄNDARE">
            <input type="submit" name="login" value="LOGGA IN">
        </div>
    </form>

</section>


<?php include "./templates/footer.php"; ?>