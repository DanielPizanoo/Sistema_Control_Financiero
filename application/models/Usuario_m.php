<?php
    class Usuario_m extends CI_Model
    {
        public function get_last_id()
        {
            $var=$this->db->query("
                SELECT LAST_INSERT_ID() as id;
            ");
            return $var->result();
        }

        public function insert_registro_evento($fecha,$hora,$evento,$siembra,$usuario)
        {
            $this->db->query("
                call spInsertRegistroEvento('$fecha','$hora','$evento','$siembra','$usuario');
            ");
        }

        public function insert_accion($registro_evento,$hora_inicio,$hora_final)
        {
            $this->db->query("
                call spInsertAccion('$registro_evento','$hora_inicio','$hora_final');
            ");
        }

        public function insert_observacion($registro_evento,$texto)
        {
            $this->db->query("
                call spInsertDetObservacionRegistro('$registro_evento','$texto');
            ");
        }

        public function insert_aplicacion_producto($registro_evento,$cantidad,$unidad_medida,$hora,$producto)
        {
            $this->db->query("
                call spInsertAplicacionProducto('$registro_evento','$cantidad','$unidad_medida','$hora','$producto');
            ");
        }

        public function insert_muestreo($registro_evento,$cantidad,$unidad_medida,$hora)
        {
            $this->db->query("
                call spInsertMuestreo('$registro_evento','$cantidad','$unidad_medida','$hora');
            ");
        }

        public function insert_det_muestreo($id_muestreo,$cantidad)
        {
            $this->db->query("
                call spInsertDetMuestreo('$id_muestreo','$cantidad');
            ");
        }

        public function insert_estanque($id,$x,$y,$z)
        {
            $this->db->query("
                call spInsertEstanque('$id','$x','$y','$z');
            ");
        }

        public function insert_siembra($fecha_inicial,$estanque,$biomasa,$cantidad)
        {
            $this->db->query("
                call spInsertSiembra('$fecha_inicial','$estanque','$biomasa','$cantidad');
            ");
        }

        public function get_det_muestreo($id_muestreo){
            $var=$this->db->query("
                SELECT *
                FROM det_muestreo
                WHERE det_muestreo.id_muestreo = $id_muestreo
                ORDER BY det_muestreo.numero DESC
            ");
            
            return $var->result();
        }

        public function get_estanques_activos(){
            $var=$this->db->query("
                SELECT
                    siembra.id_siembra,
                    DATE_FORMAT(siembra.fecha_inicio, '%d/%m/%Y') as fecha_inicio,
                    estanque.id_estanque as id_estanque,
                    estanque.identificador as estanque
                FROM siembra
                INNER JOIN estanque on estanque.id_estanque = siembra.id_estanque
                WHERE siembra.fecha_final IS NULL
            ");
            
            return $var->result();
        }

        public function get_mediciones(){
            $var=$this->db->query("
            SELECT
                medicion.id_medicion,
                medicion.fecha,
                DATE_FORMAT(medicion.hora_inicio, '%H:%i %p') as hora_inicio,
                ROUND(medicion_parametro.valor,2) as valor,
                parametro.nombre,
                parametro.id_parametro,
                parametro.minimo,
                parametro.maximo
            FROM medicion
            INNER JOIN medicion_parametro on medicion_parametro.id_medicion = medicion.id_medicion
            INNER JOIN parametro on parametro.id_parametro = medicion_parametro.id_parametro
            WHERE
                medicion.eliminacion != 1 AND
                medicion_parametro.eliminacion != 1 AND
                parametro.eliminacion != 1
            ORDER BY medicion.id_medicion DESC, parametro.id_parametro
            ");
            
            return $var->result();
        }

        public function get_last_id_medicion(){
            $var=$this->db->query("
                SELECT medicion.id_medicion
                FROM medicion
                ORDER BY medicion.id_medicion DESC
                LIMIT 1
            ");
            
            return $var->result();
        }

        public function get_last_medicion($id){
            $var=$this->db->query("
                SELECT
                    DATE_FORMAT(medicion.hora_inicio, '%H:%i %p') as hora_inicio,
                    ROUND(medicion_parametro.valor,2) as valor,
                    parametro.nombre,
                    parametro.minimo,
                    parametro.maximo
                FROM medicion
                INNER JOIN medicion_parametro on medicion_parametro.id_medicion = medicion.id_medicion
                INNER JOIN parametro on parametro.id_parametro = medicion_parametro.id_parametro
                WHERE
                    medicion.eliminacion != 1 AND
                    medicion_parametro.eliminacion != 1 AND
                    parametro.eliminacion != 1 AND
                    medicion.id_medicion = $id
                ORDER BY medicion.id_medicion DESC, parametro.id_parametro
            ");
            
            return $var->result();
        }

        public function get_last_eventos(){
            $var=$this->db->query("
                SELECT
                    registro_evento.id_evento,
                    registro_evento.fecha
                FROM registro_evento
                INNER JOIN det_observacion_registro on det_observacion_registro.id_registro_evento = registro_evento.id_registro_evento
                INNER JOIN accion on accion.id_accion = registro_evento.id_registro_evento
                INNER JOIN muestreo on muestreo.id_muestreo = registro_evento.id_registro_evento
                INNER JOIN aplicacion_producto on aplicacion_producto.id_aplicacion_producto = registro_evento.id_registro_evento
            ");
            
            return $var->result();
        }

        public function get_eventos_last_10(){
            $var=$this->db->query("
                SELECT
                    siembra.id_siembra,
                    estanque.id_estanque as id_estanque,
                    estanque.identificador as estanque,
                    registro_evento.id_registro_evento as id,
                    evento.nombre as tipo_evento,
                    evento.id_evento as id_evento,
                    DATE_FORMAT(registro_evento.fecha, '%d/%m/%Y') as fecha,
                    DATE_FORMAT(accion.hora_inicio, '%H:%i') as accion_hora_inicio,
                    DATE_FORMAT(muestreo.hora, '%H:%i') as muestreo_hora,
                    DATE_FORMAT(aplicacion_producto.hora, '%H:%i') as aplicacion_producto_hora
                FROM registro_evento
                INNER JOIN siembra on siembra.id_siembra = registro_evento.id_siembra
                INNER JOIN estanque on estanque.id_estanque = siembra.id_estanque
                INNER JOIN evento on evento.id_evento = registro_evento.id_evento
                LEFT JOIN det_observacion_registro on det_observacion_registro.id_registro_evento = registro_evento.id_registro_evento
                LEFT JOIN accion on accion.id_accion = registro_evento.id_registro_evento
                LEFT JOIN muestreo on muestreo.id_muestreo = registro_evento.id_registro_evento
                LEFT JOIN aplicacion_producto on aplicacion_producto.id_aplicacion_producto = registro_evento.id_registro_evento
                ORDER BY registro_evento.id_registro_evento DESC
                LIMIT 10
            ");
            
            return $var->result();
        }

        public function get_tipo_evento(){
            $var=$this->db->query("
                SELECT *
                FROM evento
                WHERE evento.eliminacion = 0
            ");
            
            return $var->result();
        }

        public function get_tipo_evento_by_reg_evento($id){
            $var=$this->db->query("
                SELECT *
                FROM registro_evento
                WHERE registro_evento.eliminacion = 0 AND registro_evento.id_registro_evento = $id
            ");
            
            return $var->result();
        }

        public function get_productos_by_id($id)
        {
            $var=$this->db->query("
                SELECT *
                FROM producto
                WHERE producto.id_producto=$id AND producto.eliminacion = 0
            ");
            
            return $var->result();
        }

        public function get_reg_evento_by_id($id, $select, $join)
        {
            $var=$this->db->query("
                SELECT
                    registro_evento.id_registro_evento as id_registro_evento,
                    DATE_FORMAT(registro_evento.fecha, '%d/%m/%Y') as fecha,
                    registro_evento.id_evento as id_evento,
                    registro_evento.fecha as fecha_f,
                    persona.id_persona as id_persona,
	                persona.nombre as persona_nombre,
                ".$select."
                FROM registro_evento
                INNER JOIN usuario on usuario.id_usuario = registro_evento.id_usuario
                INNER JOIN persona on persona.id_persona = usuario.id_usuario
                ".$join."
                WHERE registro_evento.eliminacion = 0 AND registro_evento.id_registro_evento = $id
            ");
            
            return $var->result();
        }

        public function get_estanques()
        {
            $var=$this->db->query("
                SELECT *
                FROM estanque
                WHERE estanque.eliminacion = 0
                ORDER BY estanque.identificador ASC
            ");
            
            return $var->result();
        }

        public function get_siembra()
        {
            $var=$this->db->query("
                SELECT
                    siembra.id_siembra as id_siembra,
                    DATE_FORMAT(siembra.fecha_inicio, '%d/%m/%Y') as fecha_inicio,
                    siembra.semana as semana,
                    estanque.identificador as estanque,
                    variedad.nombre as variedad
                FROM siembra
                INNER JOIN estanque on estanque.id_estanque=siembra.id_estanque
                INNER JOIN biomasa on biomasa.id_biomasa=siembra.id_biomasa
                INNER JOIN variedad on variedad.id_variedad=biomasa.id_variedad
                WHERE siembra.eliminacion = 0
                ORDER BY siembra.fecha_inicio DESC
            ");
            
            return $var->result();
        }

        public function get_biomasa()
        {
            $var=$this->db->query("
                SELECT
                    biomasa.id_biomasa as biomasa,
                    variedad.nombre as variedad,
                    persona.nombre as proveedor
                FROM biomasa
                INNER JOIN variedad on variedad.id_variedad=biomasa.id_variedad
                INNER JOIN especie on especie.id_especie=variedad.id_especie
                INNER JOIN proveedor on proveedor.id_proveedor=biomasa.id_proveedor
                INNER JOIN persona on persona.id_persona=proveedor.id_proveedor
                WHERE biomasa.eliminacion = 0
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
                    persona.nombre as persona
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

        public function get_where_registro_eventos($query)
        {
            $var=$this->db->query("
                SELECT
                    registro_evento.id_registro_evento,
                    estanque.identificador as estanque,
                    DATE_FORMAT(registro_evento.fecha, '%d/%m/%Y') as fecha,
                    DATE_FORMAT(registro_evento.hora, '%h:%i %p') as hora,
                    evento.nombre as evento,
                    evento.id_evento as id_evento,
                    persona.nombre as persona
                FROM registro_evento
                INNER JOIN siembra on siembra.id_siembra = registro_evento.id_siembra
                INNER JOIN estanque on estanque.id_estanque = siembra.id_estanque
                INNER JOIN evento on evento.id_evento = registro_evento.id_evento
                INNER JOIN persona on persona.id_persona = registro_evento.id_usuario
                WHERE registro_evento.eliminacion = 0".$query."
                ORDER BY registro_evento.fecha, registro_evento.hora DESC
            ");
            
            return $var->result();
        }

        public function get_reg_evento_unico($id)
        {
            $var=$this->db->query("
                SELECT
                    registro_evento.id_registro_evento,
                    DATE_FORMAT(registro_evento.creacion, '%d/%m/%Y a las %h:%i %p') as creacion,
	                DATE_FORMAT(registro_evento.actualizacion, '%d/%m/%Y a las %h:%i %p') as actualizacion,
                    registro_evento.actualizacion_usuario,
                    estanque.identificador as estanque,
                    DATE_FORMAT(registro_evento.fecha, '%d/%m/%Y') as fecha,
                    DATE_FORMAT(registro_evento.hora, '%h:%i %p') as hora,
                    evento.nombre as evento,
                    persona.nombre as persona,
                    DATE_FORMAT(siembra.fecha_inicio, '%d/%m/%Y') as siembra_fi,
                    variedad.nombre as variedad,
                    (
                        SELECT persona.nombre
                        FROM persona
                        WHERE persona.id_persona = biomasa.id_proveedor
                    ) as proveedor
                FROM registro_evento
                INNER JOIN siembra on siembra.id_siembra = registro_evento.id_siembra
                INNER JOIN estanque on estanque.id_estanque = siembra.id_estanque
                INNER JOIN evento on evento.id_evento = registro_evento.id_evento
                INNER JOIN persona on persona.id_persona = registro_evento.id_usuario
                INNER JOIN biomasa on biomasa.id_biomasa = siembra.id_biomasa
                INNER JOIN variedad on variedad.id_variedad = biomasa.id_variedad
                WHERE registro_evento.eliminacion = 0 and registro_evento.id_registro_evento = $id
                ORDER BY estanque.id_estanque, registro_evento.fecha, registro_evento.hora
            ");
            
            return $var->result();
        }

        /*
        SELECT
	registro_evento.id_registro_evento,
	DATE_FORMAT(registro_evento.creacion, '%d/%m/%Y a las %h:%i %p') as creacion,
	DATE_FORMAT(registro_evento.actualizacion, '%d/%m/%Y a las %h:%i %p') as actualizacion,
	estanque.identificador as estanque,
	DATE_FORMAT(registro_evento.fecha, '%d/%m/%Y') as fecha,
	DATE_FORMAT(registro_evento.hora, '%h:%i %p') as hora,
	evento.nombre as evento,
	persona.nombre as persona,
	DATE_FORMAT(siembra.fecha_inicio, '%d/%m/%Y') as siembra_fi,
	variedad.nombre as variedad,
	(
		SELECT persona.nombre
		FROM persona
		WHERE persona.id_persona = biomasa.id_proveedor
	) as proveedor
FROM registro_evento
INNER JOIN siembra on siembra.id_siembra = registro_evento.id_siembra
INNER JOIN estanque on estanque.id_estanque = siembra.id_estanque
INNER JOIN evento on evento.id_evento = registro_evento.id_evento
INNER JOIN persona on persona.id_persona = registro_evento.id_usuario
INNER JOIN biomasa on biomasa.id_biomasa = siembra.id_biomasa
INNER JOIN variedad on variedad.id_variedad = biomasa.id_variedad
WHERE registro_evento.eliminacion = 0 and registro_evento.id_registro_evento=4
ORDER BY estanque.id_estanque, registro_evento.fecha, registro_evento.hora

        */
    }
?>