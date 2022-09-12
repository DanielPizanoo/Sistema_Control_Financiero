<?php
class categoriap_csv_model extends CI_Model
{
    function fetch_data()
    {
        $this->db->select("id_tipo_producto, nombre");
        $this->db->from("tipo_producto");
        return $this->db->get();
    }
}

?>