<?php 
        include_once("navbar.php");
?>

<body>
        <div class="row m-2">
            <div class="col-3">
                <div class="input-group rounded">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon"/>
                    <button type="button" class="btn btn-success">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
            <div class="col-6">
                <a href="shelves.php" class="btn btn-success">Filter</a>
            </div>
        </div>
        <div class="container">
        <div class="row mw-100 ms-0 row-gap-3 mt-3">
        <div class="col-10">
                <a href="shelves.php" class="btn btn-success">Back</a>
            </div>
            <div class="col-2 text-end">
                <a href="shelves.php" class="btn btn-success">Add Product</a>
            </div>
            <div class="col-12">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <td>Name</td>
                        <td>Colour</td>
                        <td>Size</td>
                        <td>Category</td>
                        <td>Number of units</td>
                        <td>Performance</td>
                        <td></td>
                        <td></td>
                    </thead>

                    <tr>
                        <td>Dummy</td>
                        <td>Dummy</td>
                        <td>Dummy</td>
                        <td>Dummy</td>
                        <td>Dummy</td>
                        <td>Dummy</td>
                        <td><a href="updateBox.php">Update</a></td>
                        <td><a href="deleteBox.php">Delete</a></td>
                    </tr>
                </table>    
            </div>
        </div>
        </div>
</body>
