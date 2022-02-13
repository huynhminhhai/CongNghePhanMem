<?php


class VoucherModel extends BaseModel
{

    function get_all()
    {
        // TODO: Implement get_all() method.
        $sql = 'select * from voucher';
        return $this->query($sql);
    }

    function get_by_id($id)
    {
        $sql = 'select * from voucher where id ='.$id;
        return $this->query($sql);
    }

    function get_type_by_id_type($id_type){
        $sql = "select * from loaivoucher where id = $id_type";
        return $this->query($sql);
    }

    function get_all_type(){
        $sql = 'select * from loaivoucher';
        return $this->query($sql);
    }

    function get_all_by_type($id)
    {
        // TODO: Lấy danh sách voucher theo loại
        $sql = 'select * from voucher where idvoucher ='.$id;
        return $this->query($sql);
    }

    function add_Voucher($idvoucher,$Vouchername,$VoucherDescription,$VoucherCode,$VoucherAmount,$VoucherPrice,$VoucherStartDate,$VoucherEndDate,$VoucherStore,$VoucherImg){

        $sql = "insert into voucher(idvoucher,ten,mota,code,soluong,hinhanh,giaban,ngaybatdau,ngayketthuc,cuahang)
                values ($idvoucher,'$Vouchername','$VoucherDescription','$VoucherCode',$VoucherAmount,'$VoucherImg',$VoucherPrice,'$VoucherStartDate','$VoucherEndDate','$VoucherStore')
                 ";
        $this->insert_query($sql);

    }

    function edit_Voucher($id,$idvoucher,$Vouchername,$VoucherDescription,$VoucherCode,$VoucherAmount,$VoucherPrice,$VoucherStartDate,$VoucherEndDate,$VoucherStore){
        $sql = "update voucher set idvoucher = $idvoucher,ten = '$Vouchername', mota='$VoucherDescription',code='$VoucherCode',soluong=$VoucherAmount,giaban=$VoucherPrice
,ngaybatdau='$VoucherStartDate',ngayketthuc='$VoucherEndDate',cuahang='$VoucherStore' where id = $id";
        $this->insert_query($sql);

    }

    function delete_Voucher($id){
        $sql="delete from voucher where id = $id";
        $this->insert_query($sql);
    }

    function buy_voucher($id){
        $amount= $this->get_by_id($id)['data'][0]['soluong'];
        $amount = $amount - 1;
        $sql = "update voucher set soluong = $amount where id = $id";
        $this->insert_query($sql);
    }
}