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

        return require __DIR__.'/../../views/manager/boxes.php';
    }

    public static function addBox()
    {
        $box = new boxModel();

        $box = $box->create([
            'box_type' => $_REQUEST['box_type'],
            'shelf' => $_REQUEST['shelf']
        ]);
        
        return header("location: /manager/boxes");
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

        return header("location: /manager/boxes");
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
            'box_type' => intval($_REQUEST['box_type']),
            'shelf' => $_REQUEST['shelf']
        ]);
        print_r($_REQUEST);    
        print_r($box);
        die();
    }

    public static function stock()
    {
        authenticationHelper::isAuth('manager');

        $stock = new stockModel();

        // Filtering        
        managerController::basicFilter($_REQUEST, $stock);

        $stock = $stock->get();

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
