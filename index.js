// BUTTONS
const logOutButton = document.getElementsByClassName('logout');
const save = document.getElementsByClassName('save');


// Log out 
function logOut() {
    console.log('Logga ut');
}

// Save post
function savePost() {
    console.log('Spara');
}

logOutButton.addEventListener('click', logOut);
save.addEventListener('click', savePost);