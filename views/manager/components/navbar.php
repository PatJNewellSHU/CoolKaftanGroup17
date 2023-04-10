<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Kaftan :: Manager</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
   <link rel="stylesheet" href="../../public/css/login.css">
   <link rel="stylesheet" href="../../public/css/app.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js"
      integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"
      defer></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
   <script src="../../public/js/app.js" defer></script>
</head>

<div id="app">
   <nav class="navbar navbar-expand-lg mt-2">
      <div class="container-fluid">
         <a class="navbar-brand" href="#">
            <img src="../../public/images/kaftan_logo.png" alt="Kaftan" class="w-100" height="30">
         </a>

         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#content"
            aria-controls="content" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="content">
            <div class="navbar-nav">
               <a class="nav-link<?php echo (str_contains($_SERVER['REQUEST_URI'], 'manager/boxes') ? " active" : ""
                  )?>"
                  aria-current="page" href="/manager/boxes"><i class="bi bi-box-fill"></i> Boxes</a>
            </div>
            <div class="navbar-nav">
               <a class="nav-link <?php echo (str_contains($_SERVER['REQUEST_URI'], 'manager/stock') ? " active" : ""
                  )?>" aria-current="page" href="/manager/stock"><i class="bi bi-stack-overflow"></i> Stock</a>
            </div>
            <div class="navbar-nav">
               <a class="nav-link <?php echo (str_contains($_SERVER['REQUEST_URI'], 'manager/product') ? " active" : "" )?>"
                  aria-current="page" href="/manager/products"><i class="bi bi-tag-fill"></i> Products</a>
            </div>
            <div class="navbar-nav">
               <a class="nav-link <?php echo (str_contains($_SERVER['REQUEST_URI'], 'manager/performance') ? " active"
                  : "" )?>" aria-current="page" href="/manager/performance"><i class="bi bi-bar-chart-steps"></i> Performance</a>
            </div>
            <div class='navbar-nav ms-auto'>
               <a class='nav-link <?php echo (str_contains($_SERVER['REQUEST_URI'], 'settings') ? " active" : ""
                  )?>' aria-current='page' href='/settings'><i class="bi bi-sliders"></i> Settings</a>
            </div>
            <div class='navbar-nav '>
               <a class='nav-link' aria-current='page' href='/logout'><i class="bi bi-box-arrow-right"></i> Log out</a>
            </div>

         </div>
      </div>
   </nav>
   <?php if(isset($_REQUEST['message'])): ?>
   <div class="toast-container position-fixed bottom-0 end-0 p-3 w-100">
    <div id="messageToast" class="toast ms-auto me-auto" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header border-0">
         <strong class="me-auto"><?php echo $_REQUEST['message'] ?></strong>
         <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
   </div>
   <?php endif ?>
</div>