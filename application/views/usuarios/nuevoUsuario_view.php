<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.css" />
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>      
    <div class="container"> <!--class="container-fluid" -->
        <div class="row-fluid">
            <div class="col-sm-1">		
            </div>		
            <div class="col-sm-6">
                <form class="form-horizontal" role="form" action="<?php echo base_url();?>index.php/usuarios_controller/nuevoUsuarioFromFormulario" method="post">
                    <h4>Alta de Empleados</h4>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="usuario">Usuario:</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
                      </div>					  
                    </div>  

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="clave">Clave:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="clave" name="clave" placeholder="Clave">
                        </div>					  
                    </div> 

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nombre">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                        </div>					  
                    </div> 

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="apellido_paterno">Apellido Paterno:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" placeholder="Apellido Paterno">
                        </div>					  
                    </div> 

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="apellido_materno">Apellido Materno:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" placeholder="Apellido Materno">
                        </div>					  
                    </div> 

                    <div class="form-group">
                      <label class="control-label col-sm-2" for="telefono_casa">Telefono Casa:</label>
                      <div class="col-sm-10">
                            <input type="text" class="form-control" id="telefono_casa" name="telefono_casa" placeholder="Tel.Casa">
                      </div>					  
                    </div> 

                    <div class="form-group">
                      <label class="control-label col-sm-2" for="telefono_celular">Telefono Celular:</label>
                      <div class="col-sm-10">
                            <input type="text" class="form-control" id="telefono_celular" name="telefono_celular" placeholder="Tel. Celular">
                      </div>					  
                    </div> 

                    <div class="form-group">
                        <fieldset border="3">
                            <legent>Permisos</legent>
                            <div class="checkbox">		
                                <label><input type="checkbox" name="chkInventario"> Inventario</label>
                                <label><input type="checkbox" name="chkVentas">Ventas</label>
                                <label><input type="checkbox" name="chkCompras">Compras</label>
                                <label><input type="checkbox" name="chkConsultas">Consultas</label>
                                <label><input type="checkbox" name="chkProveedores">Proveedores</label>
                                <label><input type="checkbox" name="chkClientes">Clientes</label>
                                <label><input type="checkbox" name="chkEmpleados">Empleados</label>
                                <label><input type="checkbox" name="chkConfiguracion">Configuraci&oacute;n</label>
                            </div>
                        </fieldset>	 
                    </div> 

                    <table>
                        <tr>
                            <td>
                                <div class="form-group">        
                                  <div class="col-sm-offset-2 col-sm-10">
                                        <?php $submitBtn = array('class' => 'btn btn-xs btn-success
                                        ',  'value' => 'Procesar', 'name'=>'submit'); 
                                        echo form_submit($submitBtn); ?>
                                  </div>
                                </div>							
                            </td>
                            <td>
                                <div class="form-group">        
                                  <div class="col-sm-offset-2 col-sm-10">
                                        <a href="<?php echo base_url();?>index.php/usuarios_controller/mostrarUsuarios">
                                        <button type="button" class="btn btn-xs btn-danger">Regresar</button>
                                        </a>
                                  </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>	
            <div class="col-sm-5">		
            </div>		
        </div>
    </div>
</body>
</html>