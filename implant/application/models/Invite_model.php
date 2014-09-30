<?php

/**
 * 招聘模型
 */
class Invite_model extends App_model
{
    public function jobs($limit, $criteria = null)
    {
        $rows = $limit['rows'];
        $start = ($limit['page'] - 1) * $rows;
        $sql = "select id,position,department,location, type,num,status,update_time from nato_jobs where isdel=0 order by create_time desc";
        $query = $this->db->query($sql);

        return $query->result_array();
    }


    public function job($id, $criteria = null)
    {
        $sql = "select * from nato_jobs where isdel=0  and id=$id";
        $query = $this->db->query($sql);
        return $query->row_array();
    }


    public function detail($id)
    {
        $sql = "select * from nato_jobs where isdel=0 and id=$id limit 1";
        $query = $this->db->query($sql);
        return $query->row_array();
    }


    public function append($data)
    {
        $now = time();
        $value = array(
            'position' => $data['position'],
            'department' => $data['department'],
            'location' => $data['location'],
            'type' => $data['type'],
            'years' => $data['years'],
            'edu' => $data['edu'],
            'num' => $data['num'],
            'desc' => $data['desc'],
            'status' => $data['status'],
            'create_time' => $now,
            'update_time' => $now,
        );
        $return = $this->db->insert('nato_jobs', $value);
        if ($return) {
            return $this->db->insert_id();
        }
    }

    public function edit($data)
    {
        $now = time();
        $value = array(
            'position' => $data['position'],
            'department' => $data['department'],
            'location' => $data['location'],
            'type' => $data['type'],
            'years' => $data['years'],
            'edu' => $data['edu'],
            'num' => $data['num'],
            'desc' => $data['desc'],
            'status' => $data['status'],
            'update_time' => $now,
        );
        $return = $this->db->update('nato_jobs', $value, array('isdel' => 0, 'id' => $data['id']));
        return $return;
    }

    public function drop($ids)
    {
        $ids = implode(',', $ids);
        $return = $this->db->update('nato_jobs', array('isdel' => 1), "isdel=0 and id in ({$ids})");
        return $return;
    }

}



