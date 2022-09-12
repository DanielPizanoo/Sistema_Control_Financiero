<?php
class destino_csv_model extends CI_Model
{
 function fetch_data()
 {
  $this->db->select("id_destino, nombre");
  $this->db->from('destinos');
  return $this->db->get();
 }
}

?>