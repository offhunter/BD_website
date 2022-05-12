
<?php include "readv2.php"; ?>

<!DOCTYPE html>
<html>
<head>
  <title>PIB</title>
  <link rel="stylesheet" href="bootstrap.css">

  <style>
  body{
    background-image: linear-gradient(rgba(0, 0, 0,0.7),rgb(0,0,0,0.7)), url("Images/bg2.jpg");
    background-size: cover ;
  }
  </style>
</head>
<body>
  <div class="container">
    <div class="box">
      <h4 class="display-4 text-center" style="color: white;">Istoric date</h4><br>
      <?php if (isset($_GET['success'])) { ?>
        <div class="alert alert-success" role="alert">
          <?php echo $_GET['success']; ?>
        </div>
      <?php } ?>
      <?php if (mysqli_num_rows($result)) { ?>
        <table class="table table-striped" style="color: white;">
          <thead>
            <tr style="text-align: middle; color: white;">
              <th scope="col" style="text-align: center; color: white;">ID</th>
              <th scope="col" style="text-align: center; color: white;">Metoda de peviziune</th>
              <th scope="col" style="text-align: center; color: white;">Metoda de calcul</th>
              <th scope="col" style="text-align: center; color: white;">Perioada</th>
              <th scope="col" style="text-align: center; color: white;">Tipul</th>
              <th scope="col" style="text-align: center; color: white;">Valuta</th>
              <th scope="col" style="text-align: center; color: white;">Regiunea</th>
              <th scope="col" style="text-align: center; color: white;">Indicele (PIB)</th>


              <th scope="col" style="text-align: center; color: white;">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 0;
            while($rows = mysqli_fetch_assoc($result)){
              $i++;
              ?>

              <tr>
                <th scope="row" style="text-align: center; color: white;"><?=$i?></th>
                <td style="text-align: center; color: white;"><?=$rows['nume_met_previz'];?></td>
                <td style="text-align: center; color: white;"><?php echo $rows['num_met_calcul']; ?></td>
                <td style="text-align: center; color: white;"><?php echo $rows['nume_perioada']; ?></td>
                <td style="text-align: center; color: white;"><?php echo $rows['nume_tip']; ?></td>
                <td style="text-align: center; color: white;"><?php echo $rows['nume_valuta']; ?></td>
                <td style="text-align: center; color: white;"><?php echo $rows['nume_regiune']; ?></td>
                <td style="text-align: center; color: white;"><?php echo $rows['suma']; ?></td>


              <td style="text-align: center; position: absolute">
                <a href="update.php?id=<?=$rows['id_caz']?>" class="btn btn-success">Update</a>


                <a href="delete.php?id=<?=$rows['id_caz']?>" class="btn btn-danger">Delete</a>

              </td>
            </tr>
          <?php } ?>

        </tbody>
      </table>
    <?php } ?>
    <div class="link-right">
      <a href="index.php" class="link-primary">Click aici pentru a calcula date..</a>
    </div>
  </div>
</div>
</body>
</html>
