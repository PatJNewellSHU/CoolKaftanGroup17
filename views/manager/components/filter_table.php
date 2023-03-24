<!-- Filter   -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="filter" aria-labelledby="filterLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="filterLabel">Table Filter</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form method="GET">
                <div class="form-floating mb-3">
                    <input type="text" name="search" class="form-control" id="searchinput" placeholder="Cool Kaftan">
                    <label for="searchinput">Search</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="order" id="orderselect" aria-label="order select">
                        <option selected value="desending">Desending</option>
                        <option value="asending">Asending</option>
                    </select>
                    <label for="orderselect">Order By</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="showing" id="showingselect" aria-label="showing select">
                        <option selected value="all">All</option>
                        <option value="25">Max: 25</option>
                        <option value="50">Max: 50</option>
                        <option value="100">Max: 100</option>
                        <option value="200">Max: 200</option>
                    </select>
                    <label for="showingselect">Showing</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>