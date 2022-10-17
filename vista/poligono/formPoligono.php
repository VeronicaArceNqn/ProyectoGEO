<?php
$dir="";
$titulo="Poligono";
include_once '../estructura/header.php';
$lat1=41.05;
$lon1=-4.79;
$lat2=40.39;
$lon2=-6.09;
$lat3=39.29;
$lon3=-5.85;
$lat4=38.94;
$lon4=-2.59;

?>

<div class="container border border-secondary principal mt-3 pt-3">
    <h3 class="text-center">Poligono</h3>
    <form method="post" class="row m-3 p-4 pt-3 bg-light fw-bold needs-validation" action="accion/accionPoligono.php" novalidate>

    <div class="col-md-3 border border-secondary pb-2">

<label for="coordenadas[0][latitud]" class="form-label">Latitud (min:-90 y max:90)</label>
<input type="number" class="form-control" name="coordenadas[0][latitud]" min="-90" max="90" step='0.01000' value="<?php echo $lat1; ?>" required>
<div class="invalid-feedback">
    Ingrese valor min:-90 y max:90
</div>
<div class="valid-feedback">
    Correcto!
</div>

<label for="coordenadas[0][longitud]" class="form-label">Longitud (min:-180 y max:180)</label>
<input type="number" class="form-control" name="coordenadas[0][longitud]" min="-180" max="180" step='0.01' value="<?php echo $lon1; ?>" required>
<div class="invalid-feedback">
    Ingrese valor min:-180 y max:180
</div>
<div class="valid-feedback">
    Correcto!
</div>
</div>

<div class="col-md-3  border border-secondary">

<label for="coordenadas[1][latitud]" class="form-label">Latitud (min:-90 y max:90)</label>
<input type="number" class="form-control" name="coordenadas[1][latitud]" min="-90" max="90" value="<?php echo $lat2; ?>" step='0.01' required>
<div class="invalid-feedback">
    Ingrese valor min:-90 y max:90
</div>
<div class="valid-feedback">
    Correcto!
</div>

<label for="coordenadas[1][longitud]" class="form-label">Longitud (min:-180 y max:180)</label>
<input type="number" class="form-control" name="coordenadas[1][longitud]" min="-180" max="180" value="<?php echo $lon2; ?>" step='0.01' required>
<div class="invalid-feedback">
    Ingrese valor min:-180 y max:180
</div>
<div class="valid-feedback">
    Correcto!
</div>
</div>
<div class="col-md-3 border border-secondary pb-2">

<label for="coordenadas[2][latitud]" class="form-label">Latitud (min:-90 y max:90)</label>
<input type="number" class="form-control" name="coordenadas[2][latitud]" min="-90" max="90" value="<?php echo $lat3; ?>" step='0.01' required>
<div class="invalid-feedback">
Ingrese valor min:-90 y max:90
</div>
<div class="valid-feedback">
Correcto!
</div>

<label for="coordenadas[2][longitud]" class="form-label">Longitud (min:-180 y max:180)</label>
<input type="number" class="form-control" name="coordenadas[2][longitud]" min="-180" max="180" step='0.01' value="<?php echo $lon1; ?>" required>
<div class="invalid-feedback">
Ingrese valor min:-180 y max:180
</div>
<div class="valid-feedback">
Correcto!
</div>
</div>
<div class="col-md-3 border border-secondary pb-2">

<label for="coordenadas[3][latitud]" class="form-label">Latitud (min:-90 y max:90)</label>
<input type="number" class="form-control" name="coordenadas[3][latitud]" min="-90" max="90" step='0.01' value="<?php echo $lat4; ?>" required>
<div class="invalid-feedback">
    Ingrese valor min:-90 y max:90
</div>
<div class="valid-feedback">
    Correcto!
</div>

<label for="coordenadas[3][longitud]" class="form-label">Longitud (min:-180 y max:180)</label>
<input type="number" class="form-control" name="coordenadas[3][longitud]" min="-180" max="180" value="<?php echo $lon4; ?>" step='0.01' required>
<div class="invalid-feedback">
    Ingrese valor min:-180 y max:180
</div>
<div class="valid-feedback">
    Correcto!
</div>
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