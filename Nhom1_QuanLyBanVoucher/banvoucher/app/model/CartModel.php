<?php


class CartModel extends BaseModel
{

    function get_all()
    {
        // TODO: Implement get_all() method.
    }

    function get_by_id($id)
    {
        // TODO: Implement get_by_id() method.
    }
    function addCart($ngaydathang,$idkhachhang,$idvoucher,$sdt){
        $sql="insert into donhang(ngaydathang,idkhachhang,idvoucher,sdt,xacnhanthanhtoan) values
('$ngaydathang',$idkhachhang,$idvoucher,'$sdt',1)";
        $this->insert_query($sql);
    }

    function addCartDes($iddonhang,$idvoucher,$giaban){
        $sql =  "insert into chitietdonhang(iddonhang,idvoucher,soluong,giaban,thanhtien)
values ($iddonhang,$idvoucher,1,$giaban,$giaban)";
        $this->insert_query($sql);
    }

    function latest_cart($idkhachhang){
        $sql = "select * from donhang where idkhachhang = $idkhachhang order by donhang.id desc limit 1";
        return $this->query($sql);
    }

    function get_list_cart_limit($id_kh,$limit){
        $sql = "SELECT ct.id , ct.iddonhang, ct.idvoucher, ct.giaban, dh.idkhachhang, dh.ngaydathang, vc.ten,vc.hinhanh
 FROM chitietdonhang ct, donhang dh, voucher vc 
 WHERE ct.iddonhang = dh.id AND ct.idvoucher = vc.id AND idkhachhang= $id_kh
 ORDER BY iddonhang DESC  limit $limit";
        return $this->query($sql);
    }

    function get_list_cart($id_kh){
        $sql = "SELECT ct.id , ct.iddonhang, ct.idvoucher, ct.giaban, dh.idkhachhang, dh.ngaydathang, vc.ten,vc.hinhanh
 FROM chitietdonhang ct, donhang dh, voucher vc 
 WHERE ct.iddonhang = dh.id AND ct.idvoucher = vc.id AND idkhachhang= $id_kh
 ORDER BY iddonhang DESC";
        return $this->query($sql);
    }

    function get_revenue_list(){
        $sql = "SELECT lvc.ten as 'LoaiVoucher' , SUM(ct.giaban) AS 'TongDoanhThu' ,SUM(ct.soluong) AS 'SoLuong'
FROM chitietdonhang ct, donhang dh, voucher vc , loaivoucher lvc 
WHERE ct.iddonhang = dh.id AND ct.idvoucher = vc.id AND vc.idvoucher = lvc.id 
GROUP BY lvc.ten";
        return $this->query($sql);

    }

    function get_total_revenue(){
        $sql = "SELECT SUM(ct.giaban) AS 'TongDoanhThu'
FROM chitietdonhang ct, donhang dh, voucher vc , loaivoucher lvc 
WHERE ct.iddonhang = dh.id AND ct.idvoucher = vc.id AND vc.idvoucher = lvc.id
";
        return $this->query($sql);
    }
}