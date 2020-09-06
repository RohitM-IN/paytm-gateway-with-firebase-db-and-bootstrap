<?php 
include_once("./lib/cookie_aleart.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Orders - Admin</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="css/Data-Table-with-Search-Sort-Filter-and-Zoom-using-TableSorter.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

    <script src="js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="js/Data-Table-with-Search-Sort-Filter-and-Zoom-using-TableSorter.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.17.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.17.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.17.0/firebase-firestore.js"></script>
    <script src="js/db.js"></script>
    <script src="js/checklogin.js"></script>

</head>

<body>
    <?php include('./modules/header_default.php') ?>
    <script src="js/table.js"></script>
    <h2>Orders</h2>
    <div class="container content">
        <div class="card" id="TableSorterCard">
            <div class="row table-topper align-items-center">
                <div class="col-4 text-left" style="margin: 0px;padding: 5px 15px;"><button
                        class="btn btn-primary btn-sm reset" type="button" style="padding: 5px;margin: 2px;">Reset
                        Filters</button><button class="btn btn-warning btn-sm" id="zoom_in" type="button"
                        zoomclick="ChangeZoomLevel(-10);" style="padding: 5px;margin: 2px;"><i
                            class="fa fa-search-plus"></i></button>
                    <button class="btn btn-warning btn-sm" id="zoom_out" type="button" zoomclick="ChangeZoomLevel(-10);"
                        style="padding: 5px;margin: 2px;"><i class="fa fa-search-minus"></i></button>
                </div>
                <div class="col-4 text-center" style="margin: 0px;padding: 5px 10px;">
                    <h6 id="counter">Showing: <strong id="rowCount">ALL</strong>&nbsp;Row(s)</h6>
                </div>
                <div class="col-4 text-right" style="margin: 0px;padding: 5px 10px;"><a href="#" data-toggle="modal"
                        data-target="#tablehelpModal"><i class="fa fa-question-circle" data-toggle="tooltip"
                            data-placement="top" title="Custom Sort Details" aria-hidden="true"
                            style="padding: 5px 15px;margin: 2px;"></i></a></div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div>
                        <table class="table table tablesorter" id="ipi-table">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="width:10%">Order ID</th>
                                    <th style="width:15%">Name</th>
                                    <th style="width:20%">Email ID</th>
                                    <th style="width:15%">Date</th>
                                    <th style="width:5%">Amount</th>
                                    <th style="width:10%">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></td>
                                    <td><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></td>
                                    <td><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></td>
                                    <td><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></td>
                                    <td><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></td>
                                    <td><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal fade" role="dialog" tabindex="-1" id="tablehelpModal" aria-labeledby="tablehelpModal"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Table Filtering Options</h4><button type="button" class="close"
                                data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="width:1%">Priority</th>
                                            <th style="width:9%">Operator</th>
                                            <th style="width:30%">Description</th>
                                            <th style="width:60%">Examples</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><code>|</code>&nbsp;or&nbsp;&nbsp;<code>OR</code><br></td>
                                            <td>Logical "or" (Vertical bar). Filter the column for content that matches
                                                text from either side of the bar.<br></td>
                                            <td><code>&lt;20 | &gt;40</code>&nbsp;(matches a column cell with either
                                                "&lt;20" or "&gt;40")<br></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><code>&amp;&amp;</code>&nbsp;or <code>AND</code><br></td>
                                            <td>Logical "and". Filter the column for content that matches text from
                                                either side of the operator.<br></td>
                                            <td><code>&gt;20 &amp;&amp; &gt;40</code>&nbsp;(matches a column cell that
                                                contains both "&gt;20" and "&lt;40")<br></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><code>/\d/</code><br></td>
                                            <td>Add any regex to the query to use in the query ("mig" flags can be
                                                included&nbsp;<code>/\w/mig</code>)<br></td>
                                            <td><code>/b[aeiou]g/i</code>&nbsp;(finds "bag", "beg", "BIG", "Bug",
                                                etc);<code>&gt;/r$/</code>&nbsp;(matches text that ends with an "r")<br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td><code>&lt; &lt;= &gt;= &gt;</code><br></td>
                                            <td>Find alphabetical or numerical values less than or greater than or equal
                                                to the filtered query .<br></td>
                                            <td><code>&lt;=10</code>&nbsp;(find values greater than or equal to 10)<br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td><code>!</code>&nbsp;or&nbsp;<code>!=</code><br></td>
                                            <td>Not operator, or not exactly match. Filter the column with content
                                                that&nbsp;<strong>do not</strong>&nbsp;match the query. Include an equal
                                                (<code>=</code>), single (<code>'</code>) or double quote
                                                (<code>"</code>)
                                                to exactly&nbsp;<em>not</em>&nbsp;match a filter.<br><br><br></td>
                                            <td><code>!e</code>&nbsp;(find text that doesn't contain an
                                                "e");<code>!"ELISA"</code>&nbsp;(find content that does not exactly
                                                match "ELISA")<br></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td><code>"</code>&nbsp;or&nbsp;<code>=</code><br></td>
                                            <td>To exactly match the search query, add a quote, apostrophe or equal sign
                                                to the beginning and/or end of the query<br></td>
                                            <td><code>abc"</code>&nbsp;or&nbsp;<code>abc=</code>&nbsp;(exactly match
                                                "abc")<br></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td><code>-</code>&nbsp;or <code>to</code><br></td>
                                            <td>Find a range of values. Make sure there is a space before and after the
                                                dash (or the word "to").<br></td>
                                            <td><code>10 - 30</code>&nbsp;or&nbsp;<code>10 to 30</code>&nbsp;(match
                                                values between 10 and 30)<br></td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td><code>?</code><br></td>
                                            <td>Wildcard for a single, non-space character.<br></td>
                                            <td><code>S?c</code>&nbsp;(finds "Sec" and "Soc", but not "Seec")<br></td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td><code>*</code><br></td>
                                            <td>Wildcard for zero or more non-space characters.<br></td>
                                            <td><code>B*k</code>&nbsp;(matches "Black" and "Book")<br></td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td><code>~</code><br></td>
                                            <td>Perform a fuzzy search (matches sequential characters) by adding a tilde
                                                to the beginning of the query<br></td>
                                            <td><code>~bee</code>&nbsp;(matches "Bruce Lee" and "Brenda Dexter"),
                                                or&nbsp;<code>~piano</code>&nbsp;(matches "Philip Aaron Wong")<br></td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>text<br></td>
                                            <td>Any text entered in the filter
                                                will&nbsp;<strong>match</strong>&nbsp;text found within the column<br>
                                            </td>
                                            <td><code>abc</code>&nbsp;(finds "abc", "abcd", "abcde",
                                                etc);<code>SEC</code>&nbsp;(finds "SEC" and "Analytical SEC")<br></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer"><button class="btn btn-danger" type="button"
                                data-dismiss="modal">Close</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('./modules/footer.php') ?>
</body>

</html>