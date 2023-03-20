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
                <a href="shelves.php" class="btn btn-success">Add detail</a>
            </div>
        </div>
        <div class="row mw-100">
            <div class="col-12">
                <table class="table table-striped">
                    <h1 class="fw-bold text-center">All Items</h1>
                    <thead class="table-dark">
                        <td>Name</td>
                        <td>Colour</td>
                        <td>Size</td>
                        <td>Category</td>
                        <td>Number of units</td>
                        <td>Price</td>

                    </thead>

                    <tr>
                        <td>Dummy</td>
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
</body>