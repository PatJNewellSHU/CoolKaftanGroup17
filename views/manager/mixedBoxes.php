<?php 
        include_once("navbar.php");
?>

<body>
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
                        <td></td>
                        <td></td>
                    </thead>

                    <tr>
                        <td>Dummy</td>
                        <td><a href="updateBox.php">Update</a></td>
                        <td><a href="deleteBox.php">Delete</a></td>
                    </tr>
                </table>    
            </div>
        </div>
        </div>
</body>