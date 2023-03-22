<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Kaftan :: Scan</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <link rel="stylesheet" href="../../css/login.css">
   <link rel="stylesheet" href="../../css/app.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js"
      integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
   <div id="app">
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
         <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">Cool Kaftan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#content"
               aria-controls="content" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="content">
               <div class="navbar-nav">
                  <a class="nav-link" aria-current="page" href="/logout">Log out</a>
               </div>
            </div>
         </div>
      </nav>
      <main class="py-4">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-12 col-lg-6">
                  <div class="card">
                     <div class="card-body">
                        <div id="reader"></div>
                        <div id="result"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </main>
      <script src = "../../js/reader.js"></script>
      <div id="submit_Button">
         <button class="btn btn-success my-2">submit</button>
      </div>
      <div id="clear_Button">
         <button class="btn btn-success my-2">clear</button>
      </div>
      <script>
         // Copyright fix ;)
         var scan = document.querySelectorAll("a[href='https://scanapp.org']");
         scan[0].innerHTML = "Group 17";
         scan[0].href = location.pathname;
         var report = document.querySelectorAll("a[href='https://github.com/mebjas/html5-qrcode/issues']");
         report[0].innerHTML = "Don't report issues."
         report[0].href = "https://www.youtube.com/watch?v=oHg5SJYRHA0";
      </script>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"></script>

</body>

</html>