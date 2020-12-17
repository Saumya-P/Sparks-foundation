<?php
    session_start();
    require('accountheader.php');
    require('connect.php');

    if (isset($_GET['cust_id'])) {
        $sql0 = "DELETE FROM beneficiary1 WHERE benef_cust_id=".$_GET['cust_id'];
    }

    $success = 0;
    if (($conn->query($sql0) === TRUE)) {
        $sql0 = "SELECT MAX(benef_id) FROM beneficiary1";
        $result = $conn->query($sql0);
        $row = $result->fetch_assoc();

        $id = $row["MAX(benef_id)"] + 1;
        $sql1 = "ALTER TABLE beneficiary1 AUTO_INCREMENT=".$id;

        $conn->query($sql1);
        $success = 1;
    }

    if (isset($_GET['redirect'])) {
        $_SESSION['auto_delete_benef'] = true;
        header("location:beneficiaries.php");
    }
?>
    <div class="flex-container">
            <div class="none" style="margin-top: 150px;">
                <?php
                    if ($success = 1) { ?>
                        <p><?php echo "Beneficiary Deleted Successfully!"; ?></p>
                    <?php
                    }
                    else { ?>
                        <p><?php echo "Error: " . $conn->error . "<br>"; ?></p>
                    <?php
                    }
                ?>
            </div>
        <?php $conn->close(); ?>

        <div style="margin-left: 37%;">
            <a href="beneficiaries.php" class="button">Go Back</a>
        </div>

    </div>

<?php
    require('footer.php');
?>
