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
    <h3 class="text-center">Crear Poligono</h3>
    <form method="post" class="row m-3 p-4 pt-3 bg-light fw-bold needs-validation" action="accion/accionPoligono.php" novalidate>

    <div class="col-md-3 border border-secondary pb-2">

<label for="latitud1" class="form-label">Latitud (min:-90 y max:90)</label>
<input type="number" class="form-control" id="latitud1" name="latitud1" min="-90" max="90" step='0.01' value="<?php echo $lat1; ?>" required>
<div class="invalid-feedback">
    Ingrese valor min:-90 y max:90
</div>
<div class="valid-feedback">
    Correcto!
</div>

<label for="longitud1" class="form-label">Longitud (min:-180 y max:180)</label>
<input type="number" class="form-control" id="longitud1" name="longitud1" min="-180" max="180" step='0.01' value="<?php echo $lon1; ?>" required>
<div class="invalid-feedback">
    Ingrese valor min:-180 y max:180
</div>
<div class="valid-feedback">
    Correcto!
</div>
</div>

<div class="col-md-3  border border-secondary">

<label for="latitud2" class="form-label">Latitud (min:-90 y max:90)</label>
<input type="number" class="form-control" id="latitud2" name="latitud2" min="-90" max="90" value="<?php echo $lat2; ?>" step='0.01' required>
<div class="invalid-feedback">
    Ingrese valor min:-90 y max:90
</div>
<div class="valid-feedback">
    Correcto!
</div>

<label for="longitud2" class="form-label">Longitud (min:-180 y max:180)</label>
<input type="number" class="form-control" id="longitud2" name="longitud2" min="-180" max="180" value="<?php echo $lon2; ?>" step='0.01' required>
<div class="invalid-feedback">
    Ingrese valor min:-180 y max:180
</div>
<div class="valid-feedback">
    Correcto!
</div>
</div>
<div class="col-md-3 border border-secondary pb-2">

<label for="latitud3" class="form-label">Latitud (min:-90 y max:90)</label>
<input type="number" class="form-control" id="latitud3" name="latitud3" min="-90" max="90" value="<?php echo $lat3; ?>" step='0.01' required>
<div class="invalid-feedback">
Ingrese valor min:-90 y max:90
</div>
<div class="valid-feedback">
Correcto!
</div>

<label for="longitud3" class="form-label">Longitud (min:-180 y max:180)</label>
<input type="number" class="form-control" id="longitud3" name="longitud3" min="-180" max="180" step='0.01' value="<?php echo $lon1; ?>" required>
<div class="invalid-feedback">
Ingrese valor min:-180 y max:180
</div>
<div class="valid-feedback">
Correcto!
</div>
</div>
<div class="col-md-3 border border-secondary pb-2">

<label for="latitud4" class="form-label">Latitud (min:-90 y max:90)</label>
<input type="number" class="form-control" id="latitud4" name="latitud4" min="-90" max="90" step='0.01' value="<?php echo $lat4; ?>" required>
<div class="invalid-feedback">
    Ingrese valor min:-90 y max:90
</div>
<div class="valid-feedback">
    Correcto!
</div>

<label for="longitud4" class="form-label">Longitud (min:-180 y max:180)</label>
<input type="number" class="form-control" id="longitud4" name="longitud4" min="-180" max="180" value="<?php echo $lon4; ?>" required>
<div class="invalid-feedback">
    Ingrese valor min:-180 y max:180
</div>
<div class="valid-feedback">
    Correcto!
</div>
</div>

        <input id="accion" name="accion" value="nuevo" type="hidden">
        <div class="col-12 pt-5">
            <button class="btn btn-success d-grid gap-2 col-3 mx-auto" type="submit">Guardar</button>
        </div>
    </form>

</div>
</div>
<?php
include_once '../estructura/footer.php';
?>