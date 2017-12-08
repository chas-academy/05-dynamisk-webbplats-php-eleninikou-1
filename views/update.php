<img src="<?php echo ROOT_PATH .'./styles/images/logo.png'; ?>" class="backgroundimage">    
<div class="back">
    <a href="admin" class="adminBack"><p><i class="fa fa-angle-double-left"></i> Tillbaka</p></a>
</div> 
        <form class="create-post" action="/update" method="post"> 
            <div class="post-tags">
                <section class="post-input">
                    <h2> Uppdatera inlägg </h2>
                    <input type="hidden" name="post_id" value="<?php echo $post->getId(); ?>">
                    <input type="text" id="title" name="title" value="<?php echo $post->getTitle(); ?>">
                    <textarea type="text" id="body" name="body" class="textfield" value=""><?php echo $post->getBody(); ?></textarea>        
                 </section>
            
                <section class="right-side">
                    <select multiple class="select-tags" name="tag[]">
                        <option value="" disabled class="select"> Välj taggar </option>
        
            <!-- Axel I really hope you see this section because 3 people worked on it for 10 hours -->

                        <?php foreach ($allTags as $tag): ?>
                            <?php $postTags = array(); ?>

                                <?php foreach ($tags as $post_t): ?>
                                    <?php $post_tId = $post_t['tag_id']; ?>
                                    <?php array_push($postTags, $post_tId); ?>
                                <?php endforeach; ?>

                                        <?php if (in_array($tag['tag_id'], $postTags)): ?> 
                                            <option value="<?php echo $tag['tag_id']; ?>" selected><?php echo $tag['tag_name']; ?></option>
                
                                        <?php else: ?>
                                            <option value="<?php echo $tag['tag_id']; ?>"><?php echo $tag['tag_name']; ?></option> 
                                           
                                        <?php endif; ?>
                                <?php endforeach; ?>
                        
                    </select>    

            <!-- ********************************************************************************** -->

                    <select class="select-category" name="category">
                        <option value="" disabled class="select"> Välj kategori </option>
                            <?php foreach ($allCategories as $cat): ?>
                                <?php if ($cat['category_id'] == $post->getCategory()): ?>
                                    <option value"<?php echo $cat['category_id']; ?>" selected> <?php echo $cat['category_name']; ?></option> 
                        
                                <?php else: ?>
                                    <option value"<?php echo $cat['category_id']; ?>" > <?php echo $cat['category_name']; ?> </option> 
                                <?php endif; ?>
                            <?php endforeach; ?>
                    </select>
                    
                    <button type="submit" class="save">Spara </button>                    
                </section>
            </div>  
        </form>
   
