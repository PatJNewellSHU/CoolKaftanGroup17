<?php

include_once 'components/navbar.php';

?>

<body>
    <div id="app">
    <div class="container">
        <div class="row mw-100 ms-0 row-gap-3 mt-3">
            <div class="col-12 col-md-9">
                <h2>Products</h2>
            </div>
            <div class="col-12 col-md-3 text-end">
                <a class="btn btn-success" data-bs-toggle="offcanvas" href="#addProduct" role="button"
                    aria-controls="offcanvasExample"><i class="bi bi-database-add"></i> Add Product</a>
                <a class="btn btn-secondary" data-bs-toggle="offcanvas" href="#filter" role="button"
                    aria-controls="offcanvasExample"><i class="bi bi-filter"></i> Filter</a>
            </div>
            <div class="col-12 overflow-x-auto">
                <table class="table table-hover">
                    <thead class="table-head">
                        <td>#</td>
                        <td>Name</td>
                        <td>Colour</td>
                        <td>Size</td>
                        <td>Price</td>
                        <td>Created</td>
                        <td>Updated</td>
                    </thead>
                    <?php
                    foreach ($products as $p => $product):                   
                    ?>

                    <!-- Database Item -->
                    <tr data-bs-toggle="modal" data-bs-target="#product_<?php echo $product->id; ?>">
                        <td>
                            <?php echo $product->id; ?>
                        </td>
                        <td>
                            <?php echo $product->name; ?>
                        </td>
                        <td>
                            <?php echo $product->colour; ?>
                        </td>
                        <td>
                            <?php echo $product->size; ?>
                        </td>
                        <td>
                            <?php echo $product->price; ?>
                        </td>
                        <td>
                            <?php echo App\Helpers\generalHelper::time_format($product->created_at) ?>
                        </td>
                        <td>
                            <?php echo App\Helpers\generalHelper::time_format($product->updated_at) ?>
                        </td>
                    </tr>
                    <div class="modal fade" id="product_<?php echo $product->id; ?>" tabindex="-1"
                        aria-labelledby="product" aria-hidden="true">
                        <form method="POST" action="/manager/edit/product?product=<?php echo $product->id ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="d-block">
                                            <div class="fw-bold">
                                                Editing
                                            </div>
                                            <div class="modal-title fs-5" id="exampleModalLabel">
                                                <?php echo $product->name; ?>
                                            </div>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="form-floating mb-3">
                                            <input type="number" name="id" class="form-control" id="id"
                                                placeholder="id" required value="<?php echo $product->id; ?>">
                                            <label for="id">ID</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="name" required value="<?php echo $product->name; ?>">
                                            <label for="name">Name</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" name="colour" class="form-control" id="colour"
                                                placeholder="colour" value="<?php echo $product->colour; ?>" required>
                                            <label for="colour">Colour</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" name="size" class="form-control" id="size"
                                                placeholder="size" required value="<?php echo $product->size; ?>">
                                            <label for="size">Size</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" name="price" class="form-control" id="price"
                                                placeholder="price" required value="<?php echo $product->price; ?>">
                                            <label for="price">Price</label>
                                        </div>
                                    </div>
                                    <?php if(isset($_REQUEST['stock'])): ?>
                                        <div class="modal-footer">
                                            <a href="/manager/stock?stock=<?php echo $_REQUEST['stock'] ?>"
                                                class="btn btn-secondary ms-auto me-auto">
                                                <i class="bi bi-arrow-left"></i>
                                                Back to Stock
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(isset($_REQUEST['performance'])): ?>
                                        <div class="modal-footer">
                                            <a href="/manager/performance?performance=<?php echo $_REQUEST['performance'] ?>"
                                                class="btn btn-secondary ms-auto me-auto">
                                                <i class="bi bi-arrow-left"></i>
                                                Back to Performance
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="modal-footer">
                                    <a href="/manager/stock?product=<?php echo $product->id ?>"
                                            class="btn btn-secondary ms-auto">
                                            <i class="bi bi-eye-fill"></i>
                                            View Stock
                                        </a>
                                        <a href="manager/delete/product?product=<?php echo $product->id ?>" name="delete" class="btn btn-danger">
                                            <i class="bi bi-x-lg"></i>
                                            Delete
                                        </a>
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg"></i>
                                            <i class="bi bi-check-lg"></i> Save changes
                                        </button>
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
    <!-- New product -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="addProduct" aria-labelledby="addProductLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="addProductLabel">New Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form method="POST" action="/manager/add/product">

                <div class="form-floating mb-3">
                    <input type="number" name="id" class="form-control" id="id" placeholder="id"
                        required>
                    <label for="id">ID</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control" id="name" placeholder="name"
                        required>
                    <label for="name">Name</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="colour" class="form-control" id="colour"
                        placeholder="details" required>
                    <label for="colour">Colour</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="size" class="form-control" id="size" placeholder="size"
                        required>
                    <label for="size">Size</label>
                </div>
                
                <div class="form-floating mb-3">
                    <input type="text" name="barcode" class="form-control" id="barcode" placeholder="barcode"
                        required>
                    <label for="barcode">Barcode</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="price" class="form-control" id="price" placeholder="price"
                        required>
                    <label for="price">Price</label>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">
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
    </div>
    <?php
    if($_GET['product'] != null)
    {
        echo("
        <script defer>
            window.onload = function(e){ 
                var modal = new window.bootstrap.Modal('#product_" . $_GET['product'] . "');
                modal.show();
            }
        </script>
        ");
    }  
?>
</body>
