<?php 
        include_once("manager/components/navbar.php");
        // var_dump($results);
?>

<body>
    <div class="container">
        <div class="row mw-100 ms-0 row-gap-3 mt-3">
            <div class="col-12 col-md-12">
            <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link <?php echo (($_SERVER['REQUEST_URI'] == '/settings') ? "active text-dark" : "text-dark"
                  )?>" aria-current="page" href="/settings">Manage Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (str_contains($_SERVER['REQUEST_URI'], '/settings?view=about') ? "active text-dark" : "text-dark"
                  )?>" aria-current="page" href="/settings?view=about">Site Information</a>
                    </li>
                </ul>
            </div>
            <?php if($_REQUEST['view'] == ''): ?>
                <div class="col-6 overflow-x-auto">
                <div class="card">
              <div class="card-body">
                <form method="POST" action="/manager/edit/account">
                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control" id="username" placeholder="username" required>
                    <label for="prodName">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control" id="username" placeholder="username" required>
                    <label for="prodName">Email</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="datetime-local" name="last_email" class="form-control" id="last_email"
                        placeholder="last_email"
                        value="<?php echo(App\Helpers\authenticationHelper::getUser()->last_email) ?>" required=""
                        control-id="ControlID-3">
                    <label for="colour">Last Email</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="threshold" class="form-control" id="threshold" placeholder="threshold"
                        required="" value="<?php echo(App\Helpers\authenticationHelper::getUser()->email_threshold) ?>"
                        control-id="ControlID-2">
                    <label for="threshold">Email Threshold</label>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="password_opt_checkbox">
                    <label class="form-check-label" for="remember">
                        Change Password
                    </label>
                </div>
 
                <div class="card mb-3" id="password_opt" style="display:none;">
                    <div class="card-body">
                    <div class="form-floating mb-3">
                    <input type="password" name="new_password" class="form-control" id="new_password" placeholder="new password" required>
                    <label for="new_password">Password</label>
                </div>

                <div class="form-floating">
                    <input type="password" name="new_password_confirm" class="form-control" id="new_password_confirm" placeholder="new_password_confirm" required>
                    <label for="new_password_confirm">Confirm Password</label>
                </div>
                    </div>
                </div>

                  <div class="row mb-0">
                    <div class="col-md-8 ">
                      <button type="submit" name="submit" class="btn btn-primary">
                        Save Changes
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
                </div>
            <?php endif ?>
            <?php if($_REQUEST['view'] == 'about'): ?>
                <div class="col-12 overflow-x-auto">
                <pre><?php echo(phpinfo());?></pre>
                </div>
            <?php endif ?>
        </div>
    </div>
    <script>
        const checkbox = document.querySelector('#password_opt_checkbox');
const myDiv = document.querySelector('#password_opt');

checkbox.addEventListener('change', (event) => {
  if (event.target.checked) {
    myDiv.style.display = 'block';
  } else {
    myDiv.style.display = 'none';
  }
});
    </script>
</body>
