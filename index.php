
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <title>Teorihandboken</title>

</head>

<body>

<header>
    <h1 id = "logo"> Teorihandboken</h1>
</header>

    <div class = "create-logout">
        <h1> Skapa nytt inlägg</h1><button class = 'logout'>Logga ut</button>
    </div> 


    <!-- Create new post -->
    <section class = "create">

        <!-- Select tags -->
        <h2>Taggar:</h2>
        
        <div class = "select-tags" name ="tags">
            <div class = "tag">
                <input class="check-tags" type="checkbox" id="HTML">
                <label> HTML</label>
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
                <input class="check-tags" type="checkbox" id="PHP"> 
                <label>PHP</label>
            </div>        
            <div class = "tag">
              <input class="check-tags" type="checkbox" id="Projektmetodik">
              <label> Projektmetodik</label>
            </div> 
            <div class = "tag">
                <input class="check-tags" type="checkbox" id="UX">
                <label> UX och design</label>
            </div> 
            <div class = "tag">
                <input class="check-tags" type="checkbox" id="AvanaceradJS">
                <label> Avancerad JavaScript</label>
            </div> 
            <div class = "tag">
                <input class="check-tags" type="checkbox" id="Program-metodik">
                <label> Programmeringsmetodik</label>
            </div>

        </div>

        <div>  
            <!-- Insert title and body -->  
            <form class = "create-post">
                <label for = "title"> Titel: </label>
                <input type = "text" id="title" name="title" method= "POST">
                <label for = "text"> Text: </label>
                <input type = "text" id = "text" name = "text" method = "POST">
            </form> 

            <!-- Select category -->
            <div class = "category-button">    
                <select class ="select-category" name = "category">
                    <option value = "" disabled selected> Välj kategori </option>
                    <option value = "front"> Frontend </option>
                    <option value = "back"> Backend </option>
                    <option value = "other"> Övrigt </option>
                </select>
                <button class = "save">Spara</button>
            </div>

        </div>    
   
    </section>

    <script src="./index.js"></script>
</body>
<footer>
    
</footer>
</html>