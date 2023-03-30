<?php

namespace App\Controllers;

use App\Helpers\authenticationHelper;
use App\Helpers\dbHelper;

class managerController {

    
function MoveToBuffer($conn, $boxID) {

    $database = new dbHelper();

    $row = $database->query("SELECT * FROM box WHERE box_id = ?", true);

    $result = $database->add('buffer', ['product_id', 'number_of_items'], [$row["product_id"], $row["units"]]);
    
    var_dump($result); // idk what to do with this lol
}

    public static function boxes()
    {
        authenticationHelper::isAuth('manager');

        return require __DIR__.'/../../views/manager/boxes.php';
    }

    public static function stock()
    {
        authenticationHelper::isAuth('manager');

        return require __DIR__.'/../../views/manager/stock.php';
    }

    public static function performance()
    {
        authenticationHelper::isAuth('manager');

        return require __DIR__.'/../../views/manager/performance.php';
    }

    public static function products()
    {
        authenticationHelper::isAuth('manager');
    
        $database = new dbHelper();
        $items = $database->read('product', '*');

        return require __DIR__.'/../../views/manager/products.php';
  
    }

    public static function addItem()
    {
        authenticationHelper::isAuth('manager');
        if(isset($_POST['submit'])) {

            $prodName = $_POST['prodName'];
            $prodDetail = $_POST['prodDetail'];
            $prodSize = $_POST['prodSize'];
            $prodPrice = $_POST['prodPrice'];

            $database = new dbHelper();
            $columns = ['product_Name', 'product_Detail', 'product_Size', 'product_Price'];
            $data = ["'".$prodName."'", "'".$prodDetail."'", "'".$prodSize."'", "'".$prodPrice."'"];
            $database->add('product', $columns, $data);
 
            if($added = false) {
                header("location: /manager/all?error=Something went wrong, try again");
                exit();
            }
            else{
                header("location: /manager/all");
            }
            
        }
    }

    public static function deleteItem()
    {
        authenticationHelper::isAuth('manager');
        if (isset($_POST['delete'])) {

            $prodName = $_POST['prodName'];
            $prodDetail = $_POST['prodDetail'];
            $prodSize = $_POST['prodSize'];
            $prodPrice = $_POST['prodPrice'];

            $database = new dbHelper();
            $columns = ['product_Name', 'product_Detail', 'product_Size', 'product_Price'];
            $data = ["'" . $prodName . "'", "'" . $prodDetail . "'", "'" . $prodSize . "'", "'" . $prodPrice . "'"];
            $database->delete('product', $columns, $data);

        }
    }

    /*
    ==FIN==
    Copied the addItem code from above.
    push#2
    */
    public static function addBox()
    {
        if(isset($_POST['submit'])) {

            $shelfID = $_POST["shelfID"];
            $prodID = $_POST["productID"];
            

            $added = AddBoxes(connect(), $shelfID, $prodID);
 
            if($added = false) {
                header("location: /manager?error=Something went wrong, try again");
                exit();
            }
            else{
                header("location: /manager");
            }
            
        }
    }

    public static function addMixedBox()
    {
        authenticationHelper::isAuth('manager');
        $selector = explode('/', $request)[3];

        if(intval($selector) > 4)
        {
            header("location: /404");
        }

        $database = new dbHelper();
        $results = $database->query("SELECT * FROM box WHERE shelf_id = ".$selector+1, true);

        return require __DIR__.'/../../views/manager/p/p'.$selector.'.php';
    }

        
}
