<?php 
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kaftan :: Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/login.css">
  <link rel="stylesheet" href="../css/app.css">
</head>

<body>
  <div id="app">
    <nav class="navbar bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand w-100 text-center" href="#">
          <img src="../images/kaftan_logo.png" alt="Logo" class="d-inline-block align-text-top logo">
        </a>
      </div>
    </nav>
    <main class="py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-6">
            <div class="card">
              <div class="card-body">
                <form method="POST" action="#">
                  <div class="row mb-3">
                    <h1 class="col-md-4 col-form-label text-md-end fw-bold">Welcome Back</h1>
                  </div>
                  <div class="row mb-3">
                    <label for="username" class="col-md-4 col-form-label text-md-end">Username</label>
                    <div class="col-md-6">
                      <input id="username" type="text" class="form-control" name="username" value="" required
                        autocomplete="email" autofocus>
                      <!-- <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span> -->
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                    <div class="col-md-6">
                      <input id="password" type="password" class="form-control" name="password" required
                        autocomplete="current-password">

                      <!-- <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span> -->
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-md-6 offset-md-4">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">
                          Remember Me
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                      <button type="submit" class="btn btn-primary">
                        Login
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</body>

</html>