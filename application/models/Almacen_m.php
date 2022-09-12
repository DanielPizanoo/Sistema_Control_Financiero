<?php
    class Almacen_m extends CI_Model
    {
        public function get_last_id()
        {
            $var=$this->db->query("
                SELECT LAST_INSERT_ID() as id;
            ");
            return $var->result();
        }

        //------------------------ Productos -----------------------------------------------------
        public function insert_productos($nombre, $tipoprod, $proveedor, $unidadm, $precio) 
        {
            $this->db->query("
                CALL spInsertProducto('', '$nombre', '$tipoprod', '$proveedor', '$unidadm', $precio);
            ");
        }

        public function update_datos($id_producto, $nombre, $tipoprod, $proveedor, $unidadm, $precio) 
        {
            $this->db->query("
                CALL spUpdateProductos('$id_producto', '$nombre', '$tipoprod', '$proveedor', '$unidadm', '$precio')
            ");
        }
        
        public function delete_datos($id_producto) 
        { 
            $this->db->query("
                CALL spDeleteProducto('$id_producto')
            ");
        }

        public function get_datos()
        {
            $var=$this->db->query("
                SELECT *
                FROM productos
                ORDER BY productos.id_producto ASC
            ");
            
            return $var->result();
        }

        public function get_datosby_id($id_producto)
        {
            $var=$this->db->query("
                SELECT *
                FROM productos
                WHERE id_producto = $id_producto
            ");
            
            return $var->result();
        } 

        public function get_tipoproducto()
        {
            $var=$this->db->query("
                SELECT *
                FROM tipo_producto
            ");
            
            return $var->result();
        }

        public function get_proveedore()
        {
            $var=$this->db->query("
                SELECT *
                FROM proveedores
            ");
            
            return $var->result();
        }

        public function get_unidam()
        {
            $var=$this->db->query("
                SELECT *
                FROM unidadesdm
            ");
            
            return $var->result();
        }

        //-----------------UnidadesMedida-------------------------
        public function insert_unidadesdm($descripcion) 
        {
            $this->db->query("
                CALL spInsertUnidadMedida('', '$descripcion');
            ");
        }

        public function get_unidm()
        {
            $var=$this->db->query("
                SELECT *
                FROM unidadesdm
            ");
            
            return $var->result();
        }
        
        public function update_unidades($id_unidadesm, $descripcion) 
        {
            $this->db->query("
                CALL spUpdateUnidad('$id_unidadesm','$descripcion')
            ");
        }
        
        public function delete_unidades($id_unidadesm) 
        {
            $this->db->query("
                CALL spDeleteUnidad('$id_unidadesm')
            ");
        }

        public function get_unidadby_id($id_unidadesm)
        {
            $var=$this->db->query("
                SELECT *
                FROM unidadesdm
                WHERE id_unidadesm = $id_unidadesm
            ");
            
            return $var->result();
        } 

        //--------------------------DESTINOS--------------------------------------------------------------------

        public function insert_destinos($nombre) 
        {
            $this->db->query("
                CALL spInsertDestino('', '$nombre');
            ");
        }

        public function get_destn()
        {
            $var=$this->db->query("
                SELECT *
                FROM destinos
                ORDER by destinos.id_destino ASC
            ");
            
            return $var->result();
        }

        public function update_destino($id_destino, $descripcion) 
        {
            $this->db->query("
                CALL spUpdateDestino('$id_destino','$descripcion')
            ");
        }
        
        public function delete_destino($id_destino) 
        {
            $this->db->query("
                CALL spDeleteDestino('$id_destino')
            ");
        }

        public function get_destinoby_id($id_destino)
        {
            $var=$this->db->query("
                SELECT *
                FROM destinos
                WHERE id_destino = $id_destino
            ");
            
            return $var->result();
        } 

        //---------------------------Proveedores----------------------------------------------------------------

        public function insert_proveedores($razon, $rfc, $pais, $estado, $ciudad, $domicilio, $cp, $telefono, $celular, $email) 
        {
            $this->db->query("
                CALL spInsertProveedores('', '$razon', '$rfc', '$pais', '$estado', '$ciudad', '$domicilio', $cp, $telefono, $celular, '$email');
            ");
        }

        public function get_proveedores()
        {
            $var=$this->db->query("
                SELECT *
                FROM proveedores
                ORDER by proveedores.id_proveedor ASC
            ");
            
            return $var->result();
        }

        public function update_proveedores($id_proveedor, $razon, $rfc, $pais, $estado, $ciudad, $domicilio, $cp, $telefono, $celular, $email)
        {
            $this->db->query("
                CALL spUpdateProveedores('$id_proveedor', '$razon', '$rfc', '$pais', '$estado', '$ciudad', '$domicilio', $cp, $telefono, $celular, '$email')
            ");
        }

        public function get_proveedores_id($id_proveedor)
        {
            $var=$this->db->query("
                SELECT * 
                FROM proveedores 
                WHERE id_proveedor = $id_proveedor
            ");
            
            return $var->result();
        } 

        public function delete_proveedores($id_proveedor) 
        {
            $this->db->query("
                CALL spDeleteProveedores('$id_proveedor')
            ");
        }

        //-------------------------- Categorias ---------------------------------------------
        
        public function get_categop()
        {
            $var=$this->db->query("
                SELECT *
                FROM tipo_producto
                ORDER by tipo_producto.id_tipo_producto ASC
            ");
            
            return $var->result();
        }

        public function insert_categoria($nombre) 
        {
            $this->db->query("
                CALL spInsertCategoria('', '$nombre');
            ");
        }

        public function update_categoria($id_tipo_producto, $nombre) 
        {
            $this->db->query("
                CALL spUpdateCategoria('$id_tipo_producto','$nombre')
            ");
        }

        public function get_categoriaby_id($id_tipo_producto)
        {
            $var=$this->db->query("
                SELECT *
                FROM tipo_producto
                WHERE id_tipo_producto = $id_tipo_producto
            ");
            
            return $var->result();
        } 

        public function delete_categoria($id_tipo_producto) 
        {
            $this->db->query("
                CALL spDeleteCategoria('$id_tipo_producto')
            ");
        }        

        //--------------------------- Conceptos ----------------------------------------------------------------

        public function insert_concepto($descripcion) 
        {
            $this->db->query("
                CALL spInsertConcepto('', '$descripcion');
            ");
        }

        public function get_concept()
        {
            $var=$this->db->query("
                SELECT *
                FROM conceptos
                ORDER BY conceptos.id_concepto ASC
            ");
            
            return $var->result();
        }
        
        public function update_concept($id_concepto, $descripcion) 
        {
            $this->db->query("
                CALL spUpdateConcept('$id_concepto','$descripcion')
            ");
        }
        
        public function delete_concept($id_concepto) 
        {
            $this->db->query("
                CALL spDeleteConcept('$id_concepto')
            ");
        }

        public function get_conceptby_id($id_concepto)
        {
            $var=$this->db->query("
                SELECT *
                FROM conceptos
                WHERE id_concepto = $id_concepto
            ");
            
            return $var->result();
        } 

        //--------------------------- ReporteConceptos ----------------------------------------------------------------
        
        public function get_rconcept()
        {
            $var=$this->db->query("
                SELECT *
                FROM conceptos
                ORDER BY conceptos.id_concepto ASC
            ");
            
            return $var->result();
        }
        
        public function update_rconcept($id_concepto, $descripcion) 
        {
            $this->db->query("
                CALL spUpdateConcept('$id_concepto','$descripcion')
            ");
        }
        
        public function delete_rconcept($id_concepto) 
        {
            $this->db->query("
                CALL spDeleteConcept('$id_concepto')
            ");
        }

        public function get_rconceptby_id($id_concepto)
        {
            $var=$this->db->query("
                SELECT *
                FROM conceptos
                WHERE id_concepto = $id_concepto
            ");
            
            return $var->result();
        } 

         //-------------------------- ReporteCategorias ---------------------------------------------
        
         public function get_rcategop()
         {
             $var=$this->db->query("
                 SELECT *
                 FROM tipo_producto
                 ORDER by tipo_producto.id_tipo_producto ASC
             ");
             
             return $var->result();
         }
 
         public function update_rcategoria($id_tipo_producto, $nombre) 
         {
             $this->db->query("
                 CALL spUpdateCategoria('$id_tipo_producto','$nombre')
             ");
         }
 
         public function get_rcategoriaby_id($id_tipo_producto)
         {
             $var=$this->db->query("
                 SELECT *
                 FROM tipo_producto
                 WHERE id_tipo_producto = $id_tipo_producto
             ");
             
             return $var->result();
         } 
 
         public function delete_rcategoria($id_tipo_producto) 
         {
             $this->db->query("
                 CALL spDeleteCategoria('$id_tipo_producto')
             ");
         }        

          //--------------------------ReporteDESTINOS--------------------------------------------------------------------

        public function get_rdestn()
        {
            $var=$this->db->query("
                SELECT *
                FROM destinos
                ORDER by destinos.id_destino ASC
            ");
            
            return $var->result();
        }

        public function update_rdestino($id_destino, $descripcion) 
        {
            $this->db->query("
                CALL spUpdateDestino('$id_destino','$descripcion')
            ");
        }
        
        public function delete_rdestino($id_destino) 
        {
            $this->db->query("
                CALL spDeleteDestino('$id_destino')
            ");
        }

        public function get_rdestinoby_id($id_destino)
        {
            $var=$this->db->query("
                SELECT *
                FROM destinos
                WHERE id_destino = $id_destino
            ");
            
            return $var->result();
        } 

         //------------------------ ReporteProductos -----------------------------------------------------
         public function update_rdatos($id_producto, $nombre, $tipoprod, $proveedor, $unidadm) 
        {
            $this->db->query("
                CALL spUpdateProductos('$id_producto', '$nombre', '$tipoprod', '$proveedor', '$unidadm')
            ");
        }
        
        public function delete_rdatos($id_producto) 
        { 
            $this->db->query("
                CALL spDeleteProducto('$id_producto')
            ");
        }

        public function get_rdatos()
        {
            $var=$this->db->query("
                SELECT *
                FROM productos
                ORDER BY productos.id_producto ASC
            ");
            
            return $var->result();
        }

        public function get_rdatosby_id($id_producto)
        {
            $var=$this->db->query("
                SELECT *
                FROM productos
                WHERE id_producto = $id_producto
            ");
            
            return $var->result();
        } 

        public function get_rtipoproducto()
        {
            $var=$this->db->query("
                SELECT *
                FROM tipo_producto
            ");
            
            return $var->result();
        }

        public function get_rproveedore()
        {
            $var=$this->db->query("
                SELECT *
                FROM proveedores
            ");
            
            return $var->result();
        }

        public function get_runidam()
        {
            $var=$this->db->query("
                SELECT *
                FROM unidadesdm
            ");
            
            return $var->result();
        }

        public function  get_datos_para_reporte_entrada($where)
        {
            $var=$this->db->query("
                SELECT *
                FROM e_encabezado
                ".$where."
            ");
            
            return $var->result();
        }

          //-----------------ReporteUnidadesMedida-------------------------
        public function get_runidm()
        {
            $var=$this->db->query("
                SELECT *
                FROM unidadesdm
            ");
            
            return $var->result();
        }
        
        public function update_runidades($id_unidadesm, $descripcion) 
        {
            $this->db->query("
                CALL spUpdateUnidad('$id_unidadesm','$descripcion')
            ");
        }
        
        public function delete_runidades($id_unidadesm) 
        {
            $this->db->query("
                CALL spDeleteUnidad('$id_unidadesm')
            ");
        }

        public function get_runidadby_id($id_unidadesm)
        {
            $var=$this->db->query("
                SELECT *
                FROM unidadesdm
                WHERE id_unidadesm = $id_unidadesm
            ");
            
            return $var->result();
        } 
        
        //---------------------------ReporteProveedores----------------------------------------------------------------

        public function insert_rproveedores($razon, $rfc, $pais, $estado, $ciudad, $domicilio, $cp, $telefono, $celular, $email) 
        {
            $this->db->query("
                CALL spInsertProveedores('', '$razon', '$rfc', '$pais', '$estado', '$ciudad', '$domicilio', $cp, $telefono, $celular, '$email');
            ");
        }

        public function get_rproveedores()
        {
            $var=$this->db->query("
                SELECT *
                FROM proveedores
                ORDER by proveedores.id_proveedor ASC
            ");
            
            return $var->result();
        }

        public function update_rproveedores($id_proveedor, $razon, $rfc, $pais, $estado, $ciudad, $domicilio, $cp, $telefono, $celular, $email)
        {
            $this->db->query("
                CALL spUpdateProveedores('$id_proveedor', '$razon', '$pais', '$estado', '$ciudad', '$domicilio', $cp, $telefono, $celular, '$email')
            ");
        }

        public function get_rproveedores_id($id_proveedor)
        {
            $var=$this->db->query("
                SELECT * 
                FROM proveedores 
                WHERE id_proveedor = $id_proveedor
            ");
            
            return $var->result();
        } 

        public function delete_rproveedores($id_proveedor) 
        {
            $this->db->query("
                CALL spDeleteProveedores('$id_proveedor')
            ");
        }

        //---------------------- Entradas ----------------------------------------------
        public function get_econcepto()
        {
            $var=$this->db->query("
                SELECT *
                FROM conceptos
            ");

            return $var->result();
        }

        public function get_eproveedores()
        {
            $var=$this->db->query("
                SELECT *
                FROM proveedores
            ");
            
            return $var->result();
        }

        public function get_lastIdEncabezado()
        {
            $var=$this->db->query("
                SELECT MAX(id_folio)+1 as last_folio
                FROM e_encabezado
            ");

            return $var->result();
        }

        public function get_productos()
        {
            $var=$this->db->query("
                SELECT *
                FROM productos
            ");

            return $var->result();
        }

        public function insert_ecabeza($fecha, $hora, $concepto, $proveedor)
        {
            $this->db->query("
                CALL spInsertECabebecera('','$fecha', '$hora','$concepto', '$proveedor');
            ");
        }

        public function get_lastId()
        {
            $var=$this->db->query("
                SELECT MAX(id_folio) as last_folio
                FROM e_encabezado
            ");

            return $var->result();
        }

        public function insert_emovimientos($id_folio, $producto, $unidadm, $cantidad, $preciou, $subtotal)
        {
            $this->db->query("
                CALL spInsertEMovimientos('', '$id_folio','$producto', '$unidadm', '$cantidad', '$preciou', '$subtotal');
            ");
        }

        public function get_eunidadm()
        {
            $var=$this->db->query("
                SELECT *
                FROM unidadesdm
            ");

            return $var->result();
        }
    }
?>