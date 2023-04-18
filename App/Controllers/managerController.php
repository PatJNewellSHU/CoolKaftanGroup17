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

        // Filtering        
        if(!(isset($_REQUEST['search']) && $_REQUEST['search'] != null))
        {
            if(isset($_REQUEST['box_type']) && $_REQUEST['box_type'] != 'all')
            {
                $box->where('box_type', '=', intval($_REQUEST['box_type']));
            }

            if(isset($_REQUEST['shelf']) && $_REQUEST['shelf'] != 'all')
            {
                $box->where('shelf', '=', $_REQUEST['shelf']);
            }
        }

        managerController::basicFilter($_REQUEST, $box);

        $boxes = $box->get();

        if(!$_REQUEST['message'])
        {

            if($boxes == null)
            {
                $_REQUEST['message'] = 'Table is empty.';
            } else {
                $_REQUEST['message'] = \number_format(count($boxes)) . ' items loaded from database.';
            }
        }
        return require __DIR__.'/../../views/manager/boxes.php';
    }

    public static function addBox()
    {
        $box = new boxModel();

        $box = $box->create([
            'nickname' => $_REQUEST['nickname'],
            'box_type' => $_REQUEST['box_type'],
            'shelf' => $_REQUEST['shelf']
        ]);
        
        return header("location: /manager/boxes?message=New box added.");
    }

    public static function deleteBox()
    {
        if(!isset($_REQUEST['box']))
        {
            return header("location: /manager/boxes");
        }

        $box = new boxModel();

        $box = $box->find($_REQUEST['box']);
        $box->delete();

        return header("location: /manager/boxes?message=Box deleted.");
    }

    public static function editBox()
    {
        if(!isset($_REQUEST['box']))
        {
            return header("location: /manager/boxes");
        }

        $box = new boxModel();

        $box = $box->find($_REQUEST['box']);
        $box = $box->edit([
            'nickname' => $_REQUEST['nickname'],
            'box_type' => intval($_REQUEST['box_type']),
            'shelf' => $_REQUEST['shelf']
        ]);
        
        return header("location: /manager/boxes?box=".$_REQUEST['box']."&message=Changes saved.");
    }

    public static function stock()
    {
        authenticationHelper::isAuth('manager');

        $stock = new stockModel();
        $boxes = new boxModel();
        $products = new productModel();
        
        $boxes = $boxes->get();
        $products = $products->get();

        // Filtering        
        managerController::basicFilter($_REQUEST, $stock);

        if(isset($_REQUEST['box']) && $_REQUEST['box'] != null)
        {
            $stock = $stock->where('box_id', '=', intval($_REQUEST['box']));
        }

        if(isset($_REQUEST['product']) && $_REQUEST['product'] != null)
        {
            $stock = $stock->where('product_id', '=', intval($_REQUEST['product']));
        }

        $stock = $stock->get();


        if(!$_REQUEST['message'])
        {
            if($stock == null)
            {
                $_REQUEST['message'] = 'Table is empty.';
            } else {
                $_REQUEST['message'] = \number_format(count($boxes) + count($stock) + count($products)) . ' items loaded from database.';
            }
        }

        return require __DIR__.'/../../views/manager/stock.php';
    }

    public static function addStock()
    {
        $stock = new stockModel();

        $stock = $stock->create([
            'product_id' => $_REQUEST['product'],
            'box_id' => $_REQUEST['box']
        ]);
        
        return header("location: /manager/stock?message=New stock added.");   
    }

    public static function deleteStock()
    {
        if(!isset($_REQUEST['stock']))
        {
            return header("location: /manager/stock");
        }

        $stock = new stockModel();

        $stock = $stock->find($_REQUEST['stock']);
        $stock->delete();

        return header("location: /manager/stock?message=Stock deleted.");
    }

    public static function editStock()
    {
        if(!isset($_REQUEST['stock']))
        {
            return header("location: /manager/stock");
        }

        $stock = new stockModel();

        $stock = $stock->find($_REQUEST['stock']);
        $stock = $stock->edit([
            'product_id' => $_REQUEST['product'],
            'box_id' => $_REQUEST['box']
        ]);
        
        return header("location: /manager/stock?stock=".$_REQUEST['stock']."&message=Changes saved.");   
    }

    public static function performance()
    {
        authenticationHelper::isAuth('manager');

        $performance = new performanceModel();
        $products = new productModel();
        $products = $products->get();

        managerController::basicFilter($_REQUEST, $performance);

        $performance = $performance->get();

        if(!$_REQUEST['message'])
        {
            if($performance == null)
            {
                $_REQUEST['message'] = 'Table is empty.';
            } else {
                $_REQUEST['message'] = \number_format(count($performance)) . ' performance loaded from database.';
            }
        }

        return require __DIR__.'/../../views/manager/performance.php';
    }

    public static function addPerformance()
    {
        $performance = new performanceModel();

        $performance = $performance->create([
            'product_id' => intval($_REQUEST['product'])
        ]);

        return header("location: /manager/performance?message=New performance added."); 
    }

    public static function editPerformance()
    {
        if(!isset($_REQUEST['performance']))
        {
            return header("location: /manager/performance");
        }

        $performance = new performanceModel();

        $performance = $performance->find(intval($_REQUEST['performance']));
        $performance = $performance->edit([
            'product_id' => intval($_REQUEST['product']),
        ]);
        
        return header("location: /manager/performance?performance=".$_REQUEST['performance']."&message=Changes saved.");   
    }

    public static function deletePerformance()
    {
        if(!isset($_REQUEST['performance']))
        {
            return header("location: /manager/performance");
        }

        $performance = new performanceModel();

        $performance = $performance->find($_REQUEST['performance']);
        $performance->delete();

        return header("location: /manager/performance?message=Performance deleted.");
    }

    public static function products()
    {
        authenticationHelper::isAuth('manager');

        $product = new productModel();

        managerController::basicFilter($_REQUEST, $product);

        $products = $product->get();

        if(!$_REQUEST['message'])
        {
            if($products == null)
            {
                $_REQUEST['message'] = 'Table is empty.';
            } else {
                $_REQUEST['message'] = \number_format(count($products)) . ' products loaded from database.';
            }
        }

        return require __DIR__.'/../../views/manager/products.php';
  
    }

    public static function addProduct()
    {
        $product = new productModel();

        $product = $product->create([
            'name' => $_REQUEST['name'],
            'colour' => $_REQUEST['colour'],
            'size' => $_REQUEST['size'],
            'barcode' => $_REQUEST['barcode'],
            'price' => $_REQUEST['price'],
        ]);
        
        return header("location: /manager/products?message=New product added."); 
    }

    public static function editProduct()
    {
        if(!isset($_REQUEST['product']))
        {
            return header("location: /manager/products");
        }

        $box = new productModel();

        $box = $box->find($_REQUEST['product']);
        $box = $box->edit([
            'name' => $_REQUEST['name'],
            'colour' => $_REQUEST['colour'],
            'size' => $_REQUEST['size'],
            'barcode' => $_REQUEST['barcode'],
            'price' => $_REQUEST['price'],
        ]);
        
        return header("location: /manager/products?product=".$_REQUEST['product']."&message=Changes saved.");
    }

    public static function deleteProduct()
    {
        if(!isset($_REQUEST['product']))
        {
            return header("location: /manager/products");
        }

        $product = new productModel();

        $product = $product->find($_REQUEST['product']);
        $product->delete();

        return header("location: /manager/products?message=Product deleted.");
    }

    public static function basicFilter($request, $model)
    {
        if($request)
        {
            if(isset($request['search']) && $request['search'] != '')
            {
                foreach ($model->columns as $c => $col) {
                    if($col != 'id')
                    {
                        if($c == 1)
                        {
                            $model = $model->where($col, '=', $_REQUEST['search']);
                        } else {
                            $model = $model->orWhere($col, '=', $_REQUEST['search']);
                        }
                    }
                }
            }
            
            if(isset($request['order']))
            {
                if(\str_contains($request['order'], 'id'))
                {
                    // order by id ...
                    if(\str_contains($request['order'], 'asending'))
                    {
                        $model = $model->orderBy('id', 'ASC');
                    }

                    if(\str_contains($request['order'], 'desending'))
                    {
                        $model = $model->orderBy('id', 'DESC');
                    }
                }

                if(\str_contains($request['order'], 'created'))
                {
                    // order by date ...
                    if(\str_contains($request['order'], 'asending'))
                    {
                        $model = $model->orderBy('created_at', 'ASC');
                    }

                    if(\str_contains($request['order'], 'desending'))
                    {
                        $model = $model->orderBy('created_at', 'DESC');
                    }
                }

                if(\str_contains($request['order'], 'updated'))
                {
                    // order by date ...
                    if(\str_contains($request['order'], 'asending'))
                    {
                        $model = $model->orderBy('updated_at', 'ASC');
                    }

                    if(\str_contains($request['order'], 'desending'))
                    {
                        $model = $model->orderBy('updated_at', 'DESC');
                    }
                }
            }

            if(isset($request['showing']))
            {
                if($request['showing'] != 'all')
                {
                    $model = $model->limit(intval($request['showing']));
                }
            }

        }
    }        
}
