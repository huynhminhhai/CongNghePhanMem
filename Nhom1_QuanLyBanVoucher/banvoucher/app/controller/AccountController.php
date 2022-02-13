<?php


class AccountController extends BaseController
{
    public function login(){
        session_start();
        $error = '';
        if(isset($_POST['user'])){

            $user = $_POST['user'];
            $pass = $_POST['pass'];

            $model = new AccountModel();
            $data_user= $model->get_by_user($user);
            $test_user = $data_user['data'];
            if (count($test_user)<1)
            {
                $error = 'Quý khách đã nhập sai tài khoản hoặc mật khảu';
            } else {
                if ($pass === $test_user[0]['matkhau']){

                    $nhomtk = $test_user[0]['idnhomtaikhoan'];

                    $_SESSION['user']=$user;
                    $_SESSION['nhomtk']= $nhomtk;

                    $url='http://localhost:8888/banvoucher/';
                    header("Location: $url");
                }
            }
        }
        $data = array('pageTitle' => 'Đăng nhập');
        $this->render('login.html',$data);
    }
    public function logout(){
        session_start();
        session_destroy();
        $url='http://localhost:8888/banvoucher/account/login';
        header("Location: $url");
    }
    public function register(){

            $name = isset($_POST['Name'])? $_POST['Name'] : '';
            $email = isset($_POST['Email'])? $_POST['Email'] : '';
            $phone = isset($_POST['Phone'])? $_POST['Phone'] : '';
            $user = isset($_POST['User'])? $_POST['User'] : '';
            $pwd = isset($_POST['Password'])? $_POST['Password'] : '';
            $re_pwd = isset($_POST['rePassword'])? $_POST['rePassword'] : '';
            $address = isset($_POST['Address'])? $_POST['Address'] : '';

            //Kiểm tra dữ liệu vào


            //


            if(!($name==='')){

                $model = new AccountModel();
                $model->add_account($name,$email,$phone,$user,$pwd,$address);
                header('Location: login');
            } else {
                $this->render('register.html');
            }





    }
}