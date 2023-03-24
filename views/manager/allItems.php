<?php 
    include_once("components/navbar.php");

?>

<body>

        <div class="container">
        <div class="row mw-100 ms-0 row-gap-3 mt-3">
        <div class="col-10">
                <h2>All Items</h2>
            </div>
            <div class="col-2 text-end">
                <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#addProduct" role="button"
                    aria-controls="offcanvasExample">Add Product</a>
                <a class="btn btn-secondary" data-bs-toggle="offcanvas" href="#filter" role="button"
                    aria-controls="offcanvasExample">Filter</a>
            </div>
            <div class="col-12">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <td>Name</td>
                        <td>Colour</td>
                        <td>Size</td>
                        <td>Number of units</td>
                        <td>Price</td>

                    </thead>
                    <?php

                        for ($i=0; $i<count($items); $i++):
                            $ProdName = $items[$i][1];
                            $ProdDetail = $items[$i][2];
                            $ProdSize = $items[$i][3];
                            $ProdPrice = $items[$i][4];
                    
                    ?>

                    <!-- Database Item -->
                    <tr data-bs-toggle="modal" data-bs-target="#editModal_<?php echo($i)?>">
                        <td><?php echo($ProdName)?></td>
                        <td><?php echo($ProdDetail)?></td>
                        <td><?php echo($ProdSize)?></td>
                        <td>Dummy</td>
                        <td><?php echo($ProdPrice)?></td>
                    </tr>
                    <div class="modal fade" id="editModal_<?php echo($i)?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editing: <?php echo($ProdName)?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body"> ... </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger me-auto" data-bs-dismiss="modal">Delete</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
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