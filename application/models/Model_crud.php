<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_crud extends CI_Model
{
  function show($tabel) {
    $sql = "SELECT * FROM {$tabel}";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  function jmlData($tabel, $query="") {
    $sql = "SELECT * FROM {$tabel} {$query}";
    $query = $this->db->query($sql);
    return $query->num_rows();
  }

  function selectWhere($tabel, $query){
    $sql = "SELECT * FROM {$tabel} WHERE {$query}";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  function orderBy($tabel, $orderby) {
    $sql = "SELECT * FROM {$tabel} ORDER BY {$orderby}";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  function add($tabel, $data) {
    $this->db->insert($tabel,$data);
    return $this->db->insert_id();
  }

  function update($tabel, $where, $data) {
    $this->db->where($where);
    $this->db->update($tabel,$data);
  }

  function delete($tabel, $where)
  {
    $this->db->where($where);
    $this->db->delete($tabel);
  }

  function get_category($id)
  {
    $sql = 'SELECT * FROM tbl_category WHERE category_id=?';
    $query = $this->db->query($sql,array($id));
    return $query->first_row('array');
  }

  function category_check($id)
  {
    $sql = 'SELECT * FROM tbl_category WHERE category_id=?';
    $query = $this->db->query($sql,array($id));
    return $query->first_row('array');
  }

  function check_news($id) {
    $sql = 'SELECT * FROM tbl_news WHERE category_id=?';
    $query = $this->db->query($sql,array($id));
    return $query->num_rows();
  }

}
