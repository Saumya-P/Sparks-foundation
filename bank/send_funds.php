<?php
    require('accountheader.php');

    if (isset($_GET['cust_id'])) {
        $id = $_GET['cust_id'];
    }

    $sql0 = "SELECT * FROM customer WHERE cust_id=".$id;
    $result0 = $conn->query($sql0);
    $row0 = $result0->fetch_assoc();
?>
    <section class="trans-body">
        <form class="fund-form" action="send_funds_action.php?cust_id=<?php echo $id ?>"  method="POST">
            <ul style="text-align: center; width: 800px;">
                <li style="margin-left: 60px;">
                    <p> To: <?php echo $row0["first_name"]." ".$row0["last_name"] ?> </p>
                    <p> A/C No: <?php echo $row0["account_no"] ?> </p>
                </li>
                    
                <li>
                    <p style="margin-left: 7px;">
                        Enter Amount (INR): <input style="margin-top: -10px; margin-left: 20px;" type="text" name="amt" class="field-style field-split align-right" placeholder="Amount" />
                    </p>

                    <p style="margin-left: 10px;">
                        Enter your password: <input style="margin-top: 0; width: 200px; margin-right: -222.5px;" type="password" name="password" class="field-style field-split align-right" placeholder="Password" />
                    </p>
                </li>

                <li style="margin-top: 50px; padding: 10px;" class="btn-group">
                    <a class="button field-style field-split" style="margin-left: -10px;" href="beneficiaries.php">Back</a>
                    <button class="button field-style field-split"  type="submit"> Send </button>
                    <button type="reset" class="reset button field-style field-split" onclick="return confirmReset();">Reset</button>
                </li>
            </ul>
        </form>
    </section>

    <script>
    function confirmReset() {
        return confirm('Are you sure you want to reset?')
    }
    </script>

<?php
    require('footer.php');
?>
