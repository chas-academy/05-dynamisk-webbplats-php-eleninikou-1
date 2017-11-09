<?php 

include './templates/footer.php'; 
include './templates/header.php'; 
include './src/Core/Econnection.php';

use Teorihandbok\Core\router;


function autoloader($classname)
{
    $lastSlash = strpos($classname, '\\') + 1;
    $classname = substr($classname, $lastSlash);
    $directory = str_replace('\\', '/', $classname);
    $filename = __DIR__ . '/src/' . $directory . '.php';
    require_once($filename);
}

spl_autoload_register('autoloader'); 

$router = new Router();

?>
<section class="index">
    <nav class ="search">
        <h2>Sök</h2>
        <ul class="Searchposts">
            <li class="navmenu">Efter Kategori</li>
                <ul class="categories">
                    <li><a href="./views/Frontend.php">Frontend</a></li>
                    <li><a href="./views/Backend.php">Backend</a></li>
                    <li><a href="./views/Other.php">Övrigt</a></li>
                </ul>
            <li class="navmenu">Efter taggar</li>
                <ul class="tags">
                    <li><a href="./views/HTML.php">HTML</a></li>
                    <li><a href="./views/CSS.php">CSS</a></li>
                    <li><a href="./views/JavaScript.php">JavaScript</a></li>
                    <li><a href="./views/AvanceradJavaScript.php">Avancerad Javascript</a></li>
                    <li><a href="./views/UXDesign.php">UX och Design</a></li>
                    <li><a href="./views/PHP.php">PHP</a></li>
                    <li><a href="./views/Projektmetodik.php">Projektmetodik</a></li>
                    <li><a href="./views/programmeringsmetodik.php">Programmeringsmetodik</a></li>
                </ul>
           <!-- <li class="navmenu"><a> Alla inlägg </a></li> -->
        </ul>
    </nav>

    <section class="loginsection">
        <h2 class="create-h2">Skapa</h2>
        
        <section class ="user-login">

            <form class="login" action="./src/Controllers/UserController.php" method="POST">
                <div class="logintext">
                    <input type="text" name="username" id="username">
                    <h5>Namn</h5>
                </div>
                <div class="logintext">    
                    <input type="text" name="password" id="password"> 
                    <h5>Lösenord</h5>
                </div>
                <button type="submit" name="login" id="loginbutton" value="LOGGA IN"> Logga in </button>
            </form> 
        </section>
    </section>
    <section class="book">
        <h2 class="create-h2">Läs</h2>
        
        <a href="#"><img src="./css/images/book.png" class ="theBook"></a>
    </section>
</section>    

