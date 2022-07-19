        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.1.0
            </div>
            <strong>Copyright &copy; <a id="marcaFooter"href="" >GALTech</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/template/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- dataTable -->
<script src="<?php echo base_url();?>assets/template/datatables.net-bs/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/template/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/template/dist/js/demo.js"></script>
<script>
$(document).ready(function () {
$('.sidebar-menu').tree()
})
</script>
</body>
</html>

<script tyoe="text/javascript">
    $(document).ready(function () {
  $('#example2').DataTable({
             "language": {
                 "lengthMenu": "Mostrar _MENU_ registros por pagina",
                 "zeroRecords": "No se encontraron resultados en su busqueda",
                 "searchPlaceholder": "Buscar registros",
                 "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
                 "infoEmpty": "No existen registros",
                 "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                 "search": "Buscar:",
                 "paginate": {
                     "first": "Primero",
                     "last": "Último",
                     "next": "Siguiente",
                     "previous": "Anterior"
                 },
             }
        });
 })
</script>


<script type="text/javascript">
    (function(document) {
      'use strict';

      var LightTableFilter = (function(Arr) {

        var _input;

        function _onInputEvent(e) {
          _input = e.target;
          var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
          Arr.forEach.call(tables, function(table) {
            Arr.forEach.call(table.tBodies, function(tbody) {
              Arr.forEach.call(tbody.rows, _filter);
            });
          });
        }

        function _filter(row) {
          var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
          row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
        }

        return {
          init: function() {
            var inputs = document.getElementsByClassName('light-table-filter');
            Arr.forEach.call(inputs, function(input) {
              input.oninput = _onInputEvent;
            });
          }
        };
      })(Array.prototype);

      document.addEventListener('readystatechange', function() {
        if (document.readyState === 'complete') {
          LightTableFilter.init();
        }
      });

    })(document);
    </script>


