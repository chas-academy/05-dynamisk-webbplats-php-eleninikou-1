<?php 

include "./templates/header.php"; 
include "./templates/footer.php"; 


?>

<section class ="info">
    <h1 class ="create-post-h1"> Skapa nytt inlägg</h1><a href ="index.php" class ="logout">Logga ut</a>
</section>  
    <!-- Create new post -->
    <section class = "create">

        <!-- Insert title and body -->  
        <form class="create-post" action="src/Domain/posts.php" method="post">
            
            <div class="post-tags">
                <section class="post-input">
                    <input type="text"  id="title" name="title">
                    <textarea type="text" id ="body" name="body" class="textfield"></textarea>
                </section>

                <section class="tags-input">           
                    <!-- Select tags --> 
                    <input class="check-tags" type="checkbox" name ="tags[]" value="1" id="HTML">
                    <label for="HTML"> HTML </label>


                    <input class="check-tags" type="checkbox" name ="tags[]" value="2" id="CSS" >
                    <label for="CSS"> CSS </label>


                    <input class="check-tags" type="checkbox" name ="tags[]" value="3" id="JavaScript">
                    <label for="JavaScript"> JavaScript </label>


                    <input class="check-tags" type="checkbox" name ="tags[]" value="4" id="AvanaceradJS">
                    <label for="AvanaceradJS"> Avancerad JavaScript </label>

                    <input class="check-tags" type="checkbox" name ="tags[]" value="5" id="UX">
                    <label for="UX"> UX och design </label>

                    <input class="check-tags" type="checkbox" name ="tags[]" value="6" id="PHP"> 
                    <label for="PHP"> PHP </label>

                    <input class="check-tags" type="checkbox" name ="tags[]" value="7" id="Projektmetodik">
                    <label for="Projektmetodik"> Projektmetodik </label>

                    <input class="check-tags" type="checkbox" name ="tags[]" value="8" id="Program-metodik">
                    <label for="Program-metodik"> Programmeringsmetodik </label>

                </section>
            </div> 

                    <!-- Select category -->
                <div class = "category-save">    
                    <select class ="select-category" name = "category">
                        <option value = "" disabled selected> Välj kategori </option>
                        <option value = 1> Frontend </option>
                        <option value = 2> Backend </option>
                        <option value = 3> Övrigt </option>
                    </select>
                    <button type="submit" class="save">Save</button>
                </div>  
   
        </form>
    </section>
