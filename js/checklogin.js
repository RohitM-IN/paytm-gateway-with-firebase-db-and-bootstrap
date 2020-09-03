var auth = firebase.auth();
checkauth()

setInterval(2000, checkauth);

function redirect() {
    window.location = 'login.php'
}

function checkauth() {
    auth.onAuthStateChanged(user => {
        if (!user) {
            redirect();
            return false;
        }
        if (user) {
            return true;
        }
    })
}