<?php

    require('accountheader.php');

    $sql0 = "SELECT * FROM customer WHERE cust_id=1";
    $result0 = $conn->query($sql0);
    $row0 = $result0->fetch_assoc();

    $sql1 = "SELECT * FROM passbook1 WHERE trans_id=(SELECT MAX(trans_id) FROM passbook1)";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();

    if ($row1["debit"] == 0) {
        $transaction = $row1["credit"];
        $type = "credit";
    }
    else {
        $transaction = $row1["debit"];
        $type = "debit";
    }

    $time = strtotime($row1["trans_date"]);
    $sanitized_time = date("d/m/Y, g:i A", $time);

    $sql2 = "SELECT COUNT(*) FROM beneficiary1";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
?>

    <section class="modal-open summary-sec" style="background: white; overflow:hidden">
        <div class="summary">
            <div class="summary-text">
                <h2 class="mt-5 col-md-12"> Account Summary </h2>
            </div>

            <div class="summary-table">
                <table class="table table-hover table-bordered" style="width: 575px;">
                    <tr>
                        <td> A/C Holder: <?php echo $row0["first_name"]." ".$row0["last_name"]; ?> </td>
                    </tr> 
                    <tr>
                        <td> A/C No: <?php echo $row0["account_no"]; ?> </td>
                    </tr>      
                    <tr>
                        <td> Balance (INR): <?php echo number_format($row1["balance"]); ?>/- </td>
                    </tr>
                    <tr>
                        <td> You have <?php echo $row2["COUNT(*)"]; ?> beneficiaries. </td>
                    </tr>
                    <tr>
                        <td> Last transaction (<?php echo $type; ?>): Rs. <?php echo number_format($transaction); ?><br/>
                        Dated: <?php echo $sanitized_time; ?><br/>
                        <?php echo $row1["remarks"]; ?>. </td>
                    </tr>
                </table>
            </div>
        </div>    
    </section>

<?php
    require('footer.php')
?>