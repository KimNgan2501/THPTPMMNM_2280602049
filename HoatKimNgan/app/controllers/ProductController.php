<?php

require_once 'app/models/ProductModel.php';

class ProductController
{
    private $products = [];

    public function __construct()
    {
        //Giả sử chúng ta lưu trữ sản phẩm trong session để giữ lại khi làm mới trang session_start();
        session_start();
        if (isset($_SESSION['products'])) {
            $this->products = $_SESSION['products'];
        }
    }
    
    public function index()
    {
        $this->list();
    }

    public function list()
    {
        $products = $this->products;
        include 'app/views/product/list.php';
    }

    public function add()
    {
        $errors = [];

        if ($_SERVER[ 'REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];

            //Kiểm tra tên sản phẩm
            if (empty($name)) {
                $errors['name'] = 'Tên sản phẩm không được để trống';
            } elseif (strlen($name) < 3) {
                $errors['name'] = 'Tên sản phẩm phải có từ 10 đến 100 ký tự';
            }

            //Kiểm tra giá
            if (empty($price)) {
                $errors['price'] = 'Giá sản phẩm không được để trống';
            } 

            if (empty($errors)) {
                $id = count($this->products) + 1;
                $product = new ProductModel($id, $name, $description, $price);
                $this->products[] = $product;
                $_SESSION['products'] = $this->products;

                header('Location: /HoatKimNgan/Product/list');
                exit();
            }
        }
        include 'app/views/product/add.php';
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            foreach ($this->products as $key => $product){
                if ($product->getID() == $id){
                    $this->products[$key]->setName($_POST['name']);
                    $this->products[$key]->setDescription($_POST['description']);
                    $this->products[$key]->setPrice($_POST['price']);
                    break;
                }
            }
            $_SESSION['products'] = $this->products;

            header('Location: /HoatKimNgan/Product/list');
            exit();
         }
        foreach ($this->products as $product) {
            if ($product->getID() == $id) {
                include 'app/views/product/edit.php';
                return;
            }
        }
        die('Product not found');
    }
    public function delete($id)
    {
        foreach ($this->products as $key => $product) {
            if ($product->getID() == $id) {
                unset($this->products[$key]);
                break;
            }
        }  
        $this->products = array_values($this->products);
        $_SESSION['products'] = $this->products;
        
        header('Location: /HoatKimNgan/Product/list');
        exit();
    }
}
?>