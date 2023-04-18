<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Kaftan :: Scan</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <link rel="stylesheet" href="../../public/css/login.css">
   <link rel="stylesheet" href="../../public/css/app.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js"
      integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="../../public/js/app.js" defer></script>
</head>

<body>
   <div id="app">
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
         <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="/staff">Cool Kaftan</a>
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
         <?php if(isset($_REQUEST['message'])): ?>
         <div class="toast-container position-fixed bottom-0 end-0 p-3 w-100">
            <div id="messageToast" class="toast ms-auto me-auto" role="alert" aria-live="assertive" aria-atomic="true">
               <div class="toast-header border-0">
                  <strong class="me-auto">
                     <?php echo $_REQUEST['message'] ?>
                  </strong>
                  <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
               </div>
            </div>
            <?php endif ?>
      </nav>
      <main class="py-4">
         <div class="container">
            <form action="/staff/scan/submit?scan=<?php echo($_REQUEST['scan']) ?>" method="POST">
               <div class="row justify-content-center">
                  <div class="col-12 col-lg-8">
                     <div class="form-floating mb-3">
                        <select class="form-select" name="box" id="box" aria-label="showing select">
                           <?php foreach($boxes as $box): ?>
                           <option <?php echo(($_REQUEST['box']==$box->id ) ? "selected" : "" ) ?> value="
                              <?php echo $box->id ?>">Box: #
                              <?php echo $box->id ?>
                              <?php echo $box->nickname ?>
                           </option>
                           <?php endforeach ?>
                        </select>
                        <label for="type">Box</label>
                     </div>
                  </div>
                  <div class="col-12 col-lg-8">
                     <?php if($_REQUEST['scan'] == null): ?>
                     <div class="card">
                        <div class="card-body">
                           <div id="reader"></div>
                           <div id="result"></div>
                        </div>
                     </div>
                     <?php else: ?>
                     <div class="card">
                        <div class="card-body">
                           <h2>
                              <?php echo $product->name ?>
                           </h2>
                           <ul class="list-group list-group-flush mb-2">
                              <li class="list-group-item">ID:
                                 <?php echo $product->id ?>
                              </li>
                              <li class="list-group-item">Name:
                                 <?php echo $product->name ?>
                              </li>
                              <li class="list-group-item">Colour:
                                 <?php echo $product->colour ?>
                              </li>
                              <li class="list-group-item">Size:
                                 <?php echo $product->size ?>
                              </li>
                              <li class="list-group-item">Barcode:
                                 <?php echo $product->barcode ?>
                              </li>
                              <li class="list-group-item">Price:
                                 <?php echo $product->price ?>
                              </li>
                              <li class="list-group-item">Created:
                                 <?php echo $product->created_at ?>
                                 -
                                 <?php echo App\Helpers\generalHelper::time_format($product->created_at) ?>
                              </li>
                              <li class="list-group-item">Updated:
                                 <?php echo $product->updated_at ?>
                                 -
                                 <?php echo App\Helpers\generalHelper::time_format($product->updated_at) ?>
                              </li>
                           </ul>
                           <button type="submit" class="btn btn-success d-block w-100">
                              Submit
                           </button>
                        </div>
                     </div>
                     <?php endif; ?>
                  </div>
               </div>
            </form>
         </div>
      </main>
      <script src="../../public/js/reader.js" defer></script>
      <!-- <div id="button_Container" class="d-flex justify-content-center" class="invisible">
         <div id="submit_Button">
            <button class="btn btn-success my-2" id="submit_Button">submit</button>
         </div>
         <div id="clear_Button">
            <button class="btn btn-success my-2" id="clear_Button">clear</button>
         </div>
      </div> -->

      <!-- <script>
         // Copyright fix ;)
         var scan = document.querySelectorAll("a[href='https://scanapp.org']");
         scan[0].innerHTML = "Group 17";
         scan[0].href = location.pathname;
         var report = document.querySelectorAll("a[href='https://github.com/mebjas/html5-qrcode/issues']");
         report[0].innerHTML = "Don't report issues."
         report[0].href = "https://www.youtube.com/watch?v=oHg5SJYRHA0";
      </script>
   </div> -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
         crossorigin="anonymous"></script>

</body>

</html>