/* SKAPA ANVÄNDARE */
INSERT INTO users (firstname, lastname, email, password) 
VALUES (:firstname, :lastname, :email, :password);

/* SKAPA INLÄGG */
INSERT INTO posts (title, body, category, tag)
VALUES (:title, :body :category, :tag)

/* SÖK INLÄGG */


/* REDIGERA INLÄGG */
ALTER

/* HÄMTA ALLA TITLAR */
SELECT titles FROM posts

/* HÄMTA ALLA INLÄGG */
SELECT * FROM posts 

/* HÄMTA INLÄGG EFTER KATEGORI: frontend, backend, other */
SELECT * FROM posts WHERE category:

/* HÄMTA INLÄGG EFTER TAGG */
SELECT * FROM posts WHERE tag: