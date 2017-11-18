<section class="showPosts">

    <?php foreach ($posts as $post): ?>
        <article class="post">
            <h2 class="title"> <?php echo $post->getTitle();?> </h2>
            <h5 class ="postCategory">Kategori: <a href="/posts/category/<?php echo $post->getCategory() ?>"><?php echo $post->category_name; ?></h5></a>    
           
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

                </div>   



        </article>      
    <?php endforeach ?>    
</section>      
  


