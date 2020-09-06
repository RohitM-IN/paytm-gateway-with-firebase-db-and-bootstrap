var auth = firebase.auth();

const login = document.querySelector('#login');
const errorelement = document.getElementById('error');
const successelement = document.getElementById('Success');
const timespan = document.getElementById('timespan');
login.addEventListener('submit', (e) => {
    e.preventDefault();
    const email = login['email'].value;
    const password = login['password'].value;

    auth.signInWithEmailAndPassword(email, password).then(cred => {
        console.log(cred.user)
        successelement.innerHTML = "Login Success Redirecting in ...";
        var countDownDate = new Date();
        countDownDate.setSeconds(countDownDate.getSeconds() + 3);
        var x = setInterval(function () {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            successelement.innerHTML = "Login Success Redirecting in " + seconds + "s ";
            if (distance < 0) {
                clearInterval(x);
                timespan.innerHTML = "Redirecting..";
            }
        }, 1000);
        login.reset();
        sessionStorage.setItem("email", cred.user.email);
        sessionStorage.setItem("token", cred.user.refreshToken);
        sessionStorage.setItem("uid", cred.user.uid);
        setTimeout(function () {
            window.location = 'dashboard.php'
        }, 2000);

    }).catch(function (err) {
        errorelement.innerHTML = err.message
        setTimeout(function () {
            errorelement.innerHTML = "";
        }, 3000);
    })
})