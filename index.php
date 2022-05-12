<!DOCTYPE html>
<html>
<head>
  <title>PIB</title>
  <link rel="stylesheet" href="bootstrap.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

<style>

body{
  background-image: linear-gradient(rgba(0, 0, 0,0.7),rgb(0,0,0,0.7)), url("Images/bg.jpg");
  background-size: cover;
}

.selectdiv {
position: relative;

}

.selectdiv:after {
  content: '\f078';
  color: black;
  font: normal normal normal 17px/1 FontAwesome;
  right: 11px;
  top: 18px;
  height: 34px;
  padding: 15px 0px 0px 8px;
  position: absolute;
  pointer-events: none;
}





</style>
</head>
<body>
  <div class="container">
    <form action="create.php" method="post">
      <h4 class="display-4 text-center" style="padding-top: 20px; color: white;">Urmărește dinamica PIB în timp real</h4>

      <h1  style="text-align: center; color: white;">Selectează atributele PIB care te interesează</h1>
      <?php if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $_GET['error']; ?>
        </div>
      <?php } ?>
      <div style="align-items: center; display: flex; flex-direction: column">


        <div class="form-group" hidden>
          <label for="id_caz">Numarului cazului</label>
          <input type="id_caz"
          class="form-control"
          id="id_caz"
          name="id_caz"
          value="<?php if(isset($_GET['id_caz']))
          echo($_GET['id_caz']); ?>"
          placeholder="Numarul cazului">
        </div>

          <div class="selectdiv" style="width: 500px; color: white;">
            <label for="met_previziune">Metoda de previziune</label>
            <select class="form-control" type="met_previziune" id="met_previziune" name="met_previziune" value="<?php if(isset($_GET['met_previziune']))echo($_GET['met_previziune']); ?>" >
              <option disabled selected>-Select-</option>
              <?php
              include "db_conn.php";  // Using database connection file here
              $records = mysqli_query($conn, "select id_met_previz, nume_met_previz from met_previziune");  // Use select query here

              while($data = mysqli_fetch_array($records))
              {
                echo "<option value='". $data['id_met_previz'] .". '".$data['nume_met_previz']."'>" .$data['id_met_previz'] .". ".$data['nume_met_previz'] ."</option>";  // displaying data in option menu

              }
              ?>
            </select>
          </div>

          <div class="selectdiv" style="width: 500px; color: white;">
            <label for="met_calcul">Metoda de calcul</label>
            <select class="form-control" type="met_calcul" id="met_calcul" name="met_calcul" value="<?php if(isset($_GET['met_calcul']))echo($_GET['met_calcul']); ?>" >
              <option disabled selected>-Select-</option>
              <?php
              include "db_conn.php";  // Using database connection file here
              $records = mysqli_query($conn, "select id_met_calcul, num_met_calcul from met_calcul");  // Use select query here

              while($data = mysqli_fetch_array($records))
              {
                echo "<option value='". $data['id_met_calcul'] .". '".$data['num_met_calcul']."'>" .$data['id_met_calcul'] .". ".$data['num_met_calcul'] ."</option>";  // displaying data in option menu

              }
              ?>
            </select>
          </div>

          <div class="selectdiv" style="width: 500px; color: white;">
            <label for="perioada">Perioada</label>
            <select class="form-control" type="perioada" id="perioada" name="perioada" value="<?php if(isset($_GET['perioada']))echo($_GET['perioada']); ?>" >
              <option disabled selected>-Select-</option>
              <?php
              include "db_conn.php";  // Using database connection file here
              $records = mysqli_query($conn, "select id_perioada, nume_perioada from perioada");  // Use select query here

              while($data = mysqli_fetch_array($records))
              {
                echo "<option value='". $data['id_perioada'] .". '".$data['nume_perioada']."'>" .$data['id_perioada'] .". ".$data['nume_perioada'] ."</option>";  // displaying data in option menu

              }
              ?>
            </select>
          </div>



          <div class="selectdiv" style="width: 500px; color: white;">
            <label for="tipuri">Tipul</label>
            <select class="form-control" type="tipuri" id="tipuri" name="tipuri" value="<?php if(isset($_GET['tipuri']))echo($_GET['tipuri']); ?>" >
              <option disabled selected>-Select-</option>
              <?php
              include "db_conn.php";  // Using database connection file here
              $records = mysqli_query($conn, "select id_tip, nume_tip from tipuri");  // Use select query here

              while($data = mysqli_fetch_array($records))
              {
                echo "<option value='". $data['id_tip'] .". '".$data['nume_tip']."'>" .$data['id_tip'] .". ".$data['nume_tip'] ."</option>";  // displaying data in option menu

              }
              ?>
            </select>
          </div>


          <div class="selectdiv" style="width: 500px; color: white;">
            <label for="valuta">Valuta</label>
            <select class="form-control" type="valuta" id="valuta" name="valuta" value="<?php if(isset($_GET['valuta']))echo($_GET['valuta']); ?>" >
              <option disabled selected>-Select-</option>
              <?php
              include "db_conn.php";  // Using database connection file here
              $records = mysqli_query($conn, "select id_valuta, nume_valuta from valuta");  // Use select query here

              while($data = mysqli_fetch_array($records))
              {
                echo "<option value='". $data['id_valuta'] .". '".$data['nume_valuta']."'>" .$data['id_valuta'] .". ".$data['nume_valuta'] ."</option>";  // displaying data in option menu

              }
              ?>
            </select>
          </div>



          <div class="selectdiv" style="width: 500px; color: white;">
            <label for="regiune">Regiunea</label>
            <select class="form-control" type="regiune" id="regiune" name="regiune" value="<?php if(isset($_GET['regiune']))echo($_GET['regiune']); ?>" >
              <option disabled selected>-Select-</option>
              <?php
              include "db_conn.php";  // Using database connection file here
              $records = mysqli_query($conn, "select id_regiune, nume_regiune from regiune");  // Use select query here

              while($data = mysqli_fetch_array($records))
              {
                echo "<option value='". $data['id_regiune'] .". '".$data['nume_regiune']."'>" .$data['id_regiune'] .". ".$data['nume_regiune'] ."</option>";  // displaying data in option menu

              }
              ?>
            </select>
          </div>






        <div class="form-group" hidden>
          <label for="id_indice">Indice</label>
          <select class="form-control" type="id_indice" id="id_indice"  name="id_indice" value="<?php if(isset($_GET['id_indice']))echo($_GET['id_indice']); ?>" >
            <?php
            include "db_conn.php";

            $sql = "select id_indice from indice order by rand() limit 1";
            $result1 = mysqli_query($conn, $sql);

            while($data1 = mysqli_fetch_array($result1)){
              echo "<option value='". $data1['id_indice'] ."'>" .$data1['id_indice'] ." </option>";  // displaying data in option menu

            }
            ?>

          </select>
        </div>


        <?php mysqli_close($conn);  // close connection ?>


        <div style="padding-top: 10px; padding-right: 310px;">
          <button type="submit"
          class="btn btn-primary"
          name="create">Submit</button>
          <a href="read.php" class="link-primary">Istoric date</a>
        </div>

      </div>

  </div>

</form>

</body>


</html>
