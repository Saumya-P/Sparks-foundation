<!Doctype HTML>
<html lang="en" class="h-100">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title> Public Bank </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
       
        <link rel="icon" href="img/bank.png">
        <link rel="stylesheet" href="https://cdn.statically.io/gh/shahednasser/sbuttons/c135f5f7/dist/sbuttons.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
 
    
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="accountstyle.css">
    </head>

    <body class="d-flex flex-column" style="z-index: 100;">
        <header>
            <nav class="navbar navbar-expand-md fixed-top" style="background-color:#0D4F8B;">
                <a href='home.php' class='navbar-brand'>
                    <img src='img/bank.png' alt='Public Logo' class='logo'>
                </a>	
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class='collapse navbar-collapse' id='mynavbar'>
                    <ul class='nav navbar-nav navbar-dark ml-auto'>
                        <li> <a class="nav-link" href="home.php"> Home </a> </li>
                        <li> <a class="nav-link" href="about.php"> About Us </a> </li>
                        <li> <a class="nav-link" href="dashboard.php"> Dashboard </a> </li>
                        <li> <a class="nav-link" href="careers.php"> Careers </a> </li>
                        <li> <a class="nav-link" href="contact.php"> Contact Us </a> </li>
                        <li> <a class="nav-link" href="creator.php"> Creator </a> </li>
                    </ul>
                </div>
            </nav>
        </header>

        <div class="container-fluid">
        <div class="row">

            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="sidebar-sticky pt-3">
                <ul style="margin-top: 50px;" class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="dashboard.php">
                    <span><img style="padding-right: 5px;" src="img/dashboard.svg"></span>
                    DASHBOARD
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="transactions.php">
                    <span><img style="padding-right: 5px;" src="img/transactions.svg"></span>
                    My Transactions
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="beneficiaries.php">
                    <span><img style="padding-right: 5px;" src="img/users.svg"></span>
                    Manage Beneficiaries
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="summary.php">
                    <span><img style="padding-right: 5px;" src="img/summary.svg"></span>
                    Account Summary
                    </a>
                </ul>
            </div>
            </nav>

<?php include('connect.php'); ?>