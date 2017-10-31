<?php include "./templates/header.php"; ?>

        <h1 class ="create-post-h1"> Skapa nytt inlägg</h1>
   
    <!-- Create new post -->
    <section class = "create">

        <!-- Select tags --> 
        <div class = "select-tags" name ="tags">
            <div class = "tag">
                <input class="check-tags" type="checkbox" id="HTML">
                <label for "check-tags" > HTML</label>
            </div>
            <div class = "tag">    
                <input class="check-tags" type="checkbox" id="CSS">
                <label> CSS</label>
            </div>
            <div class = "tag">        
                <input class="check-tags" type="checkbox" id="JavaScript">
                <label> JavaScript</label>
            </div>
            <div class = "tag">
                <input class="check-tags" type="checkbox" id="AvanaceradJS">
                <label> Avancerad JavaScript</label>
            </div> 
            <div class = "tag">
                 <input class="check-tags" type="checkbox" id="UX">
                 <label> UX och design</label>
             </div> 
            <div class = "tag">
                <input class="check-tags" type="checkbox" id="PHP"> 
                <label>PHP</label>
            </div>        
            <div class = "tag">
              <input class="check-tags" type="checkbox" id="Projektmetodik">
              <label> Projektmetodik</label>
            </div> 
            <div class = "tag">
                <input class="check-tags" type="checkbox" id="Program-metodik">
                <label> Programmeringsmetodik</label>
            </div>

        </div>

        <div>  
            <!-- Insert title and body -->  
            <form class = "create-post">
                <input type ="text" placeholder =" < Din titel >" id="title" name="title" method= "POST">
                <textarea type ="text" placeholder =" < Din text >" id ="body" name="body" class="textfield" method="POST"></textarea>
            </form> 

            <!-- Select category -->
            <div class = "category-save">    
                <select class ="select-category" name = "category" id="soflow">
                    <option value = "" disabled selected> Välj kategori </option>
                    <option value = "front"> Frontend </option>
                    <option value = "back"> Backend </option>
                    <option value = "other"> Övrigt </option>
                </select>
                <a href ="#" class="save">Spara</a>
            </div>

        </div>    
   
    </section>


<?php include "./templates/footer.php"; ?>