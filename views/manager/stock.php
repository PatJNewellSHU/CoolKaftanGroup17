<?php 
        include_once("components/navbar.php");
?>

<body>
    <div class="container">
        <div class="row mw-100 ms-0 row-gap-3 mt-3">
            <div class="col-12 col-md-9">
                <h2>Stock</h2>
            </div>
            <div class="col-12 col-md-3 text-end">
                <a class="btn btn-success" data-bs-toggle="offcanvas" href="#addProduct" role="button"
                    aria-controls="offcanvasExample"><i class="bi bi-database-add"></i> Add Stock</a>
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
                                        <a href="/manage/long/buffer" class="btn btn-secondary ms-auto" data-bs-dismiss="modal">
                                            Move to long
                                        </a>
                                        <a href="/manager/products?stock=ID" class="btn btn-secondary me-auto" data-bs-dismiss="modal">
                                            View Products
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