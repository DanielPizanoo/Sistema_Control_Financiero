<?php
    class Sensor_m extends CI_Model
    {
        public function get_last_id()
        {
            $var=$this->db->query("
                SELECT LAST_INSERT_ID() as id;
            ");
            return $var->result();
        }

        public function insert_medicion($fecha, $hora_inicio, $hora_final, $siembra)
        {
            $this->db->query("
                CALL spInsertMedicion('$fecha','$hora_inicio','$hora_final','$siembra');
            ");
        }

        public function insert_medicion_parametro($medicion, $parametro, $valor)
        {
            $this->db->query("
                CALL spInsertMedicionParametro('$medicion','$parametro','$valor');
            ");
        }

        public function insert_alerta_medicion($alerta, $medicion, $mensaje)
        {
            $this->db->query("
                CALL spInsertAlertaMedicion('$alerta','$medicion','$mensaje');
            ");
        }

        public function update_estatus_alerta($alerta, $medicion, $estatus)
        {
            $this->db->query("
                CALL spUpdateAlertaMedicionEstatus('$alerta','$medicion','$estatus');
            ");
        }

        public function get_alerta_numeros() 
        { 
            $var=$this->db->query("
                SELECT
                    alerta.id_alerta
                FROM alerta
                INNER JOIN persona on persona.id_persona = alerta.id_persona
                WHERE alerta.eliminacion = 0
            ");
            
            return $var->result();
        }
        
        public function get_alerta_no_emitida() 
        { 
            $var=$this->db->query("
                SELECT
                    CONCAT('52',persona.celular) as celular,
                    alerta_medicion.mensaje as mensaje,
                    alerta.id_alerta as id_alerta
                FROM alerta_medicion
                INNER JOIN alerta on alerta.id_alerta = alerta_medicion.id_alerta
                INNER JOIN persona on persona.id_persona = alerta.id_persona
                WHERE alerta_medicion.estatus LIKE 'NO ENVIADA'
            ");
            
            return $var->result();
        }

        public function comprobar_anomalia($id_medicion) 
        { 
            $var=$this->db->query("
                SELECT
                    parametro.nombre as nombre_parametro,
                    medicion_parametro.valor as valor,
                    DATE_FORMAT(medicion.fecha, '%d/%m/%Y') as fecha,
                    DATE_FORMAT(medicion.hora_inicio, '%H:%i') as hora,
                    estanque.identificador as estanque
                FROM medicion
                INNER JOIN medicion_parametro on medicion_parametro.id_medicion = medicion.id_medicion
                INNER JOIN parametro on parametro.id_parametro = medicion_parametro.id_parametro
                INNER JOIN siembra on siembra.id_siembra = medicion.id_siembra
                INNER JOIN estanque on estanque.id_estanque = siembra.id_estanque
                WHERE medicion.id_medicion = $id_medicion AND (medicion_parametro.valor < parametro.minimo OR medicion_parametro.valor > parametro.maximo)
            ");
            
            return $var->result();
        } 
    }
?>