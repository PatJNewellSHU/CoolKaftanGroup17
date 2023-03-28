<?php 
        include_once("components/navbar.php");
        // var_dump($results);
?>

<body>
    <div class="container">
        <div class="row mw-100 ms-0 row-gap-3 mt-3">
            <div class="col-12 col-md-9">
            <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link <?php echo (($_SERVER['REQUEST_URI'] == '/manager/long') ? "active text-dark" : "text-dark"
                  )?>" aria-current="page" href="/manager/long">Top Shelf</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (str_contains($_SERVER['REQUEST_URI'], 'manager/long?s=2') ? "active text-dark" : "text-dark"
                  )?>" href="/manager/long?s=2">Shelf #1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (str_contains($_SERVER['REQUEST_URI'], 'manager/long?s=3') ? "active text-dark" : "text-dark"
                  )?>" href="/manager/long?s=3">Shelf #2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (str_contains($_SERVER['REQUEST_URI'], 'manager/long?s=4') ? "active text-dark" : "text-dark"
                  )?>" href="/manager/long?s=4">Shelf #3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (str_contains($_SERVER['REQUEST_URI'], 'manager/long?s=5') ? "active text-dark" : "text-dark"
                  )?>" href="/manager/long?s=5">Shelf #4</a>
                    </li>
                </ul>
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
                        <td>Name</td>
                        <td>Colour</td>
                        <td>Size</td>
                        <td>Category</td>
                        <td>Number of units</td>
                        <td>Performance</td>
                    </thead>

                    <!-- Database Item -->
                    <tr data-bs-toggle="modal" data-bs-target="#editModal_ID">
                        <td>Dummy</td>
                        <td>Dummy</td>
                        <td>Dummy</td>
                        <td>Dummy</td>
                        <td>Dummy</td>
                        <td>Dummy</td>
                    </tr>
                    <div class="modal fade" id="editModal_ID" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <form method="POST" action="/manager/all/edit">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="d-block">
                                            <div class="fw-bold">
                                                Editing
                                            </div>
                                            <div class="modal-title fs-5" id="exampleModalLabel">
                                                <?php echo $ProdName; ?>
                                            </div>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">


                                        <div class="form-floating mb-3">
                                            <input type="text" name="prodName" class="form-control" id="prodName"
                                                placeholder="name" required value="<?php echo $ProdName; ?>">
                                            <label for="productname">Product Name</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" name="prodDetail" class="form-control" id="prodDetail"
                                                placeholder="details" required>
                                            <label for="prodDetail" value="<?php echo $ProdDetail; ?>">Product
                                                Details</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" name="prodSize" class="form-control" id="prodSize"
                                                placeholder="size" required value="<?php echo $ProdSize; ?>">
                                            <label for="prodSize">Product Size</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" name="prodPrice" class="form-control" id="prodPrice"
                                                placeholder="price" required value="<?php echo $ProdPrice; ?>">
                                            <label for="prodPrice">Product Price</label>
                                        </div>
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
            <form method="POST" action="/manager/addItem">

                <div class="form-floating mb-3">
                    <input type="text" name="prodName" class="form-control" id="prodName" placeholder="name" required>
                    <label for="prodName">Product Name</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="prodDetail" class="form-control" id="prodDetail" placeholder="details"
                        required>
                    <label for="prodDetail">Product Details</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="prodSize" class="form-control" id="prodSize" placeholder="size" required>
                    <label for="prodSize">Product Size</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="prodPrice" class="form-control" id="prodPrice" placeholder="price"
                        required>
                    <label for="prodPrice">Product Price</label>
                </div>


                <button type="submit" name="submit" class="btn btn-primary">
                    Submit
                </button>
            </form>
        </div>
    </div>
    <?php 
        include_once("components/filter_table.php");
    ?>
</body>