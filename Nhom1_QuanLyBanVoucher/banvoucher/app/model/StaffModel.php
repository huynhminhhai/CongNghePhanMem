<?php


class StaffModel extends BaseModel
{

    function get_all()
    {
        $sql = "select * from nhanvien";
        return $this->query($sql);
    }

    function get_by_id($id)
    {
        $sql = "select * from nhanvien where id = $id";
        return $this->query($sql);
    }

    function get_by_email($email){
        $sql = "select * from nhanvien where email = '$email'";
        return $this->query($sql);
    }

    function add_Staff($name,$birthday,$gender,$user,$pwd,$phone,$email,$address){

        $sql_nhanvien = "insert into nhanvien(hoten,ngaysinh,gioitinh,dienthoai,email,diachi,active)
                        values ('$name','$birthday','$gender','$phone','$email','$address',1)";
        $this->insert_query($sql_nhanvien);
        $data=$this->get_by_email($email);
        $data = $data['data'][0]['id'];
        $id_staff = $data;
        $date = date('Y-m-d');
        $sql_tk = "insert into taikhoan(username,matkhau,idnhomtaikhoan,active)
                values ('$user','$pwd',2,1)";
        $sql_tknv ="insert into taikhoannv(username,idnhanvien,ngaytao,active)
                values ('$user',$id_staff,'$date',1)";
        $this->insert_query($sql_tk);
        $this->insert_query($sql_tknv);

    }

    function delete_by_id($id){
        $delete_nv = "delete from nhanvien where id=$id";
        $delete_tknv = "delete from taikhoannv where idnhanvien = $id";
        $sql_tk = "select * from taikhoannv where idnhanvien = $id";
        $data_tk = $this->query($sql_tk)['data'];
        $user = $data_tk['0']['username'];
        $delete_tk = "delete from taikhoan where username = '$user'";
        $this->insert_query($delete_nv);
        $this->insert_query($delete_tknv);
        $this->insert_query($delete_tk);
    }

    function get_tk_by_username($user){
        $sql = "select * from taikhoan where username ='$user'";
        return $this->query($sql);
    }

    function get_tknv_by_id($id){
        $sql = "select * from taikhoannv where idnhanvien = $id";
        return $this->query($sql);
    }

    function edit_Staff($id,$name,$birthday,$gender,$user,$pwd,$phone,$email,$address){

        $sql_nhanvien = "update nhanvien set hoten='$name',ngaysinh='$birthday',gioitinh='$gender',dienthoai='$phone',email='$email',diachi='$address'
                        where id=$id ";
        $this->insert_query($sql_nhanvien);
        $old_user= $this->get_tknv_by_id($id)['data'][0]['username'];
        $date = date('Y-m-d');
        $sql_tk = "update taikhoan set username = '$user', matkhau = '$pwd' where username = '$old_user'";
        $sql_tknv ="update taikhoannv set username = '$user' where idnhanvien = $id ";
        $this->insert_query($sql_tk);
        $this->insert_query($sql_tknv);

    }

}