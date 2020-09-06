var auth = firebase.auth();


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
            console.log('logged in !!')
            $("in").css("display", 'none');
            document.getElementById('in').style.display = 'none';
            document.getElementById('up').style.display = 'none';
            document.getElementById('out').style.display = 'block';
            return true;
        }
    })
}
$(document).ready(function () {
    checkauth();
})