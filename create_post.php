<?php 

include "./templates/footer.php"; 

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Montserrat|Oxygen" rel="stylesheet">
    <title>Teorihandboken</title>

</head>

<body>

<header>
    <img src="./css/images/view.jpg" class ="backgroundphoto">
    <h1 class ="admin-logo">Teorihandboken</h1> 
</header>


    <!-- Create new post -->
    <section class = "create">
        <!-- Insert title and body -->  
        <form class="create-post" action="src/Domain/posts.php" method="post">
            
            <div class="post-tags">
                <section class="post-input">
                    <input type="text"  id="title" name="title">
                    <textarea type="text" id ="body" name="body" class="textfield"></textarea>
                    
                </section>
            
                <section class="right-side">
                    <a href ="index.php" class ="logout">Logga ut</a>
                        <!-- Select Tags -->          
                        <select multiple class="select-tags"> 
                            <option value="" disabled selected class="select"> Välj taggar </option>
                            <option value= 1 id="HTML"> HTML </option>
                            <option value= 2 id="CSS"> CSS </option>
                            <option value= 3 id="JavaScript"> JavaScript </option>
                            <option value= 4 id="AvanaceradJS"> Avancerad JavaScript </option>
                            <option value= 5 id="UX"> UX och design </option>
                            <option value= 6 id="PHP"> PHP </option>
                            <option value= 7 id="Projektmetodik"> Projektmetodik </option>
                            <option value= 8 id="Program-metodik"> Programmeringsmetodik </option>
                        </select>    

                    <!-- Select category -->
                    <select multiple class ="select-category" name = "category">
                        <option value = "" disabled selected class ="select"> Välj kategori </option>
                        <option value = 1> Frontend </option>
                        <option value = 2> Backend </option>
                        <option value = 3> Övrigt </option>
                    </select>
                    <button type="submit" class="save">Spara</button>
            </div>  
   
        </form>
    </section>
