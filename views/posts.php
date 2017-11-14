
<?php foreach ($posts as $post): ?>
<article class="post">
    <h2> <?php echo $post->getTitle();?> </h2>
    <h4> <?php echo $post->getBody(); ?> </h4>
    <h5>Kategori: <a href="#"><?php echo $post->category_name; ?></h5></a>
    <h5>Taggar: <?php foreach ($post->getTags() as $tag_name): ?>
                    <a href="#"><?php echo $tag_name; ?></h5></a>
                <?php endforeach ?>

    <form action="/post/<?php echo $post->getId(); ?>/update"> 
        <button type="submit">Uppdatera</button>
    </form>
    <form action="/post/<?php echo $post->getId(); ?>/delete">
        <button type="submit">Radera</button>
    </form>
</article>
    
<?php endforeach ?>    

<?php 
    echo '<pre>';
        var_dump($posts);
    echo '<pre>';
    ?>    



