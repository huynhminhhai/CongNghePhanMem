<?php


class VoucherController extends BaseController
{
    public function add(){

        $idvoucher = isset($_POST['idvoucher'])?  $_POST['idvoucher'] : 0;
        $Vouchername = isset($_POST['Vouchername'])? $_POST['Vouchername'] : '';
        $VoucherDescription = isset($_POST['VoucherDescription'])? $_POST['VoucherDescription'] : '';
        $VoucherAmount = isset($_POST['VoucherAmount'])? $_POST['VoucherAmount'] : 0;
        $VoucherPrice = isset($_POST['VoucherPrice'])? $_POST['VoucherPrice'] : '';
        $VoucherStartDate = isset($_POST['VoucherStartDate'])? $_POST['VoucherStartDate'] : '';
        $VoucherEndDate = isset($_POST['VoucherEndDate'])? $_POST['VoucherEndDate'] : '';
        $VoucherStore = isset($_POST['VoucherStore'])? $_POST['VoucherStore'] : '';
        $VoucherCode = isset($_POST['VoucherCode'])? $_POST['VoucherCode'] : '';


        if ($idvoucher>0){
            if (!isset($_FILES["VoucherImg"]))
            {
                echo "Dữ liệu không đúng cấu trúc";
                die;
            }

            // Kiểm tra dữ liệu có bị lỗi không
            if ($_FILES["VoucherImg"]['error'] != 0)
            {
                echo "Dữ liệu upload bị lỗi";
                die;
            }
            $target_dir    = 'E:/xampp/htdocs/banvoucher/app/view/content/img/';
            $target_file   = $target_dir . basename($_FILES["VoucherImg"]["name"]);

            $allowUpload   = true;





            if ($allowUpload)
            {
                // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
                if (move_uploaded_file($_FILES["VoucherImg"]["tmp_name"], $target_file))
                {
                    $VoucherImg = basename($_FILES["VoucherImg"]["name"]);
                }
                else
                {
                    echo "Có lỗi xảy ra khi upload file.";
                }
            }
            else
            {
                echo "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
            }


            $model = new VoucherModel();
            $model->add_Voucher($idvoucher,$Vouchername,$VoucherDescription,$VoucherCode,$VoucherAmount,$VoucherPrice,$VoucherStartDate,$VoucherEndDate,$VoucherStore,$VoucherImg);
            header("Location: ../");
        }

        $this->render('addVoucher.html');
    }
    public function delete(){
        if (isset($_GET['id'])) {
            $model = new VoucherModel();
            $id = $_GET['id'];
            $model->delete_Voucher($id);
        }
        header("Location: ../");


    }

    public function edit(){
        if (isset($_GET['id'])){
            $model = new VoucherModel();
            $id = $_GET['id'];

            $idvoucher = isset($_POST['idvoucher'])?  $_POST['idvoucher'] : 0;
            $Vouchername = isset($_POST['Vouchername'])? $_POST['Vouchername'] : '';
            $VoucherDescription = isset($_POST['VoucherDescription'])? $_POST['VoucherDescription'] : '';
            $VoucherAmount = isset($_POST['VoucherAmount'])? $_POST['VoucherAmount'] : 0;
            $VoucherPrice = isset($_POST['VoucherPrice'])? $_POST['VoucherPrice'] : '';
            $VoucherStartDate = isset($_POST['VoucherStartDate'])? $_POST['VoucherStartDate'] : '';
            $VoucherEndDate = isset($_POST['VoucherEndDate'])? $_POST['VoucherEndDate'] : '';
            $VoucherStore = isset($_POST['VoucherStore'])? $_POST['VoucherStore'] : '';
            $VoucherCode = isset($_POST['VoucherCode'])? $_POST['VoucherCode'] : '';

            if(!($Vouchername==='')){
                $model->edit_Voucher($id,$idvoucher,$Vouchername,$VoucherDescription,$VoucherCode,$VoucherAmount,$VoucherPrice,$VoucherStartDate,$VoucherEndDate,$VoucherStore);
                header('Location: ../');
                die();
            }

            $voucher = $model->get_by_id($id)['data'][0];
            $data = array('voucher'=>$voucher);
            $this->render('editVoucher.html',$data);
            die();
        }
        header('Location: ../');

    }
}