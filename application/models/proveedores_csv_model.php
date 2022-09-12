<?php
class proveedores_csv_model extends CI_Model
{
 function fetch_data()
 {
  $this->db->select("id_proveedor, razon_social, rfc, pais, estado, ciudad, domicilio, cp, telefono, celular, correo");
  $this->db->from('proveedores');
  return $this->db->get();
 }
}

?>