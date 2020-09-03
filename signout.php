<!DOCTYPE html>
<html>

<head>
    <script src="https://www.gstatic.com/firebasejs/7.17.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.17.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.17.0/firebase-firestore.js"></script>
    <script src="js/db.js"></script>
    <script>
    var auth = firebase.auth();
    auth.signOut().then(() => {
        window.location = 'login.php'
    })
    </script>
</head>

</html>