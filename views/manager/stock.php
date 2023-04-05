<?php 
        include_once("components/navbar.php");
?>

<body>
    <div class="container">
        <div class="row mw-100 ms-0 row-gap-3 mt-3">
            <?php if($_GET['box'] != null) : ?>
            <div class="col-12 col-md-5">
                <div class="card">

                    <div class="card-body row">
                        <div class="col-auto d-flex">
                            <a class="btn btn-primary mt-auto mb-auto"
                                href="/manager/boxes?box=<?php echo($_GET['box']) ?>">
                                <i class="bi bi-arrow-left"></i> Back
                            </a>
                        </div>
                        <div class="col-auto">
                            <h1 class="mb-0">Stock</h1>
                            <div class="mt-1 mb-2">
                                You are viewing stock for box
                                <?php echo($_GET['box']) ?>.
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
                <a class="btn btn-success" data-bs-toggle="offcanvas" href="#addProduct" role="button"
                    aria-controls="offcanvasExample"><i class="bi bi-database-add"></i> Add Stock</a>
                <a class="btn btn-secondary" data-bs-toggle="offcanvas" href="#filter" role="button"
                    aria-controls="offcanvasExample"><i class="bi bi-filter"></i> Filter</a>
            </div>
            <div class="col-12 overflow-x-auto">
                <table class="table table-hover">
                    <thead class="table-head">
                        <td>#</td>
                        <td>BoxID</td>
                        <td>Product Name</td>
                        <td>Created</td>
                        <td>Updated</td>
                    </thead>

                    <?php

                        for ($i=0; $i<count($stock); $i++):
                            $id = $stock[$i]['id'];
                            $boxid = $stock[$i]['box_id'];   
                            $productid = $stock[$i]['product_id'];  
                            $productname = $stock[$i]['product_name'];
                            $Updated = $stock[$i]['updated_at'];  
                            $Created = $stock[$i]['created_at'];               
                    ?>

                    <!-- Database Item -->
                    <tr data-bs-toggle="modal" data-bs-target="#stock_<?php echo $id ?>">
                        <td>
                            <?php echo $id ?>
                        </td>
                        <td>
                            <?php echo $boxid ?>
                        </td>
                        <td>
                            <?php echo $productname ?>
                        </td>
                        <td>
                            <?php echo App\Helpers\generalHelper::time_format($created) ?>
                        </td>
                        <td>
                            <?php echo App\Helpers\generalHelper::time_format($updated) ?>
                        </td>
                    </tr>
                    <div class="modal fade" id="stock_<?php echo $id ?>" tabindex="-1" aria-labelledby="stock"
                        aria-hidden="true">
                        <form method="POST" action="/manager/all/edit">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="d-block">
                                            <div class="fw-bold">
                                                Editing
                                            </div>
                                            <div class="modal-title fs-5" id="stock">
                                                Stock:
                                                <?php echo $id; ?>
                                            </div>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="type" id="product"
                                                aria-label="showing select">
                                                <option value="1">1: Product Name</option>
                                            </select>
                                            <label for="type">Product</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="type" id="product"
                                                aria-label="showing select">
                                                <option value="1">Box 1 (12 items)</option>
                                            </select>
                                            <label for="type">Box</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="/manager/boxes?box=<?php echo($boxid) ?>"
                                            class="btn btn-secondary ms-auto">
                                            <i class="bi bi-eye-fill"></i>
                                            View Box
                                        </a>
                                        <a href="/manager/products?product=<?php echo($productid) ?>"
                                            class="btn btn-secondary me-auto">
                                            <i class="bi bi-eye-fill"></i>
                                            View Product
                                        </a>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#" class="btn btn-danger ms-auto" data-bs-dismiss="modal">
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
    <!-- New product -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="addProduct" aria-labelledby="addProductLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="addProductLabel">New Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div> Some text as placeholder. </div>
            <button class="btn btn-success" type="button"> Submit </button>
        </div>
    </div>
    <?php 
        include_once("components/filter_table.php");
    ?>
</body>