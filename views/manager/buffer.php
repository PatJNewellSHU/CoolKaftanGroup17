<?php 
        include_once("components/navbar.php");
?>

<body>
    <div class="container">
        <div class="row mw-100 ms-0 row-gap-3 mt-3">
            <div class="col-10">
                <h2>Buffer Stock</h2>
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
                        <td>Category</td>
                        <td>Number of units</td>
                    </thead>

                    <!-- Database Item -->
                    <tr data-bs-toggle="modal" data-bs-target="#editModal_ID">
                        <td>Dummy</td>
                        <td>Dummy</td>
                        <td>Dummy</td>
                        <td>Dummy</td>
                        <td>Dummy</td>
                    </tr>
                    <div class="modal fade" id="editModal_ID" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editing: Dummy</h1>
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