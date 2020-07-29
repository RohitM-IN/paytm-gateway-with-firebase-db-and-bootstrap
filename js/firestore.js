// Initialize Cloud Firestore through Firebase
// Your web app"s Firebase configuration

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
    let ORDERID = document.getElementById("ORDERID").value;
    let DONORNAME = document.getElementById("NAME").value ;
    let MOBILENUMBER = document.getElementById("CUST_ID").value;
    let EMAILID = document.getElementById("Email_ID").value ;
    let Amount = document.getElementById("TXNAMOUNT").value ;
    let TXNDATE = document.getElementById("TXNDATE").value ;
    let STATUS = document.getElementById("STATUS").value ;
    let RESPMSG = document.getElementById("RESPMSG").value ;
    let RESPCODE = document.getElementById("RESPCODE").value ;
    let GATEWAYNAME = document.getElementById("GATEWAYNAME").value ;
    let BANKTXNID = document.getElementById("BANKTXNID").value ;
    let TXNID = document.getElementById("TXNID").value ;
    let CHECKSUMHASH = document.getElementById("CHECKSUMHASH").value ;
    let Anonymous = document.getElementById("Anonymous").value ;

    var messagesRef = db.collection("Donations").doc(ORDERID);
    // Add data
    var data = {
        Donor_Name: DONORNAME,
        Mobile_Number: MOBILENUMBER,
        Email_ID: EMAILID,
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
    }
    messagesRef.set(data)
    .then(function() {
        
    })
    .catch(function(error) {
        console.error("Error adding document: ", error);
    });
}