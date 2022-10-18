<?php
 $dir="";
 $titulo="Coordenada";
 include_once $dir.'../estructura/header.php';
 
 ?>
 <div class="container border border-secondary principal mt-3 pt-3">
 <div class="">
    <h3 class="text-center">Coordenada</h3>

    <form method="post" class="row m-4 pl-3 pt-3 bg-light fw-bold" action="accion/formato.php">
    <div class="col-md-2"></div>
    <div class="col-md-2"></div>  
        
    <div class="col-md-3 border border-secondary pb-2 gap-2">

            <label for="latitud" class="form-label">Latitud (min:-90 y max:90)</label>
            <input type="number" class="form-control" id="latitud" name="latitud" min="-90.0" max="90.0" step='sny' value="52.5" required>
            <div class="invalid-feedback">
                Ingrese valor min:-90 y max:90
            </div>
            <div class="valid-feedback">
                Correcto!
            </div>

            <label for="longitud" class="form-label">Longitud (min:-180 y max:180)</label>
            <input type="number" class="form-control" id="longitud" name="longitud" min="-180" max="180" step='any' value="13.5" required>
            <div class="invalid-feedback">
                Ingrese valor min:-180 y max:180
            </div>
            <div class="valid-feedback">
                Correcto!
            </div>
        </div>
        <div class="col-12 pt-5 p-5">
            <button class="btn btn-success d-grid gap-2 col-2 mx-auto" type="submit">Enviar</button>
        </div>
    </form>
    <br><br>
 </div>
 </div>
  <!--<input type="button" id="parar" value="Parar" onclick="detener();"/>-->
<?php
 include_once $dir.'../estructura/footer.php';
?>