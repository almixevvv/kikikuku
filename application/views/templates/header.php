<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="title" content="Kikikuku Official Site." />
    <meta name="description" content="Kikikuku Official Site International" />

    <!-- Technical specification provided with story GUC-433 -->
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta property="og:title" content="Kikikuku Official Site." />
    <meta property="og:description" content="Kikikuku Official Site International" />
    <meta property="og:url" content="kikikuku.com" />

    <?php if (isset($productName)) { ?>
        <title><?php echo $productName; ?> | Kikikuku Official Site</title>
    <?php } else { ?>
        <title><?php echo $sectionName; ?> | Kikikuku Official Site</title>
    <?php } ?>

    <link rel="shortcut icon" href="<?php echo base_url('assets/images/logo2.png'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap-4/css/bootstrap.min.css'); ?>">

    <!-- INCUBE STYLESHEET LOADING -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/incube-assets/incube.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/incube-assets/incube-breakpoint.css'); ?>">

    <!-- FONT AWESOME 5 LOADING -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font-awesome-5/css/all.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font-awesome-5/css/brands.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font-awesome-5/css/fontawesome.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font-awesome-5/css/regular.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font-awesome-5/css/solid.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font-awesome-5/css/v4-shims.min.css'); ?>">

    <!-- SWEETALERT 2 LOADING -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sweet-alert/sweetalert2.min.css'); ?>">

    <!-- WHITE SPACE DEBUG CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/incube-assets/whitespace-debug.css'); ?>"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- <script src="<?php //echo base_url('assets/bootstrap-4/js/bootstrap.js'); 
                        ?>"></script> -->


    <!-- Bootstrap Requirement -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!--     
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 
    -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets/incube-assets/function.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/sweet-alert/sweetalert2.all.min.js'); ?>" type="text/javascript"></script>

    <!-- FIREBASE JS -->
    <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-messaging.js"></script>
</head>

<body>
    <script>
        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyBU7EYAQ3DueJkhkoTDeaSLk0jvw7JZ2QA",
            authDomain: "kikikuku-7369f.firebaseapp.com",
            databaseURL: "https://kikikuku-7369f.firebaseio.com",
            projectId: "kikikuku-7369f",
            storageBucket: "kikikuku-7369f.appspot.com",
            messagingSenderId: "567062640186",
            appId: "1:567062640186:web:5e18009587b6dfe7abe703",
            measurementId: "G-6NNNR0EF02"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();
    </script>