<section class="showPosts">

    <?php foreach ($posts as $post): ?>
        <article class="post">
            <h2 class="title"> <?php echo $post->getTitle();?> </h2>
            <h5> Kategori: <a href="/posts/category/<?php echo $post->getCategory() ?>" class ="postCategory"><?php echo $post->category_name; ?></h5></a>    
           
            <p class="body"> <?php echo $post->getBody(); ?> </p>             

                
                
                <div class="postTags">
                    <?php foreach($post->getTags() as $tag): ?>
                        <h5> #<a href="#" class="taglinks"><?php echo $tag['tag_name']; ?></a></h5>
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
                    <form action="/logout" method="POST"> 
                        <button type="submit" class ="logout">Logga ut</button>    
                    </form>
                    <form action="/newpost" method="POST"> 
                        <button type="submit" class ="logout">Nytt inlägg</button>    
                    </form>

                </div>   


        </article>      
    <?php endforeach ?>    
</section>      

<div class="pages">
    <a href="#" class="previous round">&#8249;</a>
    <a href="#" class="next round">&#8250;</a>
</div>    

