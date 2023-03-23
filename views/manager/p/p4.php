<?php 
    include_once(__DIR__."/../navbar.php");

    require_once(__DIR__."/../../../includes/functions.php");
    require_once(__DIR__."/../../../includes/db_connection.php");

    $shelfID = 5    ;

    GetBoxShelf(connect(), $shelfID);
?>

<body>

        <div class="row m-2">
            <div class="col-11">
                <a href="/manager" class="btn btn-success">Back</a>
            </div>
            <div class="col-1">
                <a href="/manager" class="btn btn-success">Add Box</a>
            </div>
        </div>
        <div class="row mw-100">
            <div class="col-12">
                <h1 class="fw-bold text-center">P4</h1>
                <table class="table table-striped">
                    <thead class="table-dark">
                        <td>Name</td>
                        <td>Colour</td>
                        <td>Size</td>
                        <td>Number of Boxes</td>
                        <td>Units per Box</td>
                    </thead>

                    <tr>
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