<nav class="adminSearch">
    <ul class="searchTags">
        <li>#<a href="./posts/tags/2"> CSS</CSS></a></li>
        <li>|</li>
        <li>#<a href="./posts/tags/6"> PHP</a></li>
        <li>|</li>
        <li>#<a href="./posts/tags/1"> HTML</HTML></a></li>
        <li>|</li>
        <li>#<a href="./posts/tags/3"> JavaScript</a></li>
        <li>|</li>
        <li>#<a href="./posts/tags/5"> UX och Design</a></li>
        <li>|</li>
        <li>#<a href="./posts/tags/7"> Projektmetodik</a></li>
        <li>|</li>
        <li>#<a href="./posts/tags/4"> Avancerad Javascript</a></li>
        <li>|</li>
        <li>#<a href="./posts/tags/8"> Programmeringsmetodik</a></li>
    </ul>    
</nav>

<div class="newOut">

    <form action="/newpost" method="POST"> 
        <button type="submit" class ="NewLogout">Nytt inlägg</button>
    </form>

    <form action="/logout" method="POST"> 
        <button type="submit" class ="NewLogout">Logga ut</button>    
    </form>

</div>


<section class="showPosts">

    <?php foreach ($posts as $post): ?>
        <article class="post">
            <h2 class="title"> <?php echo $post->getTitle();?> </h2>
            <h5> Kategori: <a href="/posts/category/<?php echo $post->getCategory() ?>" class ="postCategory"><?php echo $post->category_name; ?></h5></a>    
           
            <p class="body"> <?php echo $post->getBody(); ?> </p>             
                
                <div class="postTags">
                    <?php foreach($post->getTags() as $tag): ?>
                        <h5> #<a href="/posts/tags/<?php echo $tag['tag_id']; ?>" class="taglinks"><?php echo $tag['tag_name']; ?></a></h5>
                    <?php endforeach ?>
                </div>
                <div class="postButtons" >
                    <form action="/<?php echo $post->getId(); ?>/toUpdate" method="POST"> 
                        <button type="submit">Uppdatera</button>
                    </form>
                    <form action="/delete" method="POST">
                        <input type ="hidden" name="post_id" value="<?php echo $post->getId(); ?>">
                        <button type="submit">Radera</button>
                    </form>
                    
                </div>   


        </article>      
    <?php endforeach ?>    
</section>      

<div class="pages">
    <a href="#" class="previous round">&#8249;</a>
    <a href="#" class="next round">&#8250;</a>
</div>    

