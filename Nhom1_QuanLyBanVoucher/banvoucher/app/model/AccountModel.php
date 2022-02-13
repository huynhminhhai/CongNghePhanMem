<?php


class AccountModel extends BaseModel
{

    function get_all()
    {
        // TODO: Implement get_all() method.
    }

    function get_by_id($id)
    {
        // TODO: Implement get_by_id() method.
    }
    function get_by_user($user)
    {
        $sql = "select * from taikhoan where username = '$user'";
        return $this->query($sql);
    }

    function get_infokh_by_user($user){
        $sql = "SELECT * FROM taikhoankh tkkh, khachhang kh 
                WHERE tkkh.idkhachhang = kh.idkhachhang AND username = '$user'";
        return $this->query($sql);

    }

    function get_customer_by_email($email){
        $sql = "select * from khachhang where email = '$email'";
        return $this->query($sql);
    }

    function add_customer($name,$phone,$email,$address){
        $sql = "insert into khachhang(tenkhachhang,dienthoai,email,diachi)
                values ('$name','$phone','$email','$address')";
        $this->insert_query($sql);
    }

    function add_account($name,$email,$phone,$user,$pwd,$address){
        $this->add_customer($name,$phone,$email,$address);
        $sql="insert into taikhoan(username,matkhau,idnhomtaikhoan,active)
        values ('$user','$pwd',3,1)";
        $this->insert_query($sql);
        $data = $this->get_customer_by_email($email);
        $data= $data['data'][0]['idkhachhang'];
        $id_user= $data;
        $date = date("Y-m-d");

        $sql_kh="insert into taikhoankh(username,idkhachhang,ngaytao,active)
                values ('$user',$id_user,'$date',1)    ";
        $this->insert_query($sql_kh);
    }

}