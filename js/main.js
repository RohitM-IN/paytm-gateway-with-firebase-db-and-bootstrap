//Mobile Number = Customer ID (Value Clone)
document.getElementById("MOBILE_NUMBER").addEventListener("change",function(){
    document.getElementById("CUST_ID").value = document.getElementById("MOBILE_NUMBER").value;
})
bootstrapValidate("#DONOR_NAME", "required:Please fill out this field", function (isValid) {
    var element = document.getElementById("DONOR_NAME_valid");
    var main = document.getElementById("DONOR_NAME");
    if (isValid) {
        element.classList.remove("d-none");
        main.classList.remove("is-invalid");
        element.classList.add("d-block");
        main.classList.add("is-valid");
    }
    else {
        element.classList.remove("d-block");
        main.classList.remove("is-valid");
        element.classList.add("d-none");
        main.classList.add("is-invalid");
    }

});
bootstrapValidate("#MOBILE_NUMBER","integer:Please provide a valid Phone Number ",function (isValid) {
    var element = document.getElementById("MOBILE_NUMBER_VALID");
    var main = document.getElementById("MOBILE_NUMBER");
    if (isValid) {
        element.classList.remove("d-none");
        main.classList.remove("is-invalid");
        element.classList.add("d-block");
        main.classList.add("is-valid");
    }
    else {
        element.classList.remove("d-block");
        main.classList.remove("is-valid");
        element.classList.add("d-none");
        main.classList.add("is-invalid");
    }
})
bootstrapValidate("#EMAIL_ID","email:Please provide a valid Email Adderss",function (isValid) {
    var element = document.getElementById("EMAIL_ID_VALID");
    var main = document.getElementById("EMAIL_ID");
    if (isValid) {
        element.classList.remove("d-none");
        main.classList.remove("is-invalid");
        element.classList.add("d-block");
        main.classList.add("is-valid");
    }
    else {
        element.classList.remove("d-block");
        main.classList.remove("is-valid");
        element.classList.add("d-none");
        main.classList.add("is-invalid");
    }
});
bootstrapValidate("#TXN_AMOUNT","integer:Please provide a valid Amount");
