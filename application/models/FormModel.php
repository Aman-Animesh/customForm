<?php
class FormModel extends CI_Model
{

  public function insert($table = '', $value = '')
  {
    if ($this->db->field_exists('createdAt', $table)) {
      $value['createdAt'] =  date('Y-m-d H:i:s');
    }

    if ($this->db->insert($table, $value)) {
      return $this->db->insert_id();
    } else {
      return FALSE;
    }
  }
  public function fetch_data($tablename, $condition = array(), $fields = null, $orderby = array(), $limit = array())
  {

    $fields = !empty($fields) ? $fields : '*';
    $this->db->select($fields);
    $this->db->from($tablename);
    if (!empty($condition)) {
      if (!empty($condition)) {

        foreach ($condition as $key => $value) {
          $this->db->where($key, $value);
        }
      }
    }
    if (!empty($orderby)) {
      foreach ($orderby as $key => $value) {
        $this->db->order_by($key, $value);
      }
    }
    if (!empty($limit)) {
      $this->db->limit($limit[1], $limit[0]);
    }
    $query = $this->db->get();

    //echo $this->db->last_query();die;

    return $query->result_array();
  }
  public function fetch_single_data($tablename, $condition = array(), $fields = null, $orderby = array())
  {

    $fields = !empty($fields) ? $fields : '*';
    $this->db->select($fields);
    $this->db->from($tablename);
    if (!empty($condition)) {

      foreach ($condition as $key => $value) {
        $this->db->where($key, $value);
      }
    }
    if (!empty($orderby)) {
      foreach ($orderby as $key => $value) {
        $this->db->order_by($key, $value);
      }
    }
    $query = $this->db->get();

    //echo $this->db->last_query();//die;

    return $query->row_array();
  }
  public function update($table = '', $value = '', $condition = '')
  {
    if ($this->db->field_exists('update_date', $table)) {
      $value['update_date'] =  date('Y-m-d H:i:s');
    }
    if ($condition != '') {
      $this->db->where($condition);
      $this->db->update($table, $value);
      return TRUE;
    } else {
      return FALSE;
    }
  }
}
