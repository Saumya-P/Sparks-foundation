<?php
    
    session_start();
    require('accountheader.php');
    require('connect.php');

    $_SESSION['auto_delete_benef'] = false;
?>
    <div class="del-body modal-open" style="background: white; overflow:hidden">
        <div class="del-text col-md-12">
            <p> 
                <b style="font-size: 40px;"> Beneficiaries have been deleted. </b>
            </p>
            <img style="margin-left:50%" src="img/trash.svg">
            <p>
                <br/>On changing Personally Identifiable Information such as the account number, email-id or phone number of your beneficiaries, 
                they get deleted from your account. <br/><br/>
                Please add them again to ensure every account's security. <br/>
            </p>
            <div class="del-back">
                <a href="beneficiaries.php" class="button"> Transfer Funds</a>
            </div>
        </div>

        <?php $conn->close(); ?>
    </div>

<?php
    require('footer.php');
?>
