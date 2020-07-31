# Paytm Payment Gateway with Firebase as DB

## Steps to use 

-  Add config in `config_paytm.php` in `lib` folder
-  Add config of firestore in `firestore.js` in `js` folder 
-  Edit 37 line in pgRedirect.php and replace it to ur call back url ie http://yourdomain.com/.../pgResponse.php . <br/>example suppose you are sending data from list.php and inside that folder u cloned this git and renamed the folder to paytm then your call back url will be http://yourdomain.com/paytm/pgResponse.php <br/>A full url is required since that page is paytm processing domain not ur websites domain 
-  Start your apache and ...
-  Vola your own paytm payment gateway is ready !!!!
