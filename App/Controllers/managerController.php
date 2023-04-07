<?php

namespace App\Controllers;

use App\Helpers\authenticationHelper;
use App\Helpers\dbHelper;
use App\Models\productModel;
use App\Models\boxModel;
use App\Models\performanceModel;
use App\Models\stockModel;
use App\Models\userModel;
class managerController {

    public static function boxes()
    {
        authenticationHelper::isAuth('manager');

        $box = new boxModel();
        $boxes = $box->get();

        // TODO: Figure out filtering

        return require __DIR__.'/../../views/manager/boxes.php';
    }

    public static function stock()
    {
        authenticationHelper::isAuth('manager');

        $stock = [
            0 => [
                'id' => 1,
                'product_name' => 'Blue kaftan', //Get product name instead of id
                'product_id' => 1,
                'box_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
        ];

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
    
        $products = [
            0 => [
                'id' => 1,
                'name' => 'Blue Kaftan',
                'colour' => 'Blue',
                'size' => 'XL',
                'price' => 10.43,
                'units' => 12, // Calculated from amount of stock
                'barcode' => '12345678',
                'created_at'=> date("Y-m-d H:i:s"),
                'updated_at'=> date("Y-m-d H:i:s")
            ]
        ];

        return require __DIR__.'/../../views/manager/products.php';
  
    }

    // No longer needed with new models CRUD, sorry.

    // public static function addItem()
    // {
    //     authenticationHelper::isAuth('manager');
    //     if(isset($_POST['submit'])) {

    //         $prodName = $_POST['prodName'];
    //         $prodDetail = $_POST['prodDetail'];
    //         $prodSize = $_POST['prodSize'];
    //         $prodPrice = $_POST['prodPrice'];

    //         $database = new dbHelper();
    //         $columns = ['product_Name', 'product_Detail', 'product_Size', 'product_Price'];
    //         $data = ["'".$prodName."'", "'".$prodDetail."'", "'".$prodSize."'", "'".$prodPrice."'"];
    //         $database->add('product', $columns, $data);
 
    //         if($added = false) {
    //             header("location: /manager/all?error=Something went wrong, try again");
    //             exit();
    //         }
    //         else{
    //             header("location: /manager/all");
    //         }
            
    //     }
    // }

    // public static function deleteItem()
    // {
    //     authenticationHelper::isAuth('manager');
    //     if (isset($_POST['delete'])) {

    //         $prodName = $_POST['prodName'];
    //         $prodDetail = $_POST['prodDetail'];
    //         $prodSize = $_POST['prodSize'];
    //         $prodPrice = $_POST['prodPrice'];

    //         $database = new dbHelper();
    //         $columns = ['product_Name', 'product_Detail', 'product_Size', 'product_Price'];
    //         $data = ["'" . $prodName . "'", "'" . $prodDetail . "'", "'" . $prodSize . "'", "'" . $prodPrice . "'"];
    //         $database->delete('product', $columns, $data);

    //     }
    // }

    // /*
    // ==FIN==
    // Copied the addItem code from above.
    // push#2
    // */
    // public static function addBox()
    // {
    //     if(isset($_POST['submit'])) {

    //         $shelfID = $_POST["shelfID"];
    //         $prodID = $_POST["productID"];
            

    //         $added = AddBoxes(connect(), $shelfID, $prodID);
 
    //         if($added = false) {
    //             header("location: /manager?error=Something went wrong, try again");
    //             exit();
    //         }
    //         else{
    //             header("location: /manager");
    //         }
            
    //     }
    // }

    // public static function addMixedBox()
    // {
    //     authenticationHelper::isAuth('manager');
    //     $selector = explode('/', $request)[3];

    //     if(intval($selector) > 4)
    //     {
    //         header("location: /404");
    //     }

    //     $database = new dbHelper();
    //     $results = $database->query("SELECT * FROM box WHERE shelf_id = ".$selector+1, true);

    //     return require __DIR__.'/../../views/manager/p/p'.$selector.'.php';
    // }

        
}
