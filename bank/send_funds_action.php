<?php
    require('accountheader.php');
    require('validatebenef.php');

    $err_no = -1;

    if (isset($_GET['cust_id'])) {
        $receiver_id = $_GET['cust_id'];
    }

    $sender_id = 1;
    $amt = mysqli_real_escape_string($conn, $_POST["amt"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $sql0 = "SELECT * FROM customer WHERE cust_id=".$sender_id." AND pwd='".$password."'";
    $result0 = $conn->query($sql0);
    $row0 = $result0->fetch_assoc();

    $sql5 = "SELECT * FROM customer WHERE cust_id=".$receiver_id;
    $result5 = $conn->query($sql5);
    $row5 = $result5->fetch_assoc();

    if (($result0->num_rows) > 0) {
        $sql1 = "SELECT balance FROM passbook1 ORDER BY trans_id DESC LIMIT 1";
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch_assoc();
        $sender_balance = $row1["balance"];

        $updated_sender_balance = $sender_balance - $amt;
        if($updated_sender_balance >= 0) {
            $sql2 = "SELECT balance FROM passbook".$receiver_id." ORDER BY trans_id DESC LIMIT 1";
            $result2 = $conn->query($sql2);
            $row2 = $result2->fetch_assoc();
            $receiver_balance = $row2["balance"];

            $updated_receiver_balance = $receiver_balance + $amt;

            $sql3 = "INSERT INTO passbook".$sender_id." VALUES(
                        NULL,
                        NOW(),
                        'Sent to: ".$row5["first_name"]." ".$row5["last_name"].", A/C No: ".$row5["account_no"]."',
                        '$amt',
                        '0',
                        '$updated_sender_balance'
                    )";

            $sql4 = "INSERT INTO passbook".$receiver_id." VALUES(
                        NULL,
                        NOW(),
                        'Received from: ".$row0["first_name"]." ".$row0["last_name"].", A/C No: ".$row0["account_no"]."',
                        '0',
                        '$amt',
                        '$updated_receiver_balance'
                    )";

            if (($conn->query($sql3) === TRUE) && ($conn->query($sql4) === TRUE)) {
                $err_no = 0;
            }
        }
        else {
            $err_no = 1;
        }
    }
    else {
        $err_no = 2;
    }
?>
<style>
    .fund-container {
        display: -webkit-flex;
        display: flex;
        padding-top: 20px;
        flex-direction: column;
        margin: 250px auto auto 700px;
        height: 200px;
        width: 450px;
    }

    .fund-item {
        display: -webkit-flex;
        display: flex;
        flex-direction: row;
        width: auto;
        height: auto;
        background-color: #8aa9a9;
        border-radius: 3px;
        font-size: 36px;
        box-shadow: 0px 2px 2px #888888;
    }

    .fund-item> p{
        text-align: center;
        width: 450px;
    }
</style>

<section class="fund-c">
    <div class="fund-container">
        <div class="fund-item">
            <?php
            if ($err_no == -1) { ?>
                <p id="info"><?php echo "Connection Error!\n"; ?></p>
            <?php } ?>

            <?php
            if ($err_no == 0) { ?>
                <p id="info"><?php echo "Transfer Successful!\n"; ?></p>
            <?php } ?>

            <?php
            if ($err_no == 1) { ?>
                <p id="info"><?php echo "Insufficient Funds.\n"; ?></p>
            <?php } ?>

            <?php
            if ($err_no == 2) { ?>
                <p id="info"><?php echo "Error! Please try again.\n"; ?></p>
            <?php } ?>
        </div>

        <div style="margin: auto auto 0 35%;" class="fund-item">
            <a href="beneficiaries.php" class="button">Go Back</a>
        </div>
    </div>
</section>

<?php
    require('footer.php');
?>
