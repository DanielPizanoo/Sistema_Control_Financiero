<?php
class productos_csv_model extends CI_Model
{
 function fetch_data()
 {
  $this->db->select("id_producto, nombre, id_tipo_producto, id_proveedor, id_unidad_medida, precio");
  $this->db->from('productos');
  return $this->db->get();
 }
}

?>