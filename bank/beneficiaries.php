<?php
    require('accountheader.php');

    $sql0 = "SELECT * FROM beneficiary1";
?>
    <style>
        .main-body-ben{
            display: -webkit-flex;
            display: flex;
            margin-left: 575px;
            margin-top: 2.5%;
            width: auto;
            height: auto;
            padding-top: 20px;
            margin-bottom: 100px;
            flex-direction: column;
            overflow: hidden;
        }
    </style>

    <body class="modal-open summary-sec" style="background: white; overflow:hidden;">
        <div class="search-bar-wrapper col-md-12">
            <div class="search-bar" id="the-search-bar">
                <div class="flex-item-search-bar" id="fi-search-bar">

                    <form class="search_form" style="margin-left: 16%" action="" method="post">
                        <div style="margin-left: 30%" class="flex-item-search">
                            <input name="search" size="30" type="text" placeholder="Search Beneficiaries" />
                        </div>

                        <div style="margin-left: -10%; margin-top: 1%;" class="flex-item-search-button">
                            <button type="submit" name="submit" id="search"></button>
                        </div>

                        <div style="margin-left: 10%; margin-top: 1%;" class="flex-item-by">
                            <label for="by">By: </label>
                        </div>

                        <div style="margin-left: -35%; margin-top: 1%;" class="flex-item-search-by">
                            <select name="by" id="by">
                                <option value="name">Name</option>
                                <option value="acno">AC No</option>
                            </select>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="main-body-ben col-md-6">

        <?php
            $result = $conn->query($sql0);
            $isBenefPresent = 0;
            $back_button = FALSE;

            if ($result->num_rows > 0) {
                $i = 0;
                while($row = $result->fetch_assoc()) {
                    $i++;

                    if (isset($_POST['submit'])) {
                        $back_button = TRUE;
                        $search = $_POST['search'];
                        $by = $_POST['by'];

                        if ($by == "name") {
                            $sql1 = "SELECT cust_id, first_name, last_name, account_no FROM customer
                            WHERE cust_id=".$row["benef_cust_id"]." AND (first_name LIKE '%$search%'
                            OR last_name LIKE '%$search%' OR CONCAT(first_name, ' ', last_name) LIKE '%$search%')";
                        }
                        else {
                            $sql1 = "SELECT cust_id, first_name, last_name, account_no FROM customer
                            WHERE cust_id=".$row["benef_cust_id"]." AND account_no LIKE '$search'";
                        }
                    }
                    else {
                        $sql1 = "SELECT cust_id, first_name, last_name, account_no FROM customer WHERE cust_id=".$row["benef_cust_id"];
                    }

                    $result1 = $conn->query($sql1);
                    if ($result1->num_rows > 0) {
                        $isBenefPresent = 1;
                        $row1 = $result1->fetch_assoc();
        ?>

                        
                            <div style="margin: 0 auto 5px 2.5%;" class="flex-item">
                                <div class="flex-item-1">
                                    <p id="id"><?php echo "&nbsp &nbsp" . $i . "."; ?></p>
                                </div>
                                <div class="flex-item-2">
                                    <p id="name"><?php echo $row1["first_name"] . " " . $row1["last_name"]; ?></p>
                                    <p id="acno"><?php echo "A/C No: " . $row1["account_no"]; ?></p>
                                </div>
                                <div class="flex-item-1">
                                    <div class="dropdown">
                                        <button onclick="dropdown_func(<?php echo $i ?>)" class="dropbtn"></button>
                                        <div id="dropdown<?php echo $i ?>" class="dropdown-content">
                                            <a href="send_funds.php?cust_id=<?php echo $row1["cust_id"] ?>">Send</a>
                                            <a href="delete_beneficiary.php?cust_id=<?php echo $row1["cust_id"] ?>"
                                            onclick="return confirm('Are you sure?')">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        

        <?php 
                    }
                }
            }

            if ($isBenefPresent == 0) { 
        ?>
                </div>

                <div class="none" style="margin: 100px auto auto 45%;">
                    <p> Beneficiaries not found. </p>
                    <a href="beneficiaries.php" style="margin: 10% 30% auto 30%;" class="button">Go Back</a>
                </div>
        <?php }
            
            else if ($back_button) { ?>
                <div class="flex-container-bb">
                    <div class="back_button">
                        <a href="beneficiaries.php" style="margin: auto 20px;" class="button">Go Back</a>
                    </div>
                </div>
    <?php   }
            
            $conn->close(); ?>
            </div>

        <script>
            function dropdown_func(i) {
                var doc_id = "dropdown".concat(i.toString());
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;

                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                    }
                }

                document.getElementById(doc_id).classList.toggle("show");
                return false;
            }

            window.onclick = function(event) {
                if (!event.target.matches('.dropbtn')) {
                    var dropdowns = document.getElementsByClassName("dropdown-content");
                    var i;

                    for (i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
            }

            $(document).ready(function() {
                var curr_scroll;

                $(window).scroll(function () {
                    curr_scroll = $(window).scrollTop();

                    if ($(window).scrollTop() > 120) {
                        $("#the-search-bar").addClass('search-bar-fixed');

                        if ($(window).width() > 855) {
                            $("#fi-search-bar").addClass('fi-search-bar-fixed');
                        }
                    }

                    if ($(window).scrollTop() < 121) {
                        $("#the-search-bar").removeClass('search-bar-fixed');

                        if ($(window).width() > 855) {
                            $("#fi-search-bar").removeClass('fi-search-bar-fixed');
                        }
                    }
                });

                $(window).resize(function () {
                    var class_name = $("#fi-search-bar").attr('class');

                    if ((class_name == "flex-item-search-bar fi-search-bar-fixed") && ($(window).width() < 856)) {
                        $("#fi-search-bar").removeClass('fi-search-bar-fixed');
                    }

                    if ((class_name == "flex-item-search-bar") && ($(window).width() > 855) && (curr_scroll > 120)) {
                        $("#fi-search-bar").addClass('fi-search-bar-fixed');
                    }
                });
            });

        </script>
    </body>

<?php
    require('footer.php');
?>

