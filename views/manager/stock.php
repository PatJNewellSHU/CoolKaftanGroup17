<?php 
        include_once("components/navbar.php");
?>

<body>
    <div class="container">
        <div class="row mw-100 ms-0 row-gap-3 mt-3">
            <?php if($_GET['box'] != null || $_GET['product'] != null) : ?>
            <div class="col-12 col-md-5">
                <div class="card">

                    <div class="card-body row">
                        <div class="col-auto d-flex">
                            <?php if($_GET['box'] != null): ?>
                            <a class="btn btn-primary mt-auto mb-auto"
                                href="/manager/boxes?box=<?php echo($_GET['box']) ?>">
                                <i class="bi bi-arrow-left"></i> Back
                            </a>
                            <?php else: ?>
                            <a class="btn btn-primary mt-auto mb-auto"
                                href="/manager/products?product=<?php echo($_GET['product']) ?>">
                                <i class="bi bi-arrow-left"></i> Back
                            </a>
                            <?php endif; ?>

                        </div>
                        <div class="col-auto">
                            <h1 class="mb-0">Stock</h1>
                            <div class="mt-1 mb-2">
                                <?php if($_GET['box'] != null): ?>
                                You are viewing stock for box
                                <?php echo($_GET['box']) ?>.
                                <?php else: ?>
                                You are viewing stock for product
                                <?php echo($_GET['product']) ?>.
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php else : ?>
            <div class="col-12 col-md-9">
                <h2>Stock</h2>
            </div>
            <?php endif; ?>
            <div class="col-12 col-md-3 text-end ms-auto">
                <a class="btn btn-success" data-bs-toggle="offcanvas" href="#addStock" role="button"
                    aria-controls="offcanvasExample"><i class="bi bi-database-add"></i> Add Stock</a>
                <a class="btn btn-secondary" data-bs-toggle="offcanvas" href="#filter" role="button"
                    aria-controls="offcanvasExample"><i class="bi bi-filter"></i> Filter</a>
            </div>
            <div class="col-12 overflow-x-auto">
                <table class="table table-hover">
                    <thead class="table-head">
                        <td>#</td>
                        <td>Box ID</td>
                        <td>Product ID</td>
                        <td>Created</td>
                        <td>Updated</td>
                    </thead>

                    <?php
                    foreach ($stock as $v => $s):                   
                    ?>

                    <!-- Database Item -->
                    <tr data-bs-toggle="modal" data-bs-target="#stock_<?php echo $s->id ?>">
                        <td>
                            <?php echo $s->id ?>
                        </td>
                        <td>
                            #
                            <?php echo $s->box_id ?>
                        </td>
                        <td>
                            #
                            <?php echo $s->product_id ?>
                        </td>
                        <td>
                            <?php echo App\Helpers\generalHelper::time_format($s->created_at) ?>
                        </td>
                        <td>
                            <?php echo App\Helpers\generalHelper::time_format($s->updated_at) ?>
                        </td>
                    </tr>
                    <div class="modal fade" id="stock_<?php echo $s->id ?>" tabindex="-1" aria-labelledby="stock"
                        aria-hidden="true">
                        <form method="POST" action="/manager/edit/stock?stock=<?php echo $s->id ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="d-block">
                                            <div class="fw-bold">
                                                Editing
                                            </div>
                                            <div class="modal-title fs-5" id="stock">
                                                Stock: #
                                                <?php echo $s->id; ?>
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
                                                <option <?php echo(($s->product_id==$product->id ) ? "selected" : "" )
                                                    ?> value="<?php echo $product->id ?>">#
                                                    <?php echo $product->id ?>:
                                                    <?php echo $product->name ?>
                                                </option>
                                                <?php endforeach ?>
                                            </select>
                                            <label for="type">Product</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="box" id="box" aria-label="showing select">
                                                <?php foreach($boxes as $box): ?>
                                                <option <?php echo(($s->box_id==$box->id ) ? "selected" : "" ) ?>
                                                    value="
                                                    <?php echo $box->id ?>">Box: #
                                                    <?php echo $box->id ?>
                                                </option>
                                                <?php endforeach ?>
                                            </select>
                                            <label for="type">Box</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="/manager/boxes?box=<?php echo($s->box_id) ?>&stock=<?php echo($s->id)?>"
                                            class="btn btn-secondary ms-auto">
                                            <i class="bi bi-eye-fill"></i>
                                            View Box
                                        </a>
                                        <a href="/manager/products?product=<?php echo($s->product_id) ?>&stock=<?php echo($s->id) ?>"
                                            class="btn btn-secondary me-auto">
                                            <i class="bi bi-eye-fill"></i>
                                            View Product
                                        </a>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="/manager/delete/stock?stock=<?php echo($s->id) ?>"
                                            class="btn btn-danger ms-auto">
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

                    <?php endforeach ?>

                </table>
            </div>
        </div>
    </div>
    <!-- New Stock -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="addStock" aria-labelledby="addStockLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="addStockLabel">New Stock</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form method="POST" action="/manager/add/stock">
                <?php if($_REQUEST['product']): ?>
                <div class="card mb-3">
                    <div class="card-body row">
                        <div class="col-auto">
                            <div class="mt-1 mb-1">
                                <b>Note:</b> We've preselected the product you are viewing the stock for.
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if($_REQUEST['box']): ?>
                <div class="card mb-3">
                    <div class="card-body row">
                        <div class="col-auto">
                            <div class="mt-1 mb-1">
                                <b>Note:</b> We've preselected the box you are viewing the stock for.
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <div class="form-floating mb-3">
                    <select class="form-select" name="product" id="product" aria-label="showing select">
                        <?php foreach($products as $product): ?>
                        <option <?php echo(($_REQUEST['product']==$product->id ) ? "selected" : "" ) ?> value="<?php echo $product->id ?>">#
                            <?php echo $product->id ?>:
                            <?php echo $product->name ?>
                        </option>
                        <?php endforeach ?>
                    </select>
                    <label for="type">Product</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="box" id="box" aria-label="showing select">
                        <?php foreach($boxes as $box): ?>
                        <option <?php echo(($_REQUEST['box']==$box->id ) ? "selected" : "" ) ?> value="<?php echo $box->id ?>">Box: #
                            <?php echo $box->id ?> <?php echo $box->nickname ?>
                        </option>
                        <?php endforeach ?>
                    </select>
                    <label for="type">Box</label>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Add
                </button>
            </form>
        </div>
    </div>
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
    if($_GET['stock'] != null)
    {
        echo("
        <script defer>
            window.onload = function(e){ 
                var modal = new window.bootstrap.Modal('#stock_" . $_GET['stock'] . "');
                modal.show();
            }
        </script>
        ");
    }  
?>
</body>