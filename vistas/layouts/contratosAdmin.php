                <!-- Begin Page Content -->
                <div class="container-fluid">

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
                            <span class="btn btn-info">
								<input type="submit" name="act" value="Agregar Contrato"/>&nbsp;<span class="fa fa-plus-circle"></span>
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
            </div>
            <!-- End of Main Content -->