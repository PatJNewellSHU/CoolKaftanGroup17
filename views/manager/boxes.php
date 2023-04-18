<?php 
        include_once("components/navbar.php");
       // var_dump($boxes);
?>

<body>
    <div class="container">
        <div class="row mw-100 ms-0 row-gap-3 mt-3">
            <div class="col-12 col-md-9">
                <h2>Boxes</h2>
            </div>
            <div class="col-12 col-md-3 text-end">
                <a class="btn btn-success" data-bs-toggle="offcanvas" href="#addProduct" role="button"
                    aria-controls="offcanvasExample"><i class="bi bi-database-add"></i> New Box</a>
                <a class="btn btn-secondary" data-bs-toggle="offcanvas" href="#filter" role="button"
                    aria-controls="offcanvasExample"><i class="bi bi-filter"></i> Filter</a>
            </div>
            <div class="col-12 overflow-x-auto">
                <table class="table table-hover">
                    <thead class="table-head">
                        <td>#</td>
                        <td>Nickname</td>
                        <td>Type</td>
                        <td>Shelf</td>
                        <td>Created</td>
                        <td>Updated</td>
                    </thead>

                    <?php
                    foreach ($boxes as $v => $box):                   
                    ?>

                    <!-- Database Item -->
                    <tr data-bs-toggle="modal" data-bs-target="#box_<?php echo $box->id ?>">
                        <td>
                            <?php echo $box->id ?>
                        </td>
                        <!-- <td>
                            <?php echo $box->nickname ?>
                        </td> -->
                        <td>
                            <?php echo $box->nickname ?>
                        </td>
                        <td>
                            <?php echo((($box->box_type== '0' ) ? "mixed" : "non-mixed" )) ?>
                        </td>
                        <td>
                            <?php echo str_replace('_', ' ', $box->shelf) ?>
                        </td>
                        <td>
                            <?php echo App\Helpers\generalHelper::time_format($box->created_at) ?>
                        </td>
                        <td>
                            <?php echo App\Helpers\generalHelper::time_format($box->updated_at) ?>
                        </td>
                    </tr>
                    <div class="modal fade" id="box_<?php echo $box->id ?>" role="dialog" tabindex="-1"
                        aria-labelledby="box" aria-hidden="true">
                        <form method="POST" action="/manager/edit/box?box=<?php echo $box->id ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="d-block">
                                            <div class="fw-bold">
                                                Editing
                                            </div>
                                            <div class="modal-title fs-5" id="box">
                                                Box: #<?php echo number_format($box->id); ?>
                                            </div>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="nickname" class="form-control" id="nickname" placeholder="nickname" required value="<?php echo $box->nickname; ?>">
                                        <label for="nickname">Nickname</label>
                                    </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="box_type" id="type"
                                                aria-label="showing select">
                                                <option <?php echo(($box->box_type==0 ) ? "selected" : "" ) ?>
                                                    value="0">Mixed</option>
                                                <option <?php echo(($box->box_type==1 ) ? "selected" : "" ) ?>
                                                    value="1">Non-Mixed</option>
                                            </select>
                                            <label for="type">Type</label>
                                        </div>

                                        <div class="form-floating mb-3">

                                            <select class="form-select" name="shelf" id="shelf"
                                                aria-label="showing select">
                                                <option <?php echo(($box->shelf=='buffer' ) ? "selected" : "" ) ?>
                                                    value="buffer">Buffer</option>
                                                <option <?php echo(($box->shelf=='top_shelf' ) ? "selected" : "" ) ?>
                                                    value="top_shelf">Top Shelf</option>
                                                <option <?php echo(($box->shelf=='shelf_1' ) ? "selected" : "" ) ?>
                                                    value="shelf_1">Shelf #1</option>
                                                <option <?php echo(($box->shelf=='shelf_2' ) ? "selected" : "" ) ?>
                                                    value="shelf_2">Shelf #2</option>
                                                <option <?php echo(($box->shelf=='shelf_3' ) ? "selected" : "" ) ?>
                                                    value="shelf_2">Shelf #3</option>
                                                <option <?php echo(($box->shelf=='shelf_4' ) ? "selected" : "" ) ?>
                                                    value="shelf_2">Shelf #4</option>
                                            </select>
                                            <label for="shelf">Shelf</label>
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
                                        <a href="/manager/stock?box=<?php echo $box->id ?>"
                                            class="btn btn-secondary ms-auto">
                                            <i class="bi bi-eye-fill"></i>
                                            View Stock
                                        </a>
                                        <a href="/manager/delete/box?box=<?php echo $box->id ?>" class="btn btn-danger">
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

                    <?php endforeach ?>

                </table>
            </div>
        </div>
    </div>
    <!-- New Box -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="addProduct" aria-labelledby="addProductLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="addProductLabel">New Box</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form method="POST" action="/manager/add/box">
            <div class="form-floating mb-3">
                <input type="text" name="nickname" class="form-control" id="nickname" placeholder="nickname" required>
                    <label for="nickname">Nickname</label>
            </div>
            <div class="form-floating mb-3">
                    <select class="form-select" name="box_type" id="box_type" aria-label="Box Type">
                        <option value="0">Mixed Only</option>
                        <option value="1">Unmixed Only</option>
                    </select>
                    <label for="showingselect">Box Type</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="shelf" id="shelf" aria-label="Shelf">
                        <option value="buffer">Buffer</option>
                        <option value="top_shelf">Top Shelf</option>
                        <option value="shelf_1">Shelf #P1</option>
                        <option value="shelf_2">Shelf #P2</option>
                        <option value="shelf_3">Shelf #P3</option>
                        <option value="shelf_4">Shelf #P4</option>
                    </select>
                    <label for="showingselect">Shelf</label>
                </div>
                <!-- <div class="form-floating mb-3">
                   <input type="text" class="form-text" name='nickname' id='nickname' aria-label='nickname'>
                    <label for="showingselect">Nickname</label>
                </div> -->

                <button type="submit" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Add
                </button>
            </form>
        </div>
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="filter" aria-labelledby="filterLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="filterLabel">Table Filter</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form method="GET">
                <div class="form-floating mb-3">
                    <input type="text" name="search" class="form-control" id="searchinput" placeholder="Cool Kaftan" value="<?php echo $_REQUEST['search'] ?>">
                    <label for="searchinput">Search</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="order" id="orderselect" aria-label="order select">
                        <option <?php echo(($_REQUEST['order']=='' || $_REQUEST['order']=='id_desending' ) ? "selected" : "" ) ?> value="id_desending">ID (Desending)</option>
                        <option <?php echo(($_REQUEST['order']=='id_asending' ) ? "selected" : "" ) ?> value="id_asending">ID (Asending)</option>
                        <option <?php echo(($_REQUEST['order']=='created_desending' ) ? "selected" : "" ) ?> value="created_desending">Created (Desending)</option>
                        <option <?php echo(($_REQUEST['order']=='created_asending' ) ? "selected" : "" ) ?> value="created_asending">Created (Asending)</option>
                        <option <?php echo(($_REQUEST['order']=='updated_desending' ) ? "selected" : "" ) ?> value="updated_desending">Updated (Desending)</option>
                        <option <?php echo(($_REQUEST['order']=='updated_asending' ) ? "selected" : "" ) ?> value="updated_asending">Updated (Asending)</option>
                    </select>
                    <label for="orderselect">Order By</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="showing" id="showingselect" aria-label="showing select">
                        <option <?php echo(($_REQUEST['showing']=='' || $_REQUEST['showing']=='all' ) ? "selected" : "" ) ?> value="all">All</option>
                        <option <?php echo(($_REQUEST['showing']=='25') ? "selected" : "" ) ?> value="25">Max: 25</option>
                        <option <?php echo(($_REQUEST['showing']=='50') ? "selected" : "" ) ?> value="50">Max: 50</option>
                        <option <?php echo(($_REQUEST['showing']=='100') ? "selected" : "" ) ?> value="100">Max: 100</option>
                        <option <?php echo(($_REQUEST['showing']=='200') ? "selected" : "" ) ?> value="200">Max: 200</option>
                    </select>
                    <label for="showingselect">Showing</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="box_type" id="box_type" aria-label="Box Type">
                        <option <?php echo(($_REQUEST['box_type']=='' || $_REQUEST['box_type']=='all') ? "selected" : "" ) ?> value="all">All</option>
                        <option <?php echo(($_REQUEST['box_type']=='0') ? "selected" : "" ) ?> value="0">Mixed Only</option>
                        <option <?php echo(($_REQUEST['box_type']=='1') ? "selected" : "" ) ?> value="1">Unmixed Only</option>

                    </select>
                    <label for="showingselect">Box Type</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="shelf" id="shelf" aria-label="Shelf">
                        <option <?php echo(($_REQUEST['shelf']=='' || $_REQUEST['shelf']=='all' ) ? "selected" : "" ) ?> value="all">All</option>
                        <option <?php echo(($_REQUEST['shelf']=='buffer') ? "selected" : "" ) ?> value="buffer">Buffer</option>
                        <option <?php echo(($_REQUEST['shelf']=='top_shelf') ? "selected" : "" ) ?> value="top_shelf">Top Shelf</option>
                        <option <?php echo(($_REQUEST['shelf']=='shelf_1') ? "selected" : "" ) ?> value="shelf_1">Shelf #P1</option>
                        <option <?php echo(($_REQUEST['shelf']=='shelf_2') ? "selected" : "" ) ?> value="shelf_2">Shelf #P2</option>
                        <option <?php echo(($_REQUEST['shelf']=='shelf_3') ? "selected" : "" ) ?> value="shelf_3">Shelf #P3</option>
                        <option <?php echo(($_REQUEST['shelf']=='shelf_4') ? "selected" : "" ) ?> value="shelf_4">Shelf #P4</option>
                    </select>
                    <label for="showingselect">Shelf</label>
                </div>

                <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg"></i> Save</button>
            </form>
        </div>
    </div>
    <?php
    if($_GET['box'] != null)
    {
        echo("
        <script defer>
            window.onload = function(e){ 
                var modal = new window.bootstrap.Modal('#box_" . $_GET['box'] . "');
                modal.show();
            }
        </script>
        ");
    }  
?>
</body>