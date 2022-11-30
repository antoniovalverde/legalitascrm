                <!-- Begin Page Content -->
                <div id="tablaContratos" class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Contratos</h1>
                    </div>
                    <!-- Content Row -->
                    <div class="container-fluid">
                    <!-- DataTales Example -->
                    <?php 
	                    //Incluimos la clase conexion
	                    require_once "../clases/conexion.php";
	                    $obj= new conectar();
	                    $conexion=$obj->conexion();
	                    //Consulta con todos los usuarios.
	                    $sql="SELECT * FROM users ORDER BY nombre_user ASC";
	                    $result=mysqli_query($conexion,$sql);
					?>                    
                    <!-- Insertar consulta -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <span id="btnAgregarContrato" class="btn btn-info">
							    Agregar Contrato <span class="fa fa-plus-circle"></span>
						    </span>
                            <!-- <h6 class="m-0 font-weight-bold text-primary">Tabla de Usuarios</h6> -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><center>Nombre</center></th>
                                            <th><center>Mail</center></th>
                                            <th><center>Perfil</center></th>
                                            <th><center>Editar</center></th>
                                            <th><center>Eliminar</center></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th><center>Nombre</center></th>
                                            <th><center>Mail</center></th>
                                            <th><center>Perfil</center></th>
                                            <th><center>Editar</center></th>
                                            <th><center>Eliminar</center></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
										while ($mostrar=mysqli_fetch_row($result)) {
									?>
                                        <tr>
                                            <td><center><?php echo $mostrar[1] ?></center></td>
                                            <td><center><?php echo $mostrar[2] ?></center></td>
                                            <td><center><?php echo $mostrar[4] ?></center></td>
                                            <td><center><span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditarUsuario" onclick="agregaFrmActualizarUsuario('<?php echo $mostrar[0] ?>')">
								                <span class="fas fa-pen"></span></span></center>
                                            </td>
                                            <td>
                                                <?php				
								                    if($mostrar[0] != 1){ 
							                    ?>
                                                <center><span class="btn btn-danger btn-sm" onclick="eliminarDatosUsuario('<?php echo $mostrar[0] ?>')">
								                <span class="fas fa-trash"></span></span></center>
                                                <?php
                                                    }
                                                ?>
                                            </td>
                                        </tr>
									<?php
										}
									?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>  
                </div>
				</div>
                <!-- /.container-fluid -->
				<div id="tabsContratos" style="display:none;" class="container-fluid">
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Agregar Contrato</h1>
                    </div>
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  								<li class="nav-item" role="presentation">
    								<button class="nav-link active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Cliente</button>
  								</li>
  								<li class="nav-item" role="presentation">
    								<button class="nav-link" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Dirección</button>
  								</li>
  								<li class="nav-item" role="presentation">
    								<button class="nav-link" id="pills-contact-tab" data-toggle="pill" data-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contratación</button>
  								</li>
  								<li class="nav-item" role="presentation">
    								<button class="nav-link" id="pills-contact2-tab" data-toggle="pill" data-target="#pills-contact2" type="button" role="tab" aria-controls="pills-contact2" aria-selected="false">Info Comercial</button>
  								</li>
							</ul>
						</div>
						<div class="card-body">
							<div class="tab-content" id="pills-tabContent">
  								<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
									La Uno
								</div>
  								<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
									Segunda
								</div>
  								<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
								  	Vamos por la 3
								</div>
  								<div class="tab-pane fade" id="pills-contact2" role="tabpanel" aria-labelledby="pills-contact2-tab">
								  	A la cuarta...
								</div>
							</div>
							<button id="volverTabs" type="button" class="btn btn-secondary" >Volver</button>
						</div>
					</div>
				</div>
            <!-- End of Main Content -->

	        <!-- Modal para agregar usuario -->
	        <div class="modal fade" id="agregarcontratoomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		        <div class="modal-dialog" role="document">
			        <div class="modal-content">
				        <div class="modal-header">
				            <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo Contrato</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						        <span aria-hidden="true">&times;</span>
					        </button>
				        </div>
				        <div class="modal-body">
					        <form id="frmnuevousuario">
						        <label>Nombre</label>
						        <input type="text" class="form-control input-sm" id="nombre" name="nombre">
						        <label>Mail</label>
						        <input type="text" class="form-control input-sm" id="mail" name="mail">
						        <label>Contraseña</label>
						        <input type="password" class="form-control input-sm" id="pass1" name="pass1">
						        <label>Verificar Contraseña</label>
						        <input type="password" class="form-control input-sm" id="pass2" name="pass2">																						
						        <br>
						        <table>
							        <tr>
								        <td>
									        <strong>Perfil</strong>
								        </td>
								        <td>
									        <select name="perfil">
										        <option value="1">Administrador</option>
										        <option value="2">Empleado</option>
                                                <option value="3">Comercial</option>
									        </select>
								        </td>
							        </tr>
						        </table>
					        </form>
				        </div>
				        <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					        <button type="button" id="btnAgregarnuevousuario" class="btn btn-primary">Agregar Usuario</button>
				        </div>
			        </div>
		        </div>
	        </div> 
            
            <!-- Modal para edición de Usuario -->
	        <div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		        <div class="modal-dialog" role="document">
			        <div class="modal-content">
				        <div class="modal-header">
				            <h5 class="modal-title" id="exampleModalLabel">Actualizar Usuario</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						        <span aria-hidden="true">&times;</span>
					        </button>
				        </div>
				        <div class="modal-body">
					        <form id="frmnuevousuarioU">
						        <input type="hidden" id="idU" name="idU">
						        <label>Nombre</label>
						        <input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
                                <label>Mail</label>
						        <input type="text" class="form-control input-sm" id="mailU" name="mailU">
						        <label>Contraseña</label>
						        <input type="password" class="form-control input-sm" id="pass1U" name="pass1U">
						        <label>Verificar Contraseña</label>
						        <input type="password" class="form-control input-sm" id="pass2U" name="pass2U">
						        <input type="hidden" id="passchange" name="passchange" value="0">
                                <br>
						        <table>
							        <tr>
								        <td>
									        <strong>Perfil</strong>
								        </td>
								        <td>
									        <select id="perfilU" name="perfilU">
										        <option value="1">Administrador</option>
										        <option value="2">Empleado</option>
                                                <option value="3">Comercial</option>
									        </select>
								        </td>
							        </tr>
						        </table>																										
					        </form>
				        </div>
				        <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					        <button type="button" class="btn btn-warning" id="btnActualizarUsuario">Actualizar</button>
				        </div>
			        </div>
		        </div>
	        </div>