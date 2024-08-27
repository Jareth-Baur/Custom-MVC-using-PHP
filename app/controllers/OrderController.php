<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'app/models/OrderModel.php';

class OrderController extends Controller
{
    // Method to list all orders
    public function list()
    {
        $orders = OrderModel::list();
        $this->view('orders', ['data' => $orders]);
    }

    // Method to get all orders by a specific customer
    public function ordersByCustomer($customerId)
    {
        //echo 'this is for test because nothing is showing on the web when I get order details per customer';

        // Retrieve the orders by customer
        $orders = OrderModel::ordersByCustomer($customerId);

        // Debugging output
        //var_dump($orders); // This should show the structure and content of $orders

        // Pass the data to the view
        $this->view('order_details', ['order' => $orders]);
    }


    // Method to get all products in a specific order
    public function orderProducts($productCode)
    {
        $orderProducts = OrderModel::orderProducts($productCode);
        $this->view('order_products', [
            'orderProducts' => $orderProducts,
            'productCode' => $productCode // Pass productCode to the view
        ]);
    }

}
