
    <!-- Create new post -->
    <section class = "create">
        <!-- Insert title and body -->  
        <form class="create-post" action="" method="post">
            
            <div class="post-tags">
                <section class="post-input">
                    <h2> Skapa inlägg </h2>
                    <input type="text"  id="title" name="title" placeholder =" Titel">
                    <textarea type="text" id="body" name="body" class="textfield" placeholder=" Text"></textarea>
                    
                    <div class="arrow">
                        <button type="submit" class="save">Spara </button>
                        <span class="arrow-head"></span>
                        <span class="arrow-arm"></span>
                    </div>  
                </section>
            
                <section class="right-side">
                <a href="#" class="close-button"></a>
                    <a href ="../layout.php" class ="logout"></a>
                        <!-- Select Tags -->          
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
