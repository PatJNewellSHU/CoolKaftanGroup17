<?php 
        include_once(__DIR__."/../components/navbar.php");

        require_once(__DIR__."/../../../App/Helpers/functions.php");
        require_once(__DIR__."/../../../App/Helpers/db_connection.php");
    
        $shelfID = 3;
    
        GetBoxShelf(connect(), $shelfID);
?>

<body>
        <div class="container">
        <div class="row mw-100 ms-0 row-gap-3 mt-3">
        <div class="col-8">
                <h2>P2</h2>
            </div>
            <div class="col-4 text-end">
                <div class="btn-group">
                    <a href="/manager" class="btn bg-transparent">Back</a>
                    <button type="button" class="btn bg-transparent dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/manager/top">Top Floor</a></li>
                        <li><a class="dropdown-item" href="/manager/p/1">P1</a></li>
                        <li><a class="dropdown-item" href="/manager/p/2">P2</a></li>
                        <li><a class="dropdown-item" href="/manager/p/3">P3</a></li>
                        <li><a class="dropdown-item" href="/manager/p/4">P4</a></li>
                    </ul>
                </div>
                <a class="btn btn-success" data-bs-toggle="offcanvas" href="#addProduct" role="button"
                    aria-controls="offcanvasExample"><i class="bi bi-database-add"></i> Add Product</a>
                <a class="btn btn-secondary" data-bs-toggle="offcanvas" href="#filter" role="button"
                    aria-controls="offcanvasExample"><i class="bi bi-filter"></i> Filter</a>
            </div>
            <div class="col-12">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <td>Name</td>
                        <td>Colour</td>
                        <td>Size</td>
                        <td>Number of Boxes</td>
                        <td>Units per Box</td>
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
        include_once(__DIR__."/../components/filter_table.php");
    ?>
</body>