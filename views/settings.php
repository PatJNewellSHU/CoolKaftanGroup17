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
                </ul>
            </div>
            <div class="col-12 overflow-x-auto">
                a
            </div>
        </div>
    </div>
</body>