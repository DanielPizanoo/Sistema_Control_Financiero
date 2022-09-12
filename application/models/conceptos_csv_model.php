<?php
class conceptos_csv_model extends CI_Model
{
 function fetch_data()
 {
  $this->db->select("id_concepto, descripcion");
  $this->db->from('conceptos');
  return $this->db->get();
 }
}

?>