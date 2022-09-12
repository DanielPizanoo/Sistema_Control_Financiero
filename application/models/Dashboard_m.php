<?php
    class Dashboard_m extends CI_Model
    {
        public function get_siembras_activas(){
            $var=$this->db->query("
                SELECT
                    siembra.id_siembra,
                    siembra.semana,
                    DATE_FORMAT(siembra.fecha_inicio, '%d/%m/%Y') as fecha_inicio,
                    estanque.id_estanque as id_estanque,
                    estanque.identificador as estanque
                FROM siembra
                INNER JOIN estanque on estanque.id_estanque = siembra.id_estanque
                WHERE siembra.fecha_final IS NULL
            ");
            
            return $var->result();
        }

        public function get_all_registro_eventos()
        {
            $var=$this->db->query("
                SELECT
                    registro_evento.id_registro_evento,
                    estanque.identificador as estanque,
                    DATE_FORMAT(registro_evento.fecha, '%d/%m/%Y') as fecha,
                    DATE_FORMAT(registro_evento.hora, '%h:%i %p') as hora,
                    evento.nombre as evento,
                    evento.id_evento as id_evento,
                    persona.nombre as persona,
                    siembra.id_siembra,
                    siembra.semana
                FROM registro_evento
                INNER JOIN siembra on siembra.id_siembra = registro_evento.id_siembra
                INNER JOIN estanque on estanque.id_estanque = siembra.id_estanque
                INNER JOIN evento on evento.id_evento = registro_evento.id_evento
                INNER JOIN persona on persona.id_persona = registro_evento.id_usuario
                WHERE registro_evento.eliminacion = 0
                ORDER BY registro_evento.fecha, registro_evento.hora DESC
            ");
            
            return $var->result();
        }

        public function insert_data(){
        }
        public function get_all_fruits() 
        { 
            
        } 
    }
?>