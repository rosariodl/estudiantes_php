<!doctype html>
<html lang="en">

<head>
  <title>Pagina php</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#" style="font-size: 16px; text-transform: uppercase;">Rosario Dueñas</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#" style="font-size: 16px; text-transform: uppercase;">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" style="font-size: 16px; text-transform: uppercase;">Nosotros</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" style="font-size: 16px; text-transform: uppercase;">Contacto</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
        NUEVO
      </button>
    <div class="container">
     <!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form class="d-flex" action="" method="POST">
            <div class="col">
            <div class="mb-3">
                    <label for="lbl_id" class="form-label"><b>ID</b></label>
                    <input type="text" name="txt_id" id="txt_id" class="form-control" value="0" readonly>
                </div>
                <div class="mb-3">
                    <label for="lbl_carne" class="form-label"><b>Carne</b></label>
                    <input type="text" name="txt_carne" id="txt_carne" class="form-control" placeholder="Carne: E001" required>
                </div>
                <div class="mb-3">
                    <label for="lbl_nombres" class="form-label"><b>Nombres</b></label>
                    <input type="text" name="txt_nombres" id="txt_nombres" class="form-control" placeholder="Nombre1 Nombre2" required>
                </div>
                <div class="mb-3">
                    <label for="lbl_apellidos" class="form-label"><b>Apellidos</b></label>
                    <input type="text" name="txt_apellidos" id="txt_apellidos" class="form-control" placeholder="Apellido1 Apellidos2" required>
                </div>
                <div class="mb-3">
                    <label for="lbl_direccion" class="form-label"><b>Direccion</b></label>
                    <input type="text" name="txt_direccion" id="txt_direccion" class="form-control" placeholder="Ciudad" required>
                </div>
                <div class="mb-3">
                    <label for="lbl_telefono" class="form-label"><b>Telefono</b></label>
                    <input type="text" name="txt_telefono" id="txt_telefono" class="form-control" placeholder="2222-2222" required>
                </div>
                <div class="mb-3">
                    <label for="lbl_mail" class="form-label"><b>Correo Electrónico</b></label>
                    <input type="text" name="txt_email" id="txt_email" class="form-control" placeholder="ejemplo@ejemplo.com" required>
                </div>
                <div class="mb-3">
                  <label for="lbl_sangre" class="form-label"><b>Tipo de Sangre</b></label>
                  <select class="form-select" name="drop_sangre" id="drop_sangre">
                    <option value=0>---Tipo de Sangre---</option>
                    <?php
                        include("datos_conexion.php");
                        $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
                        $db_conexion ->real_query("SELECT id_tipo_sangre AS id, sangre FROM tipos_sangre;");
                        $resultado = $db_conexion->use_result();
                        while($fila = $resultado->fetch_assoc()){
                            echo"<option value=".$fila ['id'].">".$fila ['sangre']."</option>";
                        }  
                        $db_conexion -> close(); 
                    ?>
                  </select>
                  <div class="mb-3">
                    <label for="lbl_fn" class="form-label"><b>Nacimiento</b></label>
                    <input type="date" name="txt_fn" id="txt_fn" class="form-control" placeholder="aaaa-mm-dd" required>
                </div>
                <div class="mb-3">
                    <input type="submit" name="btn_agregar" id="btn_agregar" class="btn btn-primary" placeholder="aaaa-mm-dd" value="Agregar">
                </div>
                </div>
            </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
        <div class="table-responsive">
            <table class="table table-striped table-inverse table-responsive">
                <thead class="head-inverse">
                    <tr>
                        <th>Carne</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Correo Electrónico</th>
                        <th>Tipo de Sangre</th>
                        <th>Nacimiento</th>
                    </tr>
                    </thead>
                    <tbody id="tbl_estudiantes">
                    <?php
                        include("datos_conexion.php");
                        $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
                        $db_conexion ->real_query("select e.id_estudiante as id, e.carne, e.nombres, e.apellidos, e.direccion, e.telefono, e.correo_electronico, s.sangre, e.fecha_nacimiento, e.id_tipo_sangre from estudiantes as e inner join tipos_sangre as s on e.id_tipo_sangre = s.id_tipo_sangre;");
                        $resultado = $db_conexion->use_result();
                        while($fila = $resultado->fetch_assoc()){
                            echo"<tr data-id=".$fila ['id']." data-ids=".$fila ['id_tipo_sangre'].">";
                            echo"<td>".$fila ['carne']."<td>";
                            echo"<td>".$fila ['nombres']."<td>";
                            echo"<td>".$fila ['apellidos']."<td>";
                            echo"<td>".$fila ['direccion']."<td>";
                            echo"<td>".$fila ['correo_electronico']."<td>";
                            echo"<td>".$fila ['sangre']."<td>";
                            echo"<td>".$fila ['fecha_nacimiento']."<td>";
                            echo"</tr>";
                        }  
                        $db_conexion -> close(); 
                    ?>
                    </tbody>
                    <tfoot>
                        
                    </tfoot>
            </table>
        </div>
    </div>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
  </script>

  <script>
    $("#tbl_estudiantes").on('click','tr td',function (e){
        var target,id,ids,carne,nombres,apellidos,direccion,telefono,email,nacimiento;
        target = $(event.target);
        id = target.parent().data('id');
        ids = target.parent().data('ids');
        carne = target.parent('tr').find("td").eq(0).html();
        nombres = target.parent('tr').find("td").eq(1).html();
        apellidos = target.parent('tr').find("td").eq(2).html();
        direccion = target.parent('tr').find("td").eq(3).html();
        telefono = target.parent('tr').find("td").eq(4).html();
        email = target.parent('tr').find("td").eq(5).html();
        nacimiento = target.parent('tr').find("td").eq(6).html();
        
        $("#txt_id").val(id);
        $("#txt_carne").val(carne);
        $("#txt_nombres").val(nombres);
        $("#txt_apellidos").val(apellidos);
        $("#txt_direccion").val(direccion);
        $("#txt_telefono").val(telefono);
        $("#txt_email").val(email);
        $("#txt_nacimiento").val(nacimiento);
        $("#drop_sangre").val(ids);
    });
  </script>
</body>

</html>