<?php
class unidadMedida_csv_model extends CI_Model
{
 function fetch_data()
 {
  $this->db->select("id_unidadesm, descripcion");
  $this->db->from('unidadesdm');
  return $this->db->get();
 }
}

?>