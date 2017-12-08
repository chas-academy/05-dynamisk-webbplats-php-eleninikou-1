<video id="video" class="video" autoplay controls loop>
        <source src="<?php echo ROOT_PATH . 'styles/images/hands.mp4'; ?>" type="video/mp4">
    </video>

<h3 class="welcome"> Välkommen </h3>    

<section class="index">
    <nav class ="search">
        <h2>Sök inlägg</h2>
        <ul class="Searchposts">
                <ul class="categories">
                    <li class="navmenu">kategorier</Kategorier></li>
                    <li><a href="./posts/category/1">Frontend</a></li> 
                    <li><a href="./posts/category/2">Backend</a></li>  
                    <li><a href="./posts/category/3">Annat</a></li>
                </ul>
            <div class="taggar">
                <section class="tags">
                    <li><a href="./posts/tags/1"> HTML</HTML></a></li>
                    <li><a href="./posts/tags/2"> CSS</CSS></a></li>
                    <li><a href="./posts/tags/3"> JavaScript</a></li>
                    <li><a href="./posts/tags/4"> Avancerad Javascript</a></li>
                 </section>
                 <section class="tags2">   
                    <li><a href="./posts/tags/5"> UX och Design</a></li>
                    <li><a href="./posts/tags/6"> PHP</a></li>
                    <li><a href="./posts/tags/7"> Projektmetodik</a></li>
                    <li><a href="./posts/tags/8"> Programmeringsmetodik</a></li>
                </section>
            </div>
        </ul>
    </nav>

    <section class="loginsection">
        <h2 class="create-h2">Skapa inlägg </h2>
        <section class ="user-login">

            <form action="/login" method="POST">
                    <div class="inputbutton">
                        <input type="text" name="email" id="password" placeholder="email">
                        <button type="submit" name="login" id="loginbutton" value="LOGGA IN"><i class="fa fa-key"></i></button> 
                    </div>
                        <h5>Logga in</h5>
                <div class="help">
                    <?php if($params == null): ?>
                         <?php else: ?> <i class="fa fa-arrow-up"></i> <?php  echo($params['errormessage']); ?>
                    <?php endif ?>
                </div>
            </form> 
        </section>
    </section>
</section>    

