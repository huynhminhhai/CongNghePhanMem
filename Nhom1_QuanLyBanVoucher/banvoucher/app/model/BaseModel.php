<?php
abstract class BaseModel
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::open();
    }

    abstract function get_all();

    abstract function get_by_id($id);


    // protected để chỉ lớp con truy xuất được
    protected function query($sql)
    {
        $result = $this->db->query($sql); // thiếu ->db
        if (!$result) {
            return array('code' => 1, 'error' => $this->db->error);
        }

        $data = array();
        while ($item = $result->fetch_assoc()) {
            array_push($data, $item);
        }
        return array('code' => 0, 'data' => $data);
    }

    protected function insert_query($sql){
        $this->db->query($sql);
    }

    protected function query_prepared($sql, $param)
    {
        $stm = $this->db->prepare($sql);
        call_user_func_array(array($stm, 'bind_param'), $param);

        if (!$stm->execute()) {
            return array('code' => 1, 'error' => $this->db->error);
        }

        $result = $stm->get_result();

        // hiện tại chỉ mới đọc 1 items, cần dùng
        // vòng lặp để đọc tất cả
        $data = array();
        while ($item = $result->fetch_assoc()) {
            array_push($data, $item);
        }
        return array('code' => 0, 'data' => $data);
    }
}