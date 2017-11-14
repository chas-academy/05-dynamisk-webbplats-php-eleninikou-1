
    <section class = "create">
        <form class="create-post" action="<?php echo $post->getId(); ?>/updated" method="post"> 
            <div class="post-tags">
                <section class="post-input">
                    <h2> Uppdatera inlägg </h2>
                    <input type="text"  id="title" name="title" value="<?php echo $post->getTitle(); ?>">
                    <textarea type="text" id="body" name="body" value="<?php echo $post->getBody(); ?>"></textarea>
               
                    <button type="submit" class="save">Spara </button>
                       
                </section>
            
                <section class="right-side">
                <a href="#" class="close-button"></a>
                    <a href ="/posts" class ="logout"></a>
                            
                        <select multiple class="select-tags" name="tag[]"> 
                            <option value="" disabled selected class="select"> Välj taggar </option>
                            <option value= 1> HTML </option>
                            <option value= 2> CSS </option>
                            <option value= 3> JavaScript </option>
                            <option value= 4> Avancerad JavaScript </option>
                            <option value= 5> UX och design </option>
                            <option value= 6> PHP </option>
                            <option value= 7> Projektmetodik </option>
                            <option value= 8> Programmeringsmetodik </option>
                        </select>    

                    <!-- Select category -->
                    <select multiple class="select-category" name="category">
                        <option value= "" disabled selected class="select"> Välj kategori </option>
                        <option value= 1> Frontend </option>
                        <option value= 2> Backend </option>
                        <option value= 3> Övrigt </option>
                    </select>
            </div>  
        </form>
    </section>
