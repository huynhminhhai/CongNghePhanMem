<?php


class CartController extends BaseController
{
    public function buy(){
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            $model = new VoucherModel();
            $voucher = $model->get_by_id($id)['data'][0];
            $data = array('voucher'=>$voucher);
            session_start();
            if (isset($_SESSION)){
                if (isset($_SESSION['user'])){
                    $data['user']= $_SESSION['user'];
                }
                if (isset($_SESSION['nhomtk'])){
                    $data['nhomtk']= $_SESSION['nhomtk'];
                }
            }
            $this->render('buy.html',$data);
        } else {
            header("Location: ../");
        }
    }
    public function confirm(){
        session_start();
        if (isset($_SESSION['user'])){
            if (isset($_SESSION['user'])){
                $user= $_SESSION['user'];

            }
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $model = new VoucherModel();
                $voucher = $model->get_by_id($id)['data'][0];
                $id_voucher = $voucher['id'];
                $giaban = $voucher['giaban'];
                $data = array('voucher' => $voucher);
                $kh_model=new AccountModel();
                $data_user= @$kh_model->get_infokh_by_user($user)['data'][0];
                $id_kh = $data_user['idkhachhang'];
                $sdt = $data_user['dienthoai'];
                $date = date('Y-m-d');
                $cart_model= new CartModel();
                $cart_model->addCart($date,$id_kh,$id,$sdt);
                $model->buy_voucher($id);
                $cart_data = $cart_model->latest_cart($id_kh)['data']['0'];
                $id_cart=$cart_data['id'];
                $cart_model->addCartDes($id_cart,$id_voucher,$giaban);
            }
            $data['user']= $user;
            if (isset($_SESSION['nhomtk'])){
                $data['nhomtk']= $_SESSION['nhomtk'];
            }

            $this->render('confirm.html', $data);

        } else {
            header("Location: ../");
        }

    }

    function history(){
        session_start();
        if (isset($_SESSION)){
            if (isset($_SESSION['user'])){
                $data['user']= $_SESSION['user'];

            }
            if (isset($_SESSION['nhomtk'])) {
                $data['nhomtk'] = $_SESSION['nhomtk'];
                if ($data['nhomtk'] == 3) {
                    $account_model = new AccountModel();
                    $id_kh = $account_model->get_infokh_by_user($data['user'])['data'][0]['idkhachhang'];
                    $cart_model = new CartModel();
                    $list_card = $cart_model->get_list_cart($id_kh)['data'];
                    $data['history'] = $list_card;
                    $this->render('history.html',$data);
                }
            }
        }
    }
}