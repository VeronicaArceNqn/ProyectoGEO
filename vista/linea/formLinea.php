<?php
$dir="";
$titulo="Linea";
include_once '../estructura/header.php';
?>


<div class="container border border-secondary principal mt-3 pt-3">
    <h3 class="text-center">L&iacute;nea</h3>
    <div class="col-md-12">
        <p>La l&iacute;nea consta de 2 puntos.</p>
       
    </div>
    
    <form method="post" class="row m-3 p-4 pt-3 bg-light fw-bold needs-validation" action="accion/accionLinea.php" novalidate>
    <div class="col-md-3">
        Ingrese 2 coordenadas. <br>Un mapa mostrar&aacute; la l&iacute;nea que las une. 
    </div>
        <div class="col-md-3 border border-secondary pb-2">

            <label for="latitud1" class="form-label">Latitud</label>
            <input type="number" class="form-control" id="latitud1" name="latitud1" min="-90" max="90" step='any' value="-34.36" required>
            <div class="invalid-feedback">
                Ingrese valor min:-90 y max:90
            </div>
            <div class="valid-feedback">
                Correcto!
            </div>

            <label for="longitud1" class="form-label">Longitud</label>
            <input type="number" class="form-control" id="longitud1" name="longitud1" min="-180" max="180" step='any' value="-58.26" required>
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
            <input type="number" class="form-control" id="longitud2" name="longitud2" min="-180" max="180" value="-3.80" step='any' required>
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