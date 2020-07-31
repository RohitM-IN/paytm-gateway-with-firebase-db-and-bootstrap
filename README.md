# Paytm Payment Gateway with Firebase as DB

## Steps to use 

-  Add config in `config_paytm.php` in `lib` folder
-  Add config of firestore in `firestore.js` in `js` folder 
-  Edit 37 line in pgRedirect.php and replace it to ur call back url ie http://domain.com/.../pgResponse.php where your paytm response.php is <br/>example suppose you are sending data from list.php and inside that folder u cloned this git and renamed the folder to paytm then your call back url will be http://domain.com/paytm/pgResponse.php
-  Start your apache and ...
-  Vola your own paytm payment gateway is ready !!!!
