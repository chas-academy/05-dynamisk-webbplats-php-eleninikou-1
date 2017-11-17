
   
    <section class = "create">
        <form class="create-post" action="/<?php echo $post->getId(); ?>/updated" method="post"> 
            <div class="post-tags">
                <section class="post-input">
                    <h2> Uppdatera inlägg </h2>
                    <input type="text" id="title" name="title" value="<?php echo $post->getTitle(); ?>">
                    <textarea type="text" id="body" name="body" value=""><?php echo $post->getBody(); ?></textarea>
               
                    <button type="submit" class="save">Spara </button>
                       
                </section>
            
                <section class="right-side">
                <a href="#" class="close-button"></a>
                    <a href ="/posts" class ="logout"></a>
                
                    <select multiple class="select-tags" name="tag[]">
                        <option value="" disabled selected class="select"> Välj taggar </option>
                            <?php foreach ($allTags as $value): ?>
                            <?php $i = 0; ?>
                                    <?php foreach ($tags as $tag): ?>

                                        <?php if ($tag['tag_id'] === $value['tag_id']): ?> 
                                            <option value="<?php echo $value['tag_id']; ?>" selected><?php echo $value['tag_name']; ?></option>
                                            <?php break; ?>

                                        <?php elseif ($tag['tag_id'] != $value['tag_id'] && in_array($tag['tag_id'], $tags)): ?>
                                            <?php break; ?>
                                        
                                        <?php else: ?>
                                        <?php if($i == 0): ?>
                                            <option value="<?php echo $value['tag_id']; ?>"><?php echo $value['tag_name']; ?></option> 
                                            <?php $i++; ?>
                                            
                                            <?php endif; ?>
                                        <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </select>    

                    <select class="select-categories" name="category">
                        <option value= "" disabled class="select"> Välj kategori </option>
                            <?php foreach ($allCategories as $cat): ?>
                                <?php if ($cat['category_id'] === $post->getCategory()): ?>
                                    <option value"<?php echo $cat['category_id']; ?>" selected ><?php echo $cat['category_name']; ?></option> 
                        
                                <?php else: ?>
                                    <option value"<?php echo $cat['category_id']; ?>"><?php echo $cat['category_name']; ?></option> 
                                <?php endif; ?>
                            <?php endforeach; ?>
                    </select>                    
            </div>  
        </form>
    </section>
