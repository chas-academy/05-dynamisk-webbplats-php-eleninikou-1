<section class="showPosts">

    <?php foreach ($posts as $post): ?>
        <article class="post">
            <h2> <?php echo $post->getTitle();?> </h2>
            <h4> <?php echo $post->getBody(); ?> </h4>
            <h5>Kategori: <a href="#"><?php echo $post->category_name; ?></h5></a>              
                <div class="postTags">
                    <?php foreach($post->getTags() as $tag): ?>
                        <h5> #<a href="#" class="taglinks"><?php echo $tag['tag_name']; ?></a></h5>
                    <?php endforeach ?>
                </div>  
            <div class="postButtons">
                <form action="/<?php echo $post->getId(); ?>/toUpdate"> 
                    <button type="submit">Uppdatera</button>
                </form>
                <form action="/<?php echo $post->getId(); ?>/delete">
                    <button type="submit">Radera</button>
                </form>
            </div>    
        </article>      
    <?php endforeach ?>    
</section>      
  


