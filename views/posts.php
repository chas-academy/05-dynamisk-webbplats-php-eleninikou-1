<section class="showPosts">

<div class="back">
    <a href="/" class="arrow"><i class="fa fa-angle-double-left"></i></a>
    <a href="/" class="arrow"<p> Tillbaka</p></a>
</div>

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
                 
        </article>      
    <?php endforeach ?>    
</section>      

<div class="pages">
    <a href="#" class="previous round">&#8249;</a>
    <a href="#" class="next round">&#8250;</a>
</div> 
  


