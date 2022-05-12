<?php

if (isset($_GET['id'])) {
	include "db_conn.php";

	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$id = validate($_GET['id']);

	$sql = "SELECT * FROM cazuri WHERE id_caz=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    	$row = mysqli_fetch_assoc($result);
    }else {
    	header("location: read.php");
    }


}
else if(isset($_POST['update'])){
    include "db_conn.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

  $id_caz = validate($_POST['id_caz']);
	$met_previziune = validate($_POST['met_previziune']);
	$met_calcul = validate($_POST['met_calcul']);
  $perioada = validate($_POST['perioada']);
  $tipuri = validate($_POST['tipuri']);
  $valuta = validate($_POST['valuta']);
  $regiune = validate($_POST['regiune']);
  $id_indice = validate($_POST['id_indice']);
	$id = validate($_POST['id_caz']);

  if(isset($_GET['met_previziune']) && $_GET['met_previziune'] == "-Select-") {
    header("location: index.php?id=$id&error=Please fill all the brackets");
  }
  else if(isset($_GET['met_calcul']) && $_GET['met_calcul'] == "-Select-") {
    header("location: index.php?id=$id&error=Please fill all the brackets");
  }
  else if(isset($_GET['perioada']) && $_GET['perioada'] == "-Select-") {
    header("location: index.php?id=$id&error=Please fill all the brackets");
  }
  else if(isset($_GET['tipuri']) && $_GET['tipuri'] == "-Select-") {
    header("location: index.php?id=$id&error=Please fill all the brackets");
  }
  else if(isset($_GET['valuta']) && $_GET['valuta'] == "-Select-") {
    header("location: index.php?id=$id&error=Please fill all the brackets");
  }
  else if(isset($_GET['regiune']) && $_GET['regiune'] == "-Select-") {
    header("location: index.php?id=$id&error=Please fill all the brackets");
  }

  else {

       $sql = "update cazuri set id_met_previz = '$met_previziune', id_met_calcul = '$met_calcul', id_perioada = '$perioada', id_tip = '$tipuri', id_valuta = '$valuta', id_regiune = '$regiune', id_indice = '$id_indice' where id_caz=$id";
       $result = mysqli_query($conn, $sql);
       if ($result) {
       	  header("location: read.php?success=successfully updated");
       }else {
          header("location: update.php?id=$id&error=unknown error occurred&$user_data");
       }
	}
}else {
	header("location: read.php");
}
