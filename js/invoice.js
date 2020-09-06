function generatePDF() {

    const element = document.getElementById("invoice");
    // Choose the element and save the PDF for our user.
    html2pdf()
        .set({
            html2canvas: {
                scale: 4
            },
            jsPDF: {
                format: 'a4',
                orientation: 'portrait'
            }
        })
        .from(element)
        .save("invoice.pdf");
}

function printContent() {
    var restorepage = $('body').html();
    var printcontent = $('#invoice').clone();
    $('body').empty().html(printcontent);
    window.print();
    $('body').html(restorepage);
}

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

// var item1 = getParameterByName("item1");
// var item2 = getParameterByName("item2");

// window.addEventListener('load', (event) => {
//     docid("item1", parseFloat(item1).toFixed(2))
//     docid("item2", parseFloat(item2).toFixed(2))
//     docid("total_sub", subtotal(item1, item2))
//     docid("total_interest", tax(item1, item2))
//     docid("total", sum(item1, item2))
//     docid("date", moment().format('MMMM Do YYYY, h:mm:ss a'))

// });

// function docid(id, text) {
//     document.getElementById(id).innerHTML = text;
//     return true;
// }

// function sum(a, b) {
//     a = parseFloat(a)
//     b = parseFloat(b)
//     let c = a + b
//     return c.toFixed(2)
// }

// function tax(x, y) {
//     let z = sum(x, y)
//     let gst = 18 / 100
//     let taxresult = z * gst
//     return taxresult.toFixed(2)
// }

// function subtotal(m, n) {
//     p = sum(m, n)
//     let o = tax(m, n);
//     let subresult = p - o
//     return subresult.toFixed(2)
// }


// function returnnum(num) {
//     return parseFloat(num);
// }

function invoiceredirect() {
    document.f1.action = "invoice.php"
    document.f1.target = "_blank";
    document.f1.submit();
    return true;
}