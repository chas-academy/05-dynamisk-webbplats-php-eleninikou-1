/* SKAPA ANVÄNDARE */
INSERT INTO users (firstname, lastname, email, password) 
VALUES (:firstname, :lastname, :email, :password);

/* SKAPA INLÄGG */
INSERT INTO posts (title, body, category, tag)
VALUES (:title, :body :category, :tag)

/* SÖK INLÄGG */
SELECT * FROM posts WHERE title LIKE %$search%

/* REDIGERA INLÄGG */


/* HÄMTA ALLA INLÄGG */
SELECT * FROM posts 

/* HÄMTA INLÄGG EFTER KATEGORI: frontend, backend, other */
SELECT * FROM posts WHERE category ='$category'

/* HÄMTA INLÄGG EFTER TAGG */
SELECT * FROM posts WHERE tag ='$tag'
 
 // css
 // javascript
 // avancerad_javascript
 // UX_design
 // php
 // projektmetodik
 // prog_metodik: