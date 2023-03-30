<?php 
        include_once("components/navbar.php");
       // var_dump($boxes);
?>

<body>
    <div class="container">
        <div class="row mw-100 ms-0 row-gap-3 mt-3">
            <div class="col-12 col-md-9">
                <h2>Boxes</h2>
            </div>
            <div class="col-12 col-md-3 text-end">
                <a class="btn btn-success" data-bs-toggle="offcanvas" href="#addProduct" role="button"
                    aria-controls="offcanvasExample"><i class="bi bi-database-add"></i> New Box</a>
                <a class="btn btn-secondary" data-bs-toggle="offcanvas" href="#filter" role="button"
                    aria-controls="offcanvasExample"><i class="bi bi-filter"></i> Filter</a>
            </div>
            <div class="col-12 overflow-x-auto">
                <table class="table table-hover">
                    <thead class="table-head">
                        <td>#</td>
                        <td>Type</td>
                        <td>Products</td>
                        <td>Shelf</td>
                        <td>Created</td>
                        <td>Updated</td>
                    </thead>

                    <?php

                        for ($i=0; $i<count($boxes); $i++):
                            $id = $boxes[$i]['id'];
                            $type = $boxes[$i]['box_type'];
                            $products = $boxes[$i]['products']; 
                            $shelf = $boxes[$i]['shelf'];
                            $created = $boxes[$i]['created_at'];
                            $updated = $boxes[$i]['updated_at'];                    
                    ?>

                    <!-- Database Item -->
                    <tr data-bs-toggle="modal" data-bs-target="#box_<?php echo $id ?>">
                        <td>
                            <?php echo $id ?>
                        </td>
                        <td>
                            <?php echo $type ?>
                        </td>
                        <td>
                            <?php echo $products ?>
                        </td>
                        <td>
                            <?php echo $shelf ?>
                        </td>
                        <td>
                            <?php echo $created ?>
                        </td>
                        <td>
                            <?php echo $updated ?>
                        </td>
                    </tr>
                    <div class="modal fade" id="box_<?php echo $id ?>" role="dialog" tabindex="-1" aria-labelledby="box"
                        aria-hidden="true">
                        <form method="POST" action="/manager/all/edit">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="d-block">
                                            <div class="fw-bold">
                                                Editing
                                            </div>
                                            <div class="modal-title fs-5" id="box">
                                                <?php echo $id; ?>
                                            </div>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="type" id="type"
                                                aria-label="showing select">
                                                <option <?php echo(($type=='mixed' ) ? "selected" : "" ) ?>
                                                    value="mixed">Mixed</option>
                                                <option <?php echo(($type=='non_mixed' ) ? "selected" : "" ) ?>
                                                    value="non_mixed">Non-Mixed</option>
                                            </select>
                                            <label for="type">Type</label>
                                        </div>

                                        <div class="form-floating mb-3">

                                            <select class="form-select" name="type" id="type"
                                                aria-label="showing select">
                                                <option <?php echo(($shelf=='buffer' ) ? "selected" : "" ) ?>
                                                    value="buffer">Buffer</option>
                                                <option <?php echo(($shelf=='top_floor' ) ? "selected" : "" ) ?>
                                                    value="top_shelf">Top Shelf</option>
                                                <option <?php echo(($shelf=='shelf_1' ) ? "selected" : "" ) ?>
                                                    value="shelf_1">Shelf #1</option>
                                                <option <?php echo(($shelf=='shelf_2' ) ? "selected" : "" ) ?>
                                                    value="shelf_2">Shelf #2</option>
                                                <option <?php echo(($shelf=='shelf_3' ) ? "selected" : "" ) ?>
                                                    value="shelf_2">Shelf #3</option>
                                                <option <?php echo(($shelf=='shelf_4' ) ? "selected" : "" ) ?>
                                                    value="shelf_2">Shelf #4</option>
                                            </select>
                                            <label for="type">Shelf</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="/manager/stock?box=<?php echo $id ?>"
                                            class="btn btn-secondary ms-auto">
                                            <i class="bi bi-eye-fill"></i>
                                            View Stock
                                        </a>
                                        <a href="/manager/products?box=<?php echo $id ?>"
                                            class="btn btn-secondary me-auto">
                                            <i class="bi bi-eye-fill"></i>
                                            View Products
                                        </a>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#" class="btn btn-danger" data-bs-dismiss="modal">
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

                    <?php endfor ?>

                </table>
            </div>
        </div>
    </div>
    <!-- New Box -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="addProduct" aria-labelledby="addProductLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="addProductLabel">New Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form method="POST" action="/manager/add/box">

                <div class="form-floating mb-3">
                    <select class="form-select" name="type" id="type" aria-label="showing select">
                        <option value="mixed">Mixed</option>
                        <option value="non_mixed">Non-Mixed</option>
                    </select>
                    <label for="type">Type</label>
                </div>

                <div class="form-floating mb-3">

                    <select class="form-select" name="type" id="type" aria-label="showing select">
                        <option value="buffer">Buffer</option>
                        <option value="top_shelf">Top Shelf</option>
                        <option value="shelf_1">Shelf #1</option>
                        <option value="shelf_2">Shelf #2</option>
                        <option value="shelf_2">Shelf #3</option>
                        <option value="shelf_2">Shelf #4</option>
                    </select>
                    <label for="type">Shelf</label>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">
                    Submit
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
                    <input type="text" name="search" class="form-control" id="searchinput" placeholder="Cool Kaftan">
                    <label for="searchinput">Search</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="order" id="orderselect" aria-label="order select">
                        <option selected value="id_desending">ID (Desending)</option>
                        <option value="id_asending">ID (Asending)</option>
                        <option value="desending">Date (Desending)</option>
                        <option value="asending">Date (Asending)</option>
                    </select>
                    <label for="orderselect">Order By</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="showing" id="showingselect" aria-label="showing select">
                        <option selected value="all">All</option>
                        <option value="25">Max: 25</option>
                        <option value="50">Max: 50</option>
                        <option value="100">Max: 100</option>
                        <option value="200">Max: 200</option>
                    </select>
                    <label for="showingselect">Showing</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="box_type" id="box_type" aria-label="Box Type">
                        <option selected value="all">All</option>
                        <option value="mixed">Mixed Only</option>
                        <option value="shelf">Unmixed Only</option>

                    </select>
                    <label for="showingselect">Box Type</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="shelf" id="shelf" aria-label="Shelf">
                        <option selected value="all">All</option>
                        <option value="buffer">Buffer</option>
                        <option value="top">Top Shelf</option>
                        <option value="mixed">Shelf #P1</option>
                        <option value="mixed">Shelf #P2</option>
                        <option value="mixed">Shelf #P3</option>
                        <option value="mixed">Shelf #P4</option>
                    </select>
                    <label for="showingselect">Shelf</label>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <?php
    if($_GET['box'] != null)
    {
        echo("
        <script defer>
            window.onload = function(e){ 
                var modal = new window.bootstrap.Modal('#box_" . $_GET['box'] . "');
                modal.show();
            }
        </script>
        ");
    }  
?>
</body>