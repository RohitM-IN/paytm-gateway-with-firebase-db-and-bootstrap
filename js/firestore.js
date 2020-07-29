// Initialize Cloud Firestore through Firebase
// Your web app's Firebase configuration

var firebaseConfig = {
    apiKey: "",
    authDomain: "",
    databaseURL: "",
    projectId: "",
    storageBucket: "",
    messagingSenderId: "",
    appId: "",
    measurementId: ""
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);
firebase.analytics();


var db = firebase.firestore();

// Submit form
function submitForm(){

    // Custom Values
    let ORDER_ID = document.getElementById('ORDERID').value;
    let DONOR_NAME = document.getElementById('NAME').value ;
    let MOBILE_NUMBER = document.getElementById('CUST_ID').value;
    let EMAIL_ID = document.getElementById('Email_ID').value ;
    let Amount = document.getElementById('TXNAMOUNT').value ;
    let TXNDATE = document.getElementById('TXNDATE').value ;
    let STATUS = document.getElementById('STATUS').value ;
    let RESPMSG = document.getElementById('RESPMSG').value ;
    let RESPCODE = document.getElementById('RESPCODE').value ;
    let GATEWAYNAME = document.getElementById('GATEWAYNAME').value ;
    let BANKTXNID = document.getElementById('BANKTXNID').value ;
    let TXNID = document.getElementById('TXNID').value ;
    let CHECKSUMHASH = document.getElementById('CHECKSUMHASH').value ;
    let Anonymous = document.getElementById('Anonymous').value ;

    var messagesRef = db.collection("Donations").doc(ORDER_ID)
    // Add data
    messagesRef.set({
        Donor_Name: DONOR_NAME,
        Mobile_Number: MOBILE_NUMBER,
        Email_ID: EMAIL_ID,
        Donation_Amount: Amount,
        Payment_Status: STATUS,
        Payment_Date: TXNDATE,
        RESPMSG:RESPMSG,
        RESPCODE:RESPCODE,
        CHECKSUMHASH:CHECKSUMHASH,
        GATEWAYNAME:GATEWAYNAME,
        BANKTXNID:BANKTXNID,
        TXNID:TXNID,
        Anonymous:Anonymous
    })
    .then(function() {
        console.log("Document written with ID: ", ORDER_ID);
    })
    .catch(function(error) {
        console.error("Error adding document: ", error);
    });
}