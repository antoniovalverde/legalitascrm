            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Antonio Valverde 2022 <?= date("Y") != "2022" ? "- " . date("Y"): ""; ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <form>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Nos vamos?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pulsa "Desconectar" si quieres cerrar tu sesión.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="#"><input type="submit" name="act" value="Salir"/></a>
                </div>
            </div>
        </div>
    </div>
    </form>
    <!-- Bootstrap core JavaScript-->
    <script src="../libs/jquery/jquery.min.js"></script>
    <script src="../libs/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../libs/sbadmin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../libs/datatables/js/jquery.dataTables.js"></script>
    <script src="../libs/datatables/js/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../libs/datatables/js/datatables-demo.js"></script>

    <!-- Page level custom scripts for alertify -->
    <script src="../libs/alertify/js/alertify.js"></script>

    <!-- Page level custom scripts for users -->
    <script src="../js/users.js"></script>

    <!-- Page level custom scripts for users -->
    <script src="../js/contratos.js"></script>

</body>

</html>