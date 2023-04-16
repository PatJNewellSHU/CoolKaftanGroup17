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
                        <td>Stock</td>
                        <td>Box</td>
                        <td>Created</td>
                        <td>Updated</td>
                    </thead>

                    <!-- Database Item -->
                    <tr data-bs-toggle="modal" data-bs-target="#editModal_ID">
                        <td>0</td>
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

    <!-- New performance -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="addPerformance" aria-labelledby="addProductLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="addPerformanceLabel">New Performance</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form method="POST" action="/manager/addItem">
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
                </ul>

                <button type="submit" name="submit" class="btn btn-primary">
                    Submit
                </button>
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
                    <input type="text" name="search" class="form-control" id="searchinput" placeholder="Cool Kaftan">
                    <label for="searchinput">Search</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="order" id="orderselect" aria-label="order select">
                        <option selected value="desending">Desending</option>
                        <option value="asending">Asending</option>
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
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>