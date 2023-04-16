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
                        <a class="nav-link <?php echo (str_contains($_SERVER['REQUEST_URI'], '/settings?view=site') ? "active text-dark" : "text-dark"
                  )?>" aria-current="page" href="/settings?view=site">Site Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (str_contains($_SERVER['REQUEST_URI'], '/settings?view=about') ? "active text-dark" : "text-dark"
                  )?>" aria-current="page" href="/settings?view=about">Site Information</a>
                    </li>
                </ul>
            </div>
            <?php if($_REQUEST['view'] == ''): ?>
                <div class="col-12 overflow-x-auto">
                Account
                </div>
            <?php endif ?>
            <?php if($_REQUEST['view'] == 'site'): ?>
                <div class="col-12 overflow-x-auto">
                Site
                </div>
            <?php endif ?>
            <?php if($_REQUEST['view'] == 'about'): ?>
                <div class="col-12 overflow-x-auto">
                <pre><?php echo(phpinfo());?></pre>
                </div>
            <?php endif ?>
        </div>
    </div>
</body>