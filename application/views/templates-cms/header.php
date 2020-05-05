<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/logo2.png'); ?>">

  <title>Kikikuku CMS - <?php echo $page; ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/font-awesome-5/css/all.min.css'); ?>" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/css/sb-admin.css'); ?>" rel="stylesheet">

  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url('assets/cms/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('assets/sweet-alert/sweetalert2.min.css'); ?>" />
  <script src="<?php echo base_url('assets/sweet-alert/sweetalert2.min.js'); ?>"></script>

  <!-- FIREBASE JS -->
  <!-- The core Firebase JS SDK is always required and must be listed first -->
  <script src="https://www.gstatic.com/firebasejs/7.8.2/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.8.2/firebase-firestore.js"></script>

  <!-- TODO: Add SDKs for Firebase products that you want to use
        https://firebase.google.com/docs/web/setup#available-libraries -->
  <script src="https://www.gstatic.com/firebasejs/7.8.2/firebase-analytics.js"></script>

</head>
<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyAWpNORIt55E7rbG616FpM2LTq7RG4DPaU",
    authDomain: "kikikuku-268704.firebaseapp.com",
    databaseURL: "https://kikikuku-268704.firebaseio.com",
    projectId: "kikikuku-268704",
    storageBucket: "kikikuku-268704.appspot.com",
    messagingSenderId: "956181121950",
    appId: "1:956181121950:web:d5293a63a2afb6c712a48f",
    measurementId: "G-V8QYETYQDG"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();

  const db = firebase.firestore();
</script>