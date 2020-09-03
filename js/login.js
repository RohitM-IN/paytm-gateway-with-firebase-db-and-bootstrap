var auth = firebase.auth();



onauthchange();



const login = document.querySelector('#login');
login.addEventListener('submit', (e) => {
    e.preventDefault();
    const email = login['email'].value;
    const password = login['password'].value;

    auth.signInWithEmailAndPassword(email, password).then(cred => {
        console.log(cred.user)

        login.reset();
        sessionStorage.setItem("email", cred.user.email);
        sessionStorage.setItem("token", cred.user.refreshToken);
        sessionStorage.setItem("uid", cred.user.uid);
        window.location = 'dashboard.php'
    })
})

const log_in = document.getElementById("in");
log_in.addEventListener('click', (e) => {
    e.preventDefault();
    onauthchange();
})



function onauthchange() {
    auth.onAuthStateChanged(user => {
        if (user) {
            log_in.className.add = 'd-none'
            out.className.remove = 'd-none'

        }
        if (!user) {
            log_in.className.remove = 'd-none'
            out.className.add = 'd-none'
        }
    })
}