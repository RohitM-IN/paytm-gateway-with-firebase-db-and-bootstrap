var messagesRef = db.collection("Donations")
let del = false;
let snapshot = messagesRef.get().then(snapshots =>
    snapshots.forEach(doc => {
        let docdata = doc.data()
        if (!docdata.Payment_Date) docdata.Payment_Date = "-"
        if (docdata.Donor_Name == "") docdata.Donor_Name = "-"
        if (docdata.Email_ID == "") docdata.Email_ID = "-"
        if (docdata.Donation_Amount == "") docdata.Donation_Amount = "-"
        if (docdata.Payment_Status == 'TXN_SUCCESS') docdata.Payment_Status = 'Success'
        else if (docdata.Payment_Status == 'TXN_FAILURE') docdata.Payment_Status = 'Failed'
        else if (docdata.Payment_Status == '') docdata.Payment_Status = '-'
        if (docdata.Donation_Amount != '-') docdata.Donation_Amount = parseFloat(docdata.Donation_Amount).toFixed(2)
        console.log(doc.id, "=>", doc.data())
        let cell = `<tr></tr><td>${doc.id}</td> <td>${docdata.Donor_Name}</td><td>${docdata.Email_ID}</td><td>${docdata.Payment_Date}</td><td>${docdata.Donation_Amount}</td><td>${docdata.Payment_Status}</td></tr>`
        createcell(cell)
    })
)

function createcell(cell) {
    if (!del) emptytable()
    $("table tbody").append(cell)
    $("table").trigger("update");
}

function emptytable() {
    del = true;
    $("#ipi-table > tbody").empty()
}

/*
{
    "GATEWAYNAME": "SBI",
    "RESPMSG": "Txn Success",
    "Mobile_Number": "9123037267",
    "Email_ID": "tester@test.tk",
    "Payment_Date": "2020-09-02 17:30:32.0",
    "Payment_Status": "TXN_SUCCESS",
    "Anonymous": "NO",
    "Donor_Name": "Demo Gandu",
    "BANKTXNID": "11285791199",
    "RESPCODE": "01",
    "CHECKSUMHASH": "cLMjX+xo3MuD1naR6/SOyV3GAWIBegj1K56X+/6tmfZRzjf01H/vrKVW4m5/Qd6qVJ9BFR8NIKEoDAanTExxjT1e7IoVr+xcLGqmCHe56mM=",
    "TXNID": "20200902111212800110168579101878642",
    "Donation_Amount": "150.00"
}

{
    "Email_ID": "care@gmail.com",
    "Payment_Date": "",
    "Mobile_Number": "9831158072",
    "Donor_Name": "raja",
    "Donation_Amount": "100",
    "Payment_Status": "Pending"
}

*/