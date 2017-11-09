

<?php if (isset($posts) && !empty($posts)): ?>
<?php foreach($posts as $post): ?>
    <ul>
        <li><?php echo $post->getTitle() ?></li>
        <li><?php echo $post->getBody() ?></li>
        <li><a href="/category/<?php echo $post->getCategory()?>" <strong> Kategori </strong>: <?php echo $post->getCategory() ?></a></li>
        <?php foreach($tags as $tag): ?>
            <li><a href="/tag/<?php echo $post->getTag()?>" <strong> Taggar </strong>: <?php echo $post->getTag() ?></a></li>
        <?php endforeach ?>
    </ul>
<?php endforeach ?>