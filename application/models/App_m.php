<?php
    class App_m extends CI_Model
    {
        public function get_last_id()
        {
            $var=$this->db->query("
                SELECT LAST_INSERT_ID() as id;
            ");
            return $var->result();
        }

        public function login($clave, $pass)
        {
            $var=$this->db->query("
                SELECT *
                FROM usuario
                WHERE usuario.clave='$clave' AND usuario.contra=SHA1('$pass') AND usuario.eliminacion=0
            ");
            return $var->result();
        }
        
        public function siembras_actuales()
        {
            $var=$this->db->query("
                SELECT
                    estanque.id_estanque as estanque,
                    CONCAT(estanque.identificador,', Fecha ',DATE_FORMAT(siembra.fecha_inicio, '%d/%m/%Y')) as siembra
                FROM siembra
                INNER JOIN estanque on estanque.id_estanque = siembra.id_estanque
                WHERE siembra.fecha_final IS NULL
            ");
            return $var->result();
        }

        public function get_productos()
        {
            $var=$this->db->query("
                SELECT
                    tipo_producto.id_tipo_producto as id_tipo_producto,
                    tipo_producto.nombre as tipo_producto,
                    producto.id_producto as id_producto,
                    producto.nombre as nombre_producto
                FROM producto
                INNER JOIN tipo_producto on tipo_producto.id_tipo_producto = producto.id_tipo_producto
                WHERE producto.eliminacion = 0
                ORDER BY tipo_producto.nombre, producto.nombre
            ");
            return $var->result();
        }

        public function regresar_fecha($id_siembra)
        {
            $var=$this->db->query("
                SELECT DATEDIFF(CURDATE(), siembra.fecha_inicio) as dias
                FROM siembra
                WHERE id_siembra=$id_siembra
            ");
            return $var->result();
        }

        public function insert_registroevento($fecha, $evento, $siembra, $usuario)
        {
            $this->db->query("
                CALL spInsertRegistroEvento('$fecha','$evento','$siembra','$usuario')
            ");
        }

        public function get_siembra_by_estanque($estanque)
        {
            $var=$this->db->query("
                SELECT siembra.id_siembra
                FROM siembra
                WHERE siembra.id_estanque = $estanque AND siembra.fecha_final IS NULL
                ORDER BY siembra.creacion DESC
                LIMIT 1
            ");
            return $var->result();
        }
    }
?>