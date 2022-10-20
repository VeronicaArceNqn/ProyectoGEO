<?php
$dir="";
$titulo="Polilinea";
include_once '../estructura/header.php';
?>


<div class="container border border-secondary principal mt-3 pt-3">
    <h3 class="text-center">Polil&iacute;nea</h3>
    <p>La polil&iacute;nea es una lista de ubicaciones, m&iacute;nimo 3 pares de coordenadas. </p>
    <form method="post" class="row m-3 p-4 pt-3 bg-light fw-bold needs-validation" action="accion/accionPolilinea.php" novalidate>

        <div class="col-md-3 border border-secondary pb-2">

            <label for="latitud1" class="form-label">Latitud</label>
            <input type="number" class="form-control" id="latitud1" name="latitud1" min="-90" max="90" step='any' value="41.05" required>
            <div class="invalid-feedback">
                Ingrese valor min:-90 y max:90
            </div>
            <div class="valid-feedback">
                Correcto!
            </div>

            <label for="longitud1" class="form-label">Longitud</label>
            <input type="number" class="form-control" id="longitud1" name="longitud1" min="-180" max="180" step='any' value="-4.79" required>
            <div class="invalid-feedback">
                Ingrese valor min:-180 y max:180
            </div>
            <div class="valid-feedback">
                Correcto!
            </div>
        </div>

        <div class="col-md-3  border border-secondary">

            <label for="latitud2" class="form-label">Latitud</label>
            <input type="number" class="form-control" id="latitud2" name="latitud2" min="-90" max="90" value="40.39" step='any' required>
            <div class="invalid-feedback">
                Ingrese valor min:-90 y max:90
            </div>
            <div class="valid-feedback">
                Correcto!
            </div>

            <label for="longitud2" class="form-label">Longitud</label>
            <input type="number" class="form-control" id="longitud2" name="longitud2" min="-180" max="180" value="-6.09" step='any' required>
            <div class="invalid-feedback">
                Ingrese valor min:-180 y max:180
            </div>
            <div class="valid-feedback">
                Correcto!
            </div>
        </div>
        <div class="col-md-3 border border-secondary pb-2">

<label for="latitud3" class="form-label">Latitud</label>
<input type="number" class="form-control" id="latitud3" name="latitud3" min="-90" max="90" value="39.29" step='any' required>
<div class="invalid-feedback">
    Ingrese valor min:-90 y max:90
</div>
<div class="valid-feedback">
    Correcto!
</div>

<label for="longitud3" class="form-label">Longitud</label>
<input type="number" class="form-control" id="longitud3" name="longitud3" min="-180" max="180" step='any' value="-5.85" required>
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
<?php
include_once '../estructura/footer.php';
?>