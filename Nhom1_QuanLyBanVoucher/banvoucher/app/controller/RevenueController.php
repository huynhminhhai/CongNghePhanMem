<?php


class RevenueController extends BaseController
{
    public function TongDoanhThu(){
        $model = new CartModel();
        $list_revenue = $model->get_revenue_list()['data'];
        $data = array('list_revenue'=>$list_revenue);
        $total = $model->get_total_revenue()['data'][0]['TongDoanhThu'];
        $data['total']=$total;
        $this->render('Doanhthu.html',$data);
    }
}