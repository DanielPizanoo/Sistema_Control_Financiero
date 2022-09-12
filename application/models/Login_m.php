<?php
    class Login_m extends CI_Model
    {
        public function validate_credentials($usr, $pass){
            $var=$this->db->query("
            SELECT
                usuario.id_usuario,
                usuario.id_tipo_usuario,
                usuario.clave,
                persona.nombre
            FROM usuario
            INNER JOIN persona on persona.id_persona=usuario.id_usuario
            WHERE usuario.clave = '$usr' AND usuario.contra = '$pass' AND usuario.eliminacion!=1
            ");
            
            return $var->result();
        }
        public function insert_data(){
        }
        public function get_all_fruits() 
        { 
            return $this->db->get('Fruits')->result(); 
        } 
    }
?>