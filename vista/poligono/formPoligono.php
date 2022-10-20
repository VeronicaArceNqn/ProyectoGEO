<?php
$dir="";
$titulo="Poligono";
include_once '../estructura/header.php';
$lat1=-41.10;
$lon1=-71.30;
$lat2=-38.96;
$lon2=-68.10;
$lat3=-36.20;
$lon3=-70.50;
$lat4=-39.50;
$lon4=-71.40;

?>

<div class="container border border-secondary principal mt-3 pt-3">
    <h3 class="text-center">Pol&iacute;gono</h3>
    <p>El pol&iacute;gono es similar a una polil&iacute;nea, requiere de un m&iacute;nimo de 3 pares de coordenadas pero sus puntos inicial y final est&aacute;n conectados.</p>
    <form method="post" class="row m-3 p-4 pt-3 bg-light fw-bold needs-validation" action="accion/accionPoligono.php" novalidate>

    <div class="col-md-3 border border-secondary  rounded pb-2">

<label for="coordenadas[0][latitud]" class="form-label">Latitud</label>
<input type="number" class="form-control" name="coordenadas[0][latitud]" min="-90" max="90" step='any' value="<?php echo $lat1; ?>" required>



<label for="coordenadas[0][longitud]" class="form-label">Longitud </label>
<input type="number" class="form-control" name="coordenadas[0][longitud]" min="-180" max="180" step='any' value="<?php echo $lon1; ?>" required>


</div>

<div class="col-md-3  border border-secondary">

<label for="coordenadas[1][latitud]" class="form-label">Latitud</label>
<input type="number" class="form-control" name="coordenadas[1][latitud]" min="-90" max="90" value="<?php echo $lat2; ?>" step='any' required>



<label for="coordenadas[1][longitud]" class="form-label">Longitud</label>
<input type="number" class="form-control" name="coordenadas[1][longitud]" min="-180" max="180" value="<?php echo $lon2; ?>" step='any' required>


</div>
<div class="col-md-3 border border-secondary pb-2">

<label for="coordenadas[2][latitud]" class="form-label">Latitud </label>
<input type="number" class="form-control" name="coordenadas[2][latitud]" min="-90" max="90" value="<?php echo $lat3; ?>" step='any' required>



<label for="coordenadas[2][longitud]" class="form-label">Longitud </label>
<input type="number" class="form-control" name="coordenadas[2][longitud]" min="-180" max="180" step='any' value="<?php echo $lon3; ?>" required>


</div>
<div class="col-md-3 border border-secondary pb-2">

<label for="coordenadas[3][latitud]" class="form-label">Latitud </label>
<input type="number" class="form-control" name="coordenadas[3][latitud]" min="-90" max="90" step='any' value="<?php echo $lat4; ?>" required>



<label for="coordenadas[3][longitud]" class="form-label">Longitud</label>
<input type="number" class="form-control" name="coordenadas[3][longitud]" min="-180" max="180" value="<?php echo $lon4; ?>" step='any' required>


</div>

        <input id="accion" name="accion" value="nuevo" type="hidden">
        <div class="col-12 pt-5">
            <button class="btn btn-success d-grid gap-2 col-3 mx-auto" type="submit">Enviar</button>
        </div>
    </form>

</div>
</div>
<script src="../js/validacionFormulario.js"></script>
<?php
include_once '../estructura/footer.php';
?>