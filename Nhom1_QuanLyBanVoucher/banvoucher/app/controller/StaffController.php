<?php


class StaffController extends BaseController
{
    public function addStaff(){


        $name = isset($_POST['Fullname'])? $_POST['Fullname'] : '';
        $email = isset($_POST['Email'])? $_POST['Email'] : '';
        $phone = isset($_POST['Phone'])? $_POST['Phone'] : '';
        $user = isset($_POST['User'])? $_POST['User'] : '';
        $pwd = isset($_POST['Password'])? $_POST['Password'] : '';
        $gender = isset($_POST['Gender'])? $_POST['Gender'] : '';
        $birthday = isset($_POST['Birthday'])? $_POST['Birthday'] : '';
        $address = isset($_POST['Address'])? $_POST['Address'] : '';

        //Kiểm tra dữ liệu vào


        //


        if(!($name==='')){
            $model = new StaffModel();
            $model->add_Staff($name,$birthday,$gender,$user,$pwd,$phone,$email,$address);
            $login = new AccountController();
            $url='http://localhost:8888/banvoucher/staff/StaffList';
            header("Location: $url");
        } else {
            $this->render('addStaff.html');
        }

    }
    public function StaffList(){
        $model = new StaffModel();

        if(isset($_GET['delete'])){
            $id = $_GET['delete'];
            $data_staff = $model->get_by_id($id)['data'];
            if (count($data_staff)>0) {
                $model->delete_by_id($id);
            }

        }
        $staffs = $model->get_all()['data'];
        $soluong = count($staffs);
        $data = array('staffs'=> $staffs,'soluong'=>$soluong);
        $this->render('Staff.html',$data);

    }

    public function edit(){
        $model = new StaffModel();



        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $name = isset($_POST['Fullname'])? $_POST['Fullname'] : '';
            $email = isset($_POST['Email'])? $_POST['Email'] : '';
            $phone = isset($_POST['Phone'])? $_POST['Phone'] : '';
            $user = isset($_POST['User'])? $_POST['User'] : '';
            $pwd = isset($_POST['Password'])? $_POST['Password'] : '';
            $gender = isset($_POST['Gender'])? $_POST['Gender'] : '';
            $birthday = isset($_POST['Birthday'])? $_POST['Birthday'] : '';
            $address = isset($_POST['Address'])? $_POST['Address'] : '';

            if(!($name==='')){
                $model->edit_Staff($id,$name,$birthday,$gender,$user,$pwd,$phone,$email,$address);
                $this->StaffList();
                die();
            }

            $data_staff = $model->get_by_id($id)['data'];
            if (count($data_staff)>0) {
                $staff = $data_staff[0];

                $user= $model->get_tknv_by_id($id)['data'][0]['username'];
                $pwd = $model->get_tk_by_username($user)['data'][0]['matkhau'];
                $data = array('staff'=>$staff,'user'=>$user,'pwd'=>$pwd);
                $this->render('edit.html',$data);
            } else {
                $staffs = $model->get_all()['data'];
                $data = array('staffs'=> $staffs);
                $this->render('Staff.html',$data);
            }
        }
    }
}