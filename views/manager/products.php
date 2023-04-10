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
                        <td>Number of units</td>
                        <td>Price</td>

                    </thead>
                    <?php

                        for ($i=0; $i<count($products); $i++):
                            $id = $products[$i]['id'];
                            $name = $products[$i]['name'];
                            $colour = $products[$i]['colour'];
                            $size = $products[$i]['size'];
                            $price = $products[$i]['price'];
                            $units = $products[$i]['units'];
                    
                    ?>

                    <!-- Database Item -->
                    <tr data-bs-toggle="modal" data-bs-target="#product_<?php echo $id; ?>">
                        <td>
                            <?php echo $id; ?>
                        </td>
                        <td>
                            <?php echo $name; ?>
                        </td>
                        <td>
                            <?php echo $colour; ?>
                        </td>
                        <td>
                            <?php echo $size; ?>
                        </td>
                        <td><?php echo $units; ?></td>
                        <td>
                            <?php echo $price; ?>
                        </td>
                    </tr>
                    <div class="modal fade" id="product_<?php echo $id; ?>" tabindex="-1"
                        aria-labelledby="product" aria-hidden="true">
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
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="name" required value="<?php echo $name; ?>">
                                            <label for="name">Name</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" name="colour" class="form-control" id="colour"
                                                placeholder="colour" value="<?php echo $colour; ?>" required>
                                            <label for="colour">Colour</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" name="size" class="form-control" id="size"
                                                placeholder="size" required value="<?php echo $size; ?>">
                                            <label for="size">Size</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" name="price" class="form-control" id="price"
                                                placeholder="price" required value="<?php echo $price; ?>">
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
                                    <div class="modal-footer">
                                    <a href="/manager/stock?product=<?php echo $id ?>"
                                            class="btn btn-secondary ms-auto">
                                            <i class="bi bi-eye-fill"></i>
                                            View Stock
                                        </a>
                                        <a href="#" type="submit" name="delete" class="btn btn-danger">
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
            <form method="POST" action="/manager/addItem">

                <div class="form-floating mb-3">
                    <input type="text" name="prodName" class="form-control" id="prodName" placeholder="name"
                        required>
                    <label for="prodName">Product Name</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="prodDetail" class="form-control" id="prodDetail"
                        placeholder="details" required>
                    <label for="prodDetail">Product Details</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="prodSize" class="form-control" id="prodSize" placeholder="size"
                        required>
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
    include_once 'components/filter_table.php';
    ?>
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
