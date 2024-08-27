<?php
require_once 'app/models/ProductModel.php';
class APIController extends Controller
{
    public function getProducts(){
        $products = ProductModel::list();
        echo json_encode($products);
    }
    public function getProductByID($id){
        $product = ProductModel::productById($id);
        echo json_encode($product);
    }

    public function getProductbyCat($cat){
        $product = ProductModel::productbyCategory($cat);
        echo json_encode($product);
    }

   
}
