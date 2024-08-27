<?php
require_once 'app/models/ProductModel.php';

class ProductController extends Controller
{
    // Method to list all products
    public function listProducts()
    {
        $products = ProductModel::list();
        $this->view('products', ['data' => $products]);
    }

    // Method to get a product by its ID
    public function productById($id)
    {
        $product = ProductModel::productById($id);
        $this->view('product_details', ['product' => $product]);
    }

    // Method to get products by product line/category
    public function productsByProductline($productLine)
    {
        $products = ProductModel::productByProductline($productLine);
        $this->view('product_by_line', ['products' => $products]);
    }

}
