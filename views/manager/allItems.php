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
                        <td>Number of units</td>
                        <td>Price</td>
                        <td></td>
                        <td></td>

                    </thead>
                    <?php

                        for ($i=0; $i<count($items); $i++):
                            $ProdName = $items[$i][1];
                            $ProdDetail = $items[$i][2];
                            $ProdSize = $items[$i][3];
                            $ProdPrice = $items[$i][4];
                    
                    ?>

                    <tr>
                        <td><?php echo($ProdName)?></td>
                        <td><?php echo($ProdDetail)?></td>
                        <td><?php echo($ProdSize)?></td>
                        <td>Dummy</td>
                        <td><?php echo($ProdPrice)?></td>
                        <td><a href="updateBox.php">Update</a></td>
                        <td><a href="deleteBox.php">Delete</a></td>
                    </tr>

                    <?php endfor ?>
                </table>    
            </div>
        </div>
</body>