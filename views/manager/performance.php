<?php 
        include_once("components/navbar.php");
?>

<body>
    <div class="container">
        <div class="row mw-100 ms-0 row-gap-3 mt-3">
            <div class="col-12 col-md-7">
                <h2>Performance</h2>
            </div>
            <div class="col-12 col-md-5 text-end">
                <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#notifications" role="button"
                    aria-controls="offcanvasExample"><i class="bi bi-bell-fill"></i> Notification Settings</a>
                <a class="btn btn-success" data-bs-toggle="offcanvas" href="#addPerformance" role="button"
                    aria-controls="offcanvasExample"><i class="bi bi-database-add"></i> Add Performance</a>
                <a class="btn btn-secondary" data-bs-toggle="offcanvas" href="#filter" role="button"
                    aria-controls="offcanvasExample"><i class="bi bi-filter"></i> Filter</a>
            </div>
            <div class="col-12 overflow-x-auto">
                <table class="table table-hover">
                    <thead class="table-head">
                        <td>#</td>
                        <td>Product</td>
                        <td>Created</td>
                        <td>Updated</td>
                    </thead>
                    <?php
                    foreach ($performance as $v => $perf):                   
                    ?>

                    <!-- Database Item -->
                    <tr data-bs-toggle="modal" data-bs-target="#perf_<?php echo $perf->id ?>">
                        <td>
                            <?php echo $perf->id ?>
                        </td>
                        <td>
                            <?php echo $perf->product_id ?>
                        </td>
                        <td>
                            <?php echo App\Helpers\generalHelper::time_format($perf->created_at) ?>
                        </td>
                        <td>
                            <?php echo App\Helpers\generalHelper::time_format($perf->updated_at) ?>
                        </td>
                    </tr>
                    <div class="modal fade" id="perf_<?php echo $perf->id ?>" tabindex="-1" aria-labelledby="perf_"
                        aria-hidden="true">
                        <form method="POST" action="/manager/edit/performance?performance=<?php echo $perf->id ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="d-block">
                                            <div class="fw-bold">
                                                Editing
                                            </div>
                                            <div class="modal-title fs-5" id="box">
                                                Performance: #
                                                <?php echo number_format($perf->id); ?>
                                            </div>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="form-floating mb-3">
                                            <select class="form-select" name="product" id="product"
                                                aria-label="showing select">
                                                <?php foreach($products as $product): ?>
                                                <option <?php echo(($perf->product_id==$product->id ) ? "selected" : "" )
                                                    ?> value="<?php echo $product->id ?>">#<?php echo $product->id ?>:
                                                    <?php echo $product->name ?>
                                                </option>
                                                <?php endforeach ?>
                                            </select>
                                            <label for="type">Product</label>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <a href="/manager/products?product=<?php echo $perf->product_id ?>&performance=<?php echo $perf->id ?>"
                                            class="btn btn-secondary ms-auto">
                                            <i class="bi bi-eye-fill"></i>
                                            View Product
                                        </a>
                                        <a href="/manager/delete/performance?performance=<?php echo $perf->id ?>"
                                            class="btn btn-danger">
                                            <i class="bi bi-x-lg"></i>
                                            Delete
                                        </a>
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg"></i>
                                            Save changes</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>

                    <?php endforeach; ?>

                </table>
            </div>
        </div>
    </div>

    <!-- New performance -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="addPerformance" aria-labelledby="addProductLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="addPerformanceLabel">New Performance</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form method="POST" action="/manager/add/performance">
                <div class="card mb-3">
                    <div class="card-body row">
                        <div class="col-auto">
                            <div class="mt-1 mb-1">
                                <b>Note:</b> Performance entries are automatically added when a new stock item is
                                scanned, adding them manually may be unnecessary.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="product" id="product" aria-label="showing select">
                        <?php foreach($products as $product): ?>
                        <option <?php echo(($_REQUEST['product']==$product->id ) ? "selected" : "" ) ?> value="<?php echo $product->id ?>">
                        #<?php echo $product->id ?>: <?php echo $product->name ?>
                        </option>
                        <?php endforeach ?>
                    </select>
                    <label for="type">Product</label>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Add
                </button>

            </form>
        </div>
    </div>

    <!-- Notifications   -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="notifications" aria-labelledby="notifications">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="notifications">Notification Settings</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form method="POST" action="/manager/addItem">

                <ul>
                    <li>notify when empty?</li>
                    <li>notify when almost empty (threshold)?</li>
                    <li>notify on scan?</li>
                    <li>how often do u want to send an email about bad products? (weekly/monthly/etc)</li>
                </ul>

                <button type="submit" name="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg"></i> Save
                </button>
                <a class="btn btn-secondary" data-bs-toggle="offcanvas" href="#filter" role="button"
                    aria-controls="offcanvasExample"><i class="bi bi-rocket-takeoff-fill"></i> Send Test
                    Notification</a>
            </form>
        </div>
    </div>

    <!-- Filter   -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="filter" aria-labelledby="filterLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="filterLabel">Table Filter</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form method="GET">
                <div class="form-floating mb-3">
                    <input type="text" name="search" class="form-control" id="searchinput" placeholder="Cool Kaftan"
                        value="<?php echo $_REQUEST['search'] ?>">
                    <label for="searchinput">Search</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="order" id="orderselect" aria-label="order select">
                        <option <?php echo(($_REQUEST['order']=='' || $_REQUEST['order']=='id_desending' ) ? "selected"
                            : "" ) ?> value="id_desending">ID (Desending)</option>
                        <option <?php echo(($_REQUEST['order']=='id_asending' ) ? "selected" : "" ) ?>
                            value="id_asending">ID (Asending)</option>
                        <option <?php echo(($_REQUEST['order']=='created_desending' ) ? "selected" : "" ) ?>
                            value="created_desending">Created (Desending)</option>
                        <option <?php echo(($_REQUEST['order']=='created_asending' ) ? "selected" : "" ) ?>
                            value="created_asending">Created (Asending)</option>
                        <option <?php echo(($_REQUEST['order']=='updated_desending' ) ? "selected" : "" ) ?>
                            value="updated_desending">Updated (Desending)</option>
                        <option <?php echo(($_REQUEST['order']=='updated_asending' ) ? "selected" : "" ) ?>
                            value="updated_asending">Updated (Asending)</option>
                    </select>
                    <label for="orderselect">Order By</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="showing" id="showingselect" aria-label="showing select">
                        <option <?php echo(($_REQUEST['showing']=='' || $_REQUEST['showing']=='all' ) ? "selected" : ""
                            ) ?> value="all">All</option>
                        <option <?php echo(($_REQUEST['showing']=='25' ) ? "selected" : "" ) ?> value="25">Max: 25
                        </option>
                        <option <?php echo(($_REQUEST['showing']=='50' ) ? "selected" : "" ) ?> value="50">Max: 50
                        </option>
                        <option <?php echo(($_REQUEST['showing']=='100' ) ? "selected" : "" ) ?> value="100">Max: 100
                        </option>
                        <option <?php echo(($_REQUEST['showing']=='200' ) ? "selected" : "" ) ?> value="200">Max: 200
                        </option>
                    </select>
                    <label for="showingselect">Showing</label>
                </div>
                <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg"></i> Save</button>
            </form>
        </div>
    </div>
    <?php
    if($_GET['performance'] != null)
    {
        echo("
        <script defer>
            window.onload = function(e){ 
                var modal = new window.bootstrap.Modal('#perf_" . $_GET['performance'] . "');
                modal.show();
            }
        </script>
        ");
    }  
?>
</body>