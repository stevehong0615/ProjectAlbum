<?php

class SqlIndex extends Connect{
    // 搜尋album資料表資料
    function indexSelect(){
        
        // $connect = new Connect();
        $selectSql = $this->db->query("SELECT * FROM `album`");
        $data = $selectSql->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
?>


