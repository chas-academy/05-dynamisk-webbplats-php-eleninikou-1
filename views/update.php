   
  
    <section class = "create">
        <form class="create-post" action="/update" method="post"> 
            <div class="post-tags">
                <section class="post-input">
                    <h2> Uppdatera inlägg </h2>
                    <input type="hidden" name="post_id" value="<?php echo $post->getId(); ?>">
                    <input type="text" id="title" name="title" value="<?php echo $post->getTitle(); ?>">
                    <textarea type="text" id="body" name="body" value=""><?php echo $post->getBody(); ?></textarea>
               
                    <button type="submit" class="save">Spara </button>
                       
                </section>
            
                <section class="right-side">
                <a href="#" class="close-button"></a>
                    <a href ="/posts" class ="logout"></a>
                
                    <select multiple class="select-tags" name="tag[]">
                        <option value="" disabled selected class="select"> Välj taggar </option>
                            

            <!-- Axel I really hope you see this section because 3 people worked on it for 10 hours -->

                        <?php foreach ($allTags as $tag): ?>

                        <?php $postTags = array(); ?>

                        <?php foreach ($tags as $t): ?>
                            <?php $tId = $t['tag_id']; ?>
                            <?php array_push($postTags, $tId); ?>
                        <?php endforeach; ?>

                                        <?php if (in_array($tag['tag_id'], $postTags)): ?> 
                                            <option value="<?php echo $tag['tag_id']; ?>" selected><?php echo $tag['tag_name']; ?></option>
                
                                        <?php else: ?>
                                            <option value="<?php echo $tag['tag_id']; ?>"><?php echo $tag['tag_name']; ?></option> 
                                           
                                        <?php endif; ?>
                                <?php endforeach; ?>
                        
                        </select>    

            <!-- ********************************************************************************** -->

                    <select class="select-categories" name="category">
                        <option value= "" disabled class="select"> Välj kategori </option>
                            <?php foreach ($allCategories as $cat): ?>
                                <?php if ($cat['category_id'] == $post->getCategory()): ?>
                                    <option value"<?php echo $cat['category_id']; ?>" selected> <?php echo $cat['category_name']; ?></option> 
                        
                                <?php else: ?>
                                    <option value"<?php echo $cat['category_id']; ?>" > <?php echo $cat['category_name']; ?> </option> 
                                <?php endif; ?>
                            <?php endforeach; ?>
                    </select>                    
            </div>  
        </form>
    </section>
