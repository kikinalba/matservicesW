<html>
    <head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.css" />
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
<body>      
    <div class="container"> <!--class="container-fluid" -->
            <div class="row-fluid">
                <div class="col-sm-9">
                    <form class="form-horizontal" role="form" action="<?php echo base_url();?>index.php/proveedores_controller/actualizarProveedorFromFormulario" method="post">
                        <h4>Actualizaci&oacute;n de Proveedores</h4>
                        <input type="hidden" name="idProveedor" id="idProveedor" value="<?php echo $proveedor->{'idProveedor'}; ?>" />

                        <div class="form-group">
                          <label class="control-label col-sm-2" for="empresa">Empresa:</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="empresa" name="empresa" value="<?php echo $proveedor->{'empresa'}; ?>" placeholder="Nombre Empresa">
                          </div>					  
                        </div>  

                        <div class="form-group">
                          <label class="control-label col-sm-2" for="nombre">Nombre:</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $proveedor->{'nombre'}; ?>" placeholder="Nombre Representante">
                          </div>					  
                        </div>  
                    
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="apellidos">Apellidos:</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $proveedor->{'apellidos'}; ?>" placeholder="Apellidos Representante">
                          </div>					  
                        </div>  

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="telefono_casa">Tel&eacute;fono Empresa:</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="telefono_casa" name="telefono_casa" value="<?php echo $proveedor->{'telefono_casa'}; ?>" placeholder="Tel&eacute;fono Empresa">
                          </div>					  
                        </div>  
                    
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="telefono_celular">Celular:</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="telefono_celular" name="telefono_celular" value="<?php echo $proveedor->{'telefono_celular'}; ?>" placeholder="Celular Representante">
                          </div>					  
                        </div>  
                    
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="direccion1">Direcci&oacute;n 1:</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="direccion1" name="direccion1" value="<?php echo $proveedor->{'direccion1'}; ?>" placeholder="Direcci&oacute;n 1">
                          </div>					  
                        </div>  
                    
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="direccion2">Direcci&oacute;n 2:</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="direccion2" name="direccion2" value="<?php echo $proveedor->{'direccion2'}; ?>" placeholder="Direcci&oacute;n 2">
                          </div>					  
                        </div>  
                    
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="rfc">RFC:</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="rfc" name="rfc" value="<?php echo $proveedor->{'rfc'}; ?>" placeholder="RFC">
                          </div>					  
                        </div>  
                    
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Email:</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="email" name="email" value="<?php echo $proveedor->{'email'}; ?>" placeholder="Email">
                          </div>					  
                        </div>  
                    
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="ciudad">Ciudad:</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?php echo $proveedor->{'ciudad'}; ?>" placeholder="Ciudad">
                          </div>					  
                        </div>  
                    
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="estado">Estado:</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $proveedor->{'estado'}; ?>" placeholder="Estado">
                          </div>					  
                        </div>  
                    
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="cp">CP:</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="cp" name="cp" value="<?php echo $proveedor->{'cp'}; ?>" placeholder="C&oacute;digo Postal">
                          </div>					  
                        </div>  
                    
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pais">Pa&iacute;s:</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="pais" name="pais" value="<?php echo $proveedor->{'pais'}; ?>" placeholder="Pa&iacute;s">
                          </div>					  
                        </div>  
                    
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="comentarios">Comentarios:</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="comentarios" name="comentarios" value="<?php echo $proveedor->{'comentarios'}; ?>" placeholder="Comentarios">
                          </div>					  
                        </div>  
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="noCuenta">No. Cuenta:</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="noCuenta" name="noCuenta" value="<?php echo $proveedor->{'noCuenta'}; ?>" placeholder="No. Cuenta">
                      </div>					  
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
                                            <a href="<?php echo base_url();?>index.php/proveedores_controller/mostrarProveedores">
                                            <button type="button" class="btn btn-xs btn-danger">Regresar</button>
                                            </a>
                                      </div>
                                    </div>
                                </td>
                            </tr>
                        </table> 
                    </form>
                </div>	
                <div class="col-sm-3">		
                </div>		
            </div>
	</div>
</body>
</html>