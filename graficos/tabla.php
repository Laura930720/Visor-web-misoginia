<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">



    <style type="text/css">
    thead input {
        width: 80%;
        padding: 3px;
        box-sizing: border-box;
    }
    .dataTables_filter input { width: 100px; height: 20px; font-size: 10px; border-radius: 4px; border: 1px solid #ccc;margin-right: 20px; }
    label{font-size: 80%}
    </style>

    <script type="text/javascript">
  $(document).ready(function() {
        // Append a caption to the table before the DataTables initialisation
        $('#example2').append('<caption style="caption-side: bottom">Los espacios de arriba son para realizar búsquedas por columna</caption>');
 
          $('#example2').DataTable( {
             dom: 'Bfrtip',
      
      
            "language":{
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sSearch":         "Buscar por palabra:",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }

            }
         });
    }  ); 
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#example2 tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" class="form-control" style="font-size:90%" placeholder="" />' );
        } );
     
        // DataTable
        var table = $('#example2').DataTable();
     
        // Apply the search
        table.columns().every( function () {
            var that = this;
           
            $('input', this.footer() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );
    } );
    </script>
</head>
<body>

	<?php
include("conexion2.php");

$con = mysqli_connect($servidor, $usuario, $pass, $db);

if (!$con) {
    die('Error de Conexión (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
mysqli_set_charset( $con, 'utf8');

$sql="SELECT * FROM datos_violencia WHERE 1";
$result=mysqli_query($con,$sql);

?>


<table id="example2" class="table table-condensed" cellspacing="0" width="100%" style="font-size:70%">

        <thead align="center">
            <tr style="font-weight: bold;">
              
                <td width="100px">Entidad</td>
                <td>Tweets misóginos</td>
                <td>Total tweets</td>
                <td>% tweets misóginos</td>
                <td>Feminicidios SESNSP</td>
                <td>Población femenina</td>
                <td>Tasa fem p/c 100 mil</td>
                <td>Feminicidios prensa</td>
                <td>Tasa fem prensa p/c 100 mil</td>
                
            </tr>

            

        </thead>

        <tbody align="center">


<?php
while ($cons=mysqli_fetch_array($result)) {
        $entidad = $cons['entidad'];
        $misotuits = $cons['misotuits'];
        $tot_tuits = $cons['tot_tuits'];
        $tasa_misotuits = $cons['tasa_misotuits'];
        $femin_secretariado = $cons['femin_secretariado'];
        $pob_fem15 = $cons['pob_fem15'];
        $tasa_fem_cienmil = $cons['tasa_fem_cienmil'];
        $feminicidios = $cons['feminicidios'];
        $tasa_femp_cienmil = $cons['tasa_femp_cienmil'];
?>
        <tr>


                <td width="100px"><?php echo $entidad; ?></td>
                <td><?php echo $misotuits; ?></td>
                <td><?php echo $tot_tuits ?></td>
                <td><?php echo $tasa_misotuits ?></td>
                <td><?php echo $femin_secretariado ?></td>
                <td><?php echo $pob_fem15 ?></td>
                <td><?php echo $tasa_fem_cienmil ?></td>
                <td><?php echo $feminicidios ?></td>
                <td><?php echo $tasa_femp_cienmil ?></td>
            
            <?php } ?>
            </tr>
        
        </tbody>
        <tfoot>
            <tr>
                
                
                <th width="100px">Entidad</th>
                <th>Tweets misóginos</th>
                <th>Total tweets</th>
                <th>% tweets misóginos</th>
                <th>Feminicidios SESNSP</th>
                <th>Población femenina</th>
                <th>Tasa fem p/c 100 mil</th>
                <th>Feminicidios prensa</th>
                <th>Tasa fem prensa p/c 100 mil</th>

              
                
            
            </tr>
        </tfoot>
    </table>

</body>
</html>