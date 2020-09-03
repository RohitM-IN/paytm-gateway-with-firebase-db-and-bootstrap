var auth = firebase.auth();



const login = document.querySelector('#login');
login.addEventListener('submit', (e) => {
    e.preventDefault();
    const email = login['email'].value;
    const password = login['password'].value;

    auth.createUserWithEmailAndPassword(email, password).then(cred => {
        console.log(cred.user)

        login.reset();
        sessionStorage.setItem("email", cred.user.email);
        sessionStorage.setItem("token", cred.user.refreshToken);
        sessionStorage.setItem("uid", cred.user.uid);
        window.location = 'dashboard.php'
    })
})