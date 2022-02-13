<?php


class HomeController extends BaseController
{
    public function index(){
        session_start();
        $model = new VoucherModel();
        $type = $model->get_all_type()['data'];

        if(isset($_GET['view'])){
            $id_type= $_GET['view'];
            $vouchers = $model->get_all_by_type($id_type)['data'];
        } else{
            $vouchers = $model->get_all()['data'];
        }

        $data= array('title' => 'Trang Chủ', 'type' => $type ,'vouchers' => $vouchers);

        if (isset($_SESSION)){
            if (isset($_SESSION['user'])){
                $data['user']= $_SESSION['user'];

            }
            if (isset($_SESSION['nhomtk'])){
                $data['nhomtk']= $_SESSION['nhomtk'];
                if($data['nhomtk']==3){
                    $account_model = new AccountModel();
                    $id_kh= $account_model->get_infokh_by_user($data['user'])['data'][0]['idkhachhang'];
                    $cart_model=new CartModel();
                    $list_card = $cart_model->get_list_cart_limit($id_kh,4)['data'];
                    $data['history'] = $list_card;
                }
            }
        }
        $this->render('index.html', $data);

    }
}

