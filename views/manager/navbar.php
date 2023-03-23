<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Kaftan :: Scan</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
   <link rel="stylesheet" href="../../public/css/login.css">
   <link rel="stylesheet" href="../../public/css/app.css">
   <link rel="stylesheet" href="../../public/css/table.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js"
      integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

   <div id="app">
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
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
                  <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/manager' ? "active" : "")?>" aria-current="page" href="/manager">Long Stock</a>
               </div>
               <div class="navbar-nav">
                  <a class="nav-link <?php echo (str_contains($_SERVER['REQUEST_URI'], 'manager/buffer') ? "active" : "")?>" aria-current="page" href="/manager/buffer">Buffer Stock</a>
               </div>
               <div class="navbar-nav">
                  <a class="nav-link <?php echo (str_contains($_SERVER['REQUEST_URI'], 'manager/mixed') ? "active" : "")?>" aria-current="page" href="/manager/mixed">Mixed Boxes</a>
               </div>
               <div class="navbar-nav">
                  <a class="nav-link <?php echo (str_contains($_SERVER['REQUEST_URI'], 'manager/performance') ? "active" : "")?>" aria-current="page" href="/manager/performance">Performance Tracker</a>
               </div>
               <div class="navbar-nav">
                  <a class="nav-link <?php echo (str_contains($_SERVER['REQUEST_URI'], 'manager/all') ? "active" : "")?>" aria-current="page" href="/manager/all">All Items</a>
               </div>
               <div class="navbar-nav ms-auto">
                  <a class="nav-link" aria-current="page" href="/">Log out</a>
               </div>
            </div>
         </div>
      </nav>
