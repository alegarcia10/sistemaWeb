<?= form_open("/codigofacilito/recibirdatos") ;?>


<?

$nombre = array('name' => 'nombre'  ,
'placeholder' => 'Escribe Tu Nombre'
);

$videos = array('name'=> 'videos',
'placeholder' => 'Cantidad de Videos del curso');

?>


<label>
Nombre:
<?= form_input($nombre) ?>

</label>
<label>
Numero de Videos
<?= form_input($nombre) ?>

</label>
<?= form_close()?>
</body>
</html>
