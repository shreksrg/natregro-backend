<?php

/**
 * 用户反馈模型
 */
class Feedback_model extends App_model
{
    public function feedback($limit, $criteria = null)
    {
        $rows = $limit['rows'];
        $start = ($limit['page'] - 1) * $rows;
        $sql = "select * from nato_feedback where isdel=0 order by create_time desc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }




    public function detail($id)
    {
        $sql = "select * from nato_feedback where isdel=0 and id=$id limit 1";
        $query = $this->db->query($sql);
        return $query->row_array();
    }





    public function drop($ids)
    {
        $ids = implode(',', $ids);
        $return = $this->db->update('nato_feedback', array('isdel' => 1), "isdel=0 and id in ({$ids})");
        return $return;
    }

}



