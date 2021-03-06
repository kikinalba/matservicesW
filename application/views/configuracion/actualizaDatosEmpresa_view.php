<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php if ($nombre_Empresa != "") { echo $nombre_Empresa; }?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="distributor" content="Global" />
    <meta itemprop="contentRating" content="General" />
    <meta name="robots" content="All" />
    <meta name="revisit-after" content="7 days" />
    <meta name="description" content="The source of truly unique and awesome jquery plugins." />
    <meta name="keywords" content="slider, carousel, responsive, swipe, one to one movement, touch devices, jquery, plugin, bootstrap compatible, html5, css3" />
    <meta name="author" content="w3widgets.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Economica' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>css/bootstrap.css" rel="stylesheet">
  
                <style type="text/css" title="currentStyle">
			@import "<?php echo base_url();?>media/css/demo_page.css";
			@import "<?php echo base_url();?>media/css/demo_table.css";
		</style>
		<script type="text/javascript" language="javascript" src="<?php echo base_url();?>media/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url();?>media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable( {
					"sPaginationType": "full_numbers"
				} );
			} );
		</script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12" style="border: 1px solid #FFF;border-color: red">
            <h3 style="text-align: center">Configuraci&oacute;n General del Sistema</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6" style="border: 1px solid #FFF;border-color: red">
            <h4>Categor&iacute;as</h4>
            <p><a class="btn btn-xs btn-success" href="nuevoCategoria">Nueva Categor&iacute;a</a>
            <a class="btn btn-xs btn-success" href="importarCategoriasExcel">Importar desde Excel</a>
            <a class="btn btn-xs btn-success" href="exportarCategoriaExcel">Exportar a Excel</a></p>
            <div class="table-responsive">     
                <table class="table" cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                    <thead>
                        <tr>
                            <th>Categor&iacute;a</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($categorias) {
                            $i=1;
                            foreach($categorias as $fila) {
                            ?>
                                <tr id="fila-<?php echo $fila->{'idCategoria'} ?>">
                                    <td><?php echo $fila->{'descripcionCategoria'} ?></td>

                                    <td><a class="btn btn-xs btn-primary" href="actualizarCategoria/<?php echo $fila->{'idCategoria'} ?>">Editar</a>
                                    <a id="elimina<?php echo $i ?>" class='btn btn-xs btn-danger' href="eliminarCategoria/<?php echo $fila->{'idCategoria'} ?>" onclick="preguntar(<?php echo $i ?>)">Borrar</a></td>
                                </tr>
                                <?php $i++; 
                            }   
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Categor&iacute;a</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <br>
        </div>	
        <div class="col-md-6">
            <form class="form-horizontal" role="form" action="<?php echo base_url();?>index.php/configuracion_controller/actualizarDatosEmpresaFromFormulario" method="post">
                <h4>Modificar Datos de la Empresa</h4>
                <input type="hidden" name="idEmpresa" id="idEmpresa" value="<?php echo $datosEmpresa->{'idEmpresa'}; ?>" />

                <div class="form-group">
                    <label class="control-label col-sm-2" for="nombreEmpresa">Categor&iacute;a:</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" id="nombreEmpresa" name="nombreEmpresa" value="<?php echo $datosEmpresa->{'nombreEmpresa'}; ?>" placeholder="Descripci&oacute;n de la Categor&iacute;a">
                  </div>					  
                </div>  
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="rfcEmpresa">RFC:</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" id="rfcEmpresa" name="rfcEmpresa" value="<?php echo $datosEmpresa->{'rfcEmpresa'}; ?>" placeholder="RFC">
                  </div>					  
                </div>  
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="direccionEmpresa">Direcci&oacute;n:</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" id="direccionEmpresa" name="direccionEmpresa" value="<?php echo $datosEmpresa->{'direccionEmpresa'}; ?>" placeholder="Direcci&oacute;n">
                  </div>					  
                </div>  
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="emailEmpresa">Email:</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" id="emailEmpresa" name="emailEmpresa" value="<?php echo $datosEmpresa->{'emailEmpresa'}; ?>" placeholder="Email">
                  </div>					  
                </div>  
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="telEmpresa">Tel&eacute;fono:</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" id="telEmpresa" name="telEmpresa" value="<?php echo $datosEmpresa->{'telEmpresa'}; ?>" placeholder="Tel&eacute;fono:">
                  </div>					  
                </div>  
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="cpEmpresa">CP:</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" id="cpEmpresa" name="cpEmpresa" value="<?php echo $datosEmpresa->{'cpEmpresa'}; ?>" placeholder="CP">
                  </div>					  
                </div>  
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="ciudadEmpresa">Ciudad:</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" id="ciudadEmpresa" name="ciudadEmpresa" value="<?php echo $datosEmpresa->{'ciudadEmpresa'}; ?>" placeholder="Ciudad">
                  </div>					  
                </div>  
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="estadoEmpresa">Estado:</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" id="estadoEmpresa" name="estadoEmpresa" value="<?php echo $datosEmpresa->{'estadoEmpresa'}; ?>" placeholder="Estado">
                  </div>					  
                </div>  
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="paisEmpresa">Pa&iacute;s:</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" id="paisEmpresa" name="paisEmpresa" value="<?php echo $datosEmpresa->{'paisEmpresa'}; ?>" placeholder="Pa&iacute;s">
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
                                    <a href="<?php echo base_url();?>index.php/configuracion_controller/mostrarValores">
                                    <button type="button" class="btn btn-xs btn-danger">Regresar</button>
                                    </a>
                              </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div> <!-- / renglon-->
</div> <!-- /container -->
</body>	
</html>
