<video id="video" class="video" autoplay controls loop>
        <source src="<?php echo ROOT_PATH . 'styles/images/hands.mp4'; ?>" type="video/mp4">
    </video>

<h3 class="welcome"> Välkommen </h3>    

<section class="index">
    <nav class ="search">
        <h2>Sök</h2>
        <ul class="Searchposts">
            <li class="navmenu">Kategorier</Kategorier></li>
                <ul class="categories">
                    <li><a href="./posts/category/1">Frontend</a></li>
                    <li>|</li>
                    <li><a href="./posts/category/2">Backend</a></li>
                    <li>|</li>
                    <li><a href="./posts/category/3">Annat</a></li>
                </ul>
            <li class="navmenu">Taggar</Taggar></li>
            <div class="taggar">
                <section class="tags">
                    <li># <a href="./posts/tags/1"> HTML</HTML></a></li>
                    <li># <a href="./posts/tags/2"> CSS</CSS></a></li>
                    <li># <a href="./posts/tags/3"> JavaScript</a></li>
                    <li># <a href="./posts/tags/4"> Avancerad Javascript</a></li>
                 </section>
                 <section class="tags">   
                    <li># <a href="./posts/tags/5"> UX och Design</a></li>
                    <li># <a href="./posts/tags/6"> PHP</a></li>
                    <li># <a href="./posts/tags/7"> Projektmetodik</a></li>
                    <li># <a href="./posts/tags/8"> Programmeringsmetodik</a></li>
                </section>
            </div>
           <!-- <li class="navmenu"><a> Alla inlägg </a></li> -->
        </ul>
    </nav>

    <section class="loginsection">
        <h2 class="create-h2">Skapa inlägg </h2>
        <section class ="user-login">

            <form class="login" action="/login" method="POST">
                <div class="logintext">    
                    <input type="text" name="email" id="password"> 
                    <h5> Email</h5>
                </div>
                
                <?php if($params == null): ?>
                     <button type="submit" name="login" id="loginbutton" value="LOGGA IN"> Logga in </button>
                     <?php else: ?> <i class="fa fa-arrow-up"></i> <?php  echo($params['errormessage']); ?>
                    <button type="submit" name="login" id="loginbutton" value="LOGGA IN"> Logga in </button>
                <?php endif ?>
            </form> 
        </section>
    </section>
</section>    

