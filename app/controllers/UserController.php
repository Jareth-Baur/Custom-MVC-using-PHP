<?php
require_once 'app/models/UserModel.php';
class UserController extends Controller
{
    public function index()
    {
        // Handle the 'user' route (no parameters)
        $this->view('user');
    }

    public function userbyID($id)
    {
        // Handle the 'user/:id' route with the $id parameter
        $user = UserModel::getUserById($id);
        $data = [
            'users' => $user

        ];
        echo json_encode($data);
       /*  $this->view('userlist', ['users' => $user]); */
    }
    public function list_of_users() {
        $user = UserModel::userList();
        $data = [
            'count' => count($user),
            'users' => $user
        ];
        // echo json_encode($data);
      $this->view('userlist', ['data' => $data]); 
    }

 
}

