<?php
require_once 'app/models/CustomerModel.php';

class CustomerController extends Controller
{
    public function listCustomer(): void
    {
        $customer = CustomerModel::list();
        $this->view('customer', ['customers' => $customer]);
    }

    // Method to get a customer by their ID
    public function customerById($id): void
    {
        $customer = CustomerModel::customerById($id);
        $this->view('customer_details', ['customer' => $customer]);
    }
}
