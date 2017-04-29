<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Proveedores_controller extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('sistema_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->error = "";
        
        //para subir imagenes
        $this->load->helper("URL", "DATE", "URI", "FORM");
        $this->load->library('upload');
        $this->load->model('mupload_model');        
    }

    function index(){
        $this->load->view('login_view');
    }
    
    function regresa() {
        echo "error";
    }
    
//    function verificaUsuario() {
//        //Llamada a Webservices de Usuarios
//        # An HTTP GET request example
//        $url = 'http://localhost/matserviceswsok/usuarios/verifica_usuario.php?usuario='.$_POST['usuario'].'&clave='.$_POST['clave'];
//        $ch = curl_init($url);
//        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
//        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        $data = curl_exec($ch);
//        $datos = json_decode($data);
//        curl_close($ch);
//        if ($datos->{'estado'}==1) {
//            //separa campos
//            $i=1;
//            foreach($datos->{'usuario'} as $fila) {
//                switch ($i) {
//                    case 1: $idUsuario = $fila; break;
//                    case 2: $usuario = $fila; break;
//                    case 3: $clave = $fila; break;
//                    case 4: $permisos = $fila; break;
//                    case 5: $nombre = $fila; break;
//                    case 6: $apellido_paterno = $fila; break;
//                    case 7: $apellido_materno = $fila; break;
//                    case 8: $telefono_casa = $fila; break;
//                    case 9: $telefono_celular = $fila; break;
//                }
//                $i++;
//            }
//            //fin separa campos
//            
//            //crea campos de sesion
//            $this->session->set_userdata('nombre', $nombre." ".$apellido_paterno." ".$apellido_materno);
//            $this->session->set_userdata('permisos', $permisos);
//            $this->session->set_userdata('usuario', $usuario);					
//            $this->session->set_userdata('clave', $clave);					
//            //fin crea campos de sesion
//            
//            $data = array('idUsuario'=>$idUsuario,
//                    'usuario'=>$usuario,'clave'=>$clave,
//                    'permisos'=>$permisos,'nombre'=>$nombre,
//                    'apellido_paterno'=>$apellido_paterno,
//                    'apellido_materno'=>$apellido_materno,
//                    'telefono_casa' => $telefono_casa,
//                    'telefono_celular' => $telefono_celular,
//                    'nombre_Empresa'=>'checar despues'
//                );
//            $this->load->view('layouts/header_view',$data);
//            $this->load->view('principal_view',$data);
//            $this->load->view('layouts/pie_view',$data);
//        } else {
//            $data = array('error'=>'1');
//            //$this->load->view('login_view',$data);
//            redirect($this->index(),$data);
//        }
//    }
    
    function mostrarProveedores() {
        # An HTTP GET request example
        $url = 'http://localhost/matserviceswsok/proveedores/obtener_proveedores.php';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        $datos = json_decode($data);
        curl_close($ch);
        $proveedores;
        $i=0;
        $data;
        $data = array('nombre_Empresa'=>'checar despues');
        if ($datos->{'estado'}==1) {
            $data = array('proveedores'=>$datos->{'proveedores'},'nombre_Empresa'=>'checar despues',
                'permisos' => $this->session->userdata('permisos'));
            $this->load->view('layouts/header_view',$data);
            $this->load->view('proveedores/adminProveedores_view',$data);
            $this->load->view('layouts/pie_view',$data);
        } else {
            $this->load->view('layouts/header_view',$data);
            $this->load->view('principal_view',$data);
            $this->load->view('layouts/pie_view',$data);
        }
    }
    
    function actualizarUsuario($idUsuario) {
        //Obtiene usuario por id
        # An HTTP GET request example
        $url = 'http://localhost/matserviceswsok/usuarios/obtener_usuario_por_id.php?idUsuario='.$idUsuario;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        $datos = json_decode($data);
        curl_close($ch);
        if ($datos->{'estado'}==1) {
            $data = array('usuario'=>$datos->{'usuario'},'nombre_Empresa'=>'checar despues',
                'permisos' => $this->session->userdata('permisos'));
            $this->load->view('layouts/headerRegresa_view',$data);
            $this->load->view('usuarios/actualizaUsuario_view',$data);
            $this->load->view('layouts/pie_view',$data);
        } else {
            echo "error";
        }
    }

    function actualizarUsuarioFromFormulario()
    {
        if ($this->input->post('submit')){
            //procesado de permisos de usuario
            $permisosUsuarioLocal = "";
            //inventario
            if ($this->input->post('chkInventario')=="on") {
                $permisosUsuarioLocal = $permisosUsuarioLocal."1";
            } else {
                $permisosUsuarioLocal = $permisosUsuarioLocal."0";
            }
            //ventas
            if ($this->input->post('chkVentas')=="on") {
                $permisosUsuarioLocal = $permisosUsuarioLocal."1";
            } else {
                $permisosUsuarioLocal = $permisosUsuarioLocal."0";
            }
            //Compras
            if ($this->input->post('chkCompras')=="on") {
                $permisosUsuarioLocal = $permisosUsuarioLocal."1";
            } else {
                $permisosUsuarioLocal = $permisosUsuarioLocal."0";
            }
            //Consultas
            if ($this->input->post('chkConsultas')=="on") {
                $permisosUsuarioLocal = $permisosUsuarioLocal."1";
            } else {
                $permisosUsuarioLocal = $permisosUsuarioLocal."0";
            }
            //Proveedores
            if ($this->input->post('chkProveedores')=="on") {
                $permisosUsuarioLocal = $permisosUsuarioLocal."1";
            } else {
                $permisosUsuarioLocal = $permisosUsuarioLocal."0";
            }
            //Clientes
            if ($this->input->post('chkClientes')=="on") {
                $permisosUsuarioLocal = $permisosUsuarioLocal."1";
            } else {
                $permisosUsuarioLocal = $permisosUsuarioLocal."0";
            }
            //Empleados
            if ($this->input->post('chkEmpleados')=="on") {
                $permisosUsuarioLocal = $permisosUsuarioLocal."1";
            } else {
                $permisosUsuarioLocal = $permisosUsuarioLocal."0";
            }
            //Configuracion
            if ($this->input->post('chkConfiguracion')=="on") {
                $permisosUsuarioLocal = $permisosUsuarioLocal."1";
            } else {
                $permisosUsuarioLocal = $permisosUsuarioLocal."0";
            }
            //fin procesado de permisos de usuario
            
            //LLamadfo de WS
            $idUsuario = $this->input->post("idUsuario");
            $usuario = $this->input->post("usuario");
            $clave = md5($this->input->post("clave"));
            $permisos = $permisosUsuarioLocal;
            $nombre = $this->input->post("nombre");
            $apellido_paterno = $this->input->post("apellido_paterno");
            $apellido_materno = $this->input->post("apellido_materno");
            $telefono_casa = $this->input->post("telefono_casa");
            $telefono_celular = $this->input->post("telefono_celular");
            
            $data = array("idUsuario" => $idUsuario, 
                "usuario" => $usuario, 
                "clave" => $clave, 
                "permisos" => $permisos, 
                "nombre" => $nombre, 
                "apellido_paterno" => $apellido_paterno, 
                "apellido_materno" => $apellido_materno, 
                "telefono_casa" => $telefono_casa, 
                "telefono_celular" => $telefono_celular
                    );
            $data_string = json_encode($data);
            $ch = curl_init('http://localhost/matserviceswsok/usuarios/actualizar_usuario.php');
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
            );
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            //execute post
            $result = curl_exec($ch);
            //close connection
            curl_close($ch);
            echo $result;
            
            //Fin llamado WS
//            redirect('contenido4');
            $this->mostrarUsuarios();
        }
    }

    function eliminarUsuario($idUsuario) {
        $data = array("idUsuario" => $idUsuario);
        $data_string = json_encode($data);
        $ch = curl_init('http://localhost/matserviceswsok/usuarios/borrar_usuario.php');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        //echo $result;

        //Fin llamado WS
//            redirect('contenido4');
        redirect('/usuarios_controller/mostrarUsuarios');
    }
    
    function nuevoProveedor() {
        $data = array('nombre_Empresa'=>'checar despues',
            'permisos' => $this->session->userdata('permisos'));
        $this->load->view('layouts/header_view',$data);
        $this->load->view('proveedores/nuevoProveedor_view',$data);
        $this->load->view('layouts/pie_view',$data);
    }

    function nuevoProveedorFromFormulario()
    {
        if ($this->input->post('submit')){
            //LLamadfo de WS
            $empresa = $this->input->post("empresa");
            $nombre = $this->input->post("nombre");
            $apellidos = $this->input->post("apellidos");
            $telefono_casa = $this->input->post("telefono_casa");
            $telefono_celular = $this->input->post("telefono_celular");
            $direccion1 = $this->input->post("direccion1");
            $direccion2 = $this->input->post("direccion2");
            $rfc = $this->input->post("rfc");
            $email = $this->input->post("email");
            $ciudad = $this->input->post("ciudad");
            $estado = $this->input->post("estado");
            $cp = $this->input->post("cp");
            $pais = $this->input->post("pais");
            $comentarios = $this->input->post("comentarios");
            $noCuenta = $this->input->post("noCuenta");
            
            $data = array("empresa" => $empresa, 
                "nombre" => $nombre,
                "apellidos" => $apellidos,
                "telefono_casa" => $telefono_casa,
                "telefono_celular" => $telefono_celular,
                "direccion1" => $direccion1,
                "direccion2" => $direccion2,
                "rfc" => $rfc,
                "email" => $email,
                "ciudad" => $ciudad,
                "estado" => $estado,
                "cp" => $cp,
                "pais" => $pais,
                "comentarios" => $comentarios,
                "noCuenta" => $noCuenta
                    );
            $data_string = json_encode($data);
            $ch = curl_init('http://localhost/matserviceswsok/proveedores/insertar_proveedor.php');
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
            );
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            //execute post
            $result = curl_exec($ch);
            //close connection
            curl_close($ch);
            echo $result;
            
            //Fin llamado WS
//            redirect('contenido4');
            $this->mostrarProveedores();
        }
    }
    //Fin llamada a webservices de usuarios
    
    //Importar desde Excel con libreria de PHPExcel
    public function importarUsersExcel(){
        $data = array('nombre_Empresa'=>'checar despues',
            'permisos' => $this->session->userdata('permisos'));
        $this->load->view('layouts/header_view',$data);
        $this->load->view('usuarios/importarUsersFromExcel_view',$data);
        $this->load->view('layouts/pie_view',$data);
    }        

    //Importar desde Excel con libreria de PHPExcel
    public function importarExcel(){
        //Cargar PHPExcel library
        $this->load->library('excel');
        $name   = $_FILES['excel']['name'];
        $tname  = $_FILES['excel']['tmp_name'];
        $obj_excel = PHPExcel_IOFactory::load($tname);       
        $sheetData = $obj_excel->getActiveSheet()->toArray(null,true,true,true);
        $arr_datos = array();
        foreach ($sheetData as $index => $value) {            
            if ( $index != 1 ){
                $arr_datos = array(
                        'usuario' => $value['A'],
                        'clave' => $value['B'],
                        'permisos' => $value['C'],
                        'nombre' => $value['D'],
                        'apellido_paterno' => $value['E'],
                        'apellido_materno' => $value['F'],
                        'telefono_casa' => $value['G'],
                        'telefono_celular' => $value['H']
                ); 
                foreach ($arr_datos as $llave => $valor) {
                    $arr_datos[$llave] = $valor;
                }
                //$this->db->insert('usuarios',$arr_datos);
                
                //Llamada de ws para insertar
                $data_string = json_encode($arr_datos);
                $ch = curl_init('http://localhost/matserviceswsok/usuarios/insertar_usuario.php');
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data_string))
                );
                curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                //execute post
                $result = curl_exec($ch);
                //close connection
                curl_close($ch);
                //echo $result;
            } 
        }
        $this->mostrarUsuarios();
    }        
    //Fin Importar desde Excel con libreria de PHPExcel
    
    //Exportar datos a Excel
    public function exportarExcel(){
        //llamadod de ws
        # An HTTP GET request example
        $url = 'http://localhost/matserviceswsok/usuarios/obtener_usuarios.php';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        $datos = json_decode($data);
        curl_close($ch);
        //fin llamado de ws
        $id=$this->uri->segment(3);
//        $nilai=$this->login_model->obtieneUsuarios();
        $nilai=$datos->{'usuarios'};
//        if (isset($datos->{'usuarios'})) {
//            foreach($nilai as $h){
//                echo "azul";
//            }
//        }
        $totn = 0;
        foreach($nilai as $h){
            $totn = $totn + 1;
        }
        $heading=array('USUARIO','CLAVE','PERMISOS','NOMBRE','AP.PATERNO','AP.MATERNO','TEL.CASA','CELULAR');
        $this->load->library('excel');
        //Create a new Object
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getActiveSheet()->setTitle("Empleados");
        //Loop Heading
        $rowNumberH = 1;
        $colH = 'A';
        foreach($heading as $h){
            $objPHPExcel->getActiveSheet()->setCellValue($colH.$rowNumberH,$h);
            $colH++;    
        }
        //Loop Result
        //$totn=$nilai->num_rows();
        $maxrow=$totn+1;
        $row = 2;
        $no = 1;
        foreach($nilai as $n){
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$row,$n->{'usuario'});
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$row,"1");
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$row,$n->{'permisos'});
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$row,$n->{'nombre'});
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$row,$n->{'apellido_paterno'});
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$row,$n->{'apellido_materno'});
            $objPHPExcel->getActiveSheet()->setCellValue('G'.$row,$n->{'telefono_casa'});
            $objPHPExcel->getActiveSheet()->setCellValue('H'.$row,$n->{'telefono_celular'});
            $row++;
            $no++;
        }
        //Freeze pane
        $objPHPExcel->getActiveSheet()->freezePane('A2');
        //Cell Style
        $styleArray = array(
                'borders' => array(
                        'allborders' => array(
                                'style' => PHPExcel_Style_Border::BORDER_THIN
                        )
                )
        );
        $objPHPExcel->getActiveSheet()->getStyle('A1:H'.$maxrow)->applyFromArray($styleArray);
        //Save as an Excel BIFF (xls) file
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Empleados.xls"');
        header('Cache-Control: max-age=0');
        $objWriter->save('php://output');
        exit();
    }	
    //fin exportar a excel
    
    // Manejo de sesiones
    function cerrarSesion() {            
            if ($this->sistema_model->logout()) {
                $data = array('error'=>'1');
                redirect($this->index(),$data);
            }
    }
    
    //Fin Manejo de sesiones
    
    
}
