<?php
include "db_conn.php";
if (isset($_POST['create'])) {
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




	$user_data = 'id_caz='.$id_caz. '&met_previziune='.$met_previziune. '&met_calcul='.$met_calcul. '&perioada='.$perioada. '&tipuri='.$tipuri. '&valuta='.$valuta. '&regiune='.$regiune. '&id_indice='.$id_indice;


  if(isset($_GET['met_previziune']) && $_GET['met_previziune'] == "-Select-") {
		header("location: index.php?error=Please fill all the brackets&$user_data");
	}
  else if(isset($_GET['met_calcul']) && $_GET['met_calcul'] == "-Select-") {
		header("location: index.php?error=Please fill all the brackets&$user_data");
	}
  else if(isset($_GET['perioada']) && $_GET['perioada'] == "-Select-") {
    header("location: index.php?error=Please fill all the brackets&$user_data");
  }
  else if(isset($_GET['tipuri']) && $_GET['tipuri'] == "-Select-") {
    header("location: index.php?error=Please fill all the brackets&$user_data");
  }
  else if(isset($_GET['valuta']) && $_GET['valuta'] == "-Select-") {
    header("location: index.php?error=Please fill all the brackets&$user_data");
  }
  else if(isset($_GET['regiune']) && $_GET['regiune'] == "-Select-") {
    header("location: index.php?error=Please fill all the brackets&$user_data");
  }

  else {

       $sql = "INSERT INTO cazuri VALUES('$id_caz', '$met_previziune', '$met_calcul', '$perioada', '$tipuri', '$valuta', '$regiune', '$id_indice')";
       $result = mysqli_query($conn, $sql);
       if ($result) {
       	  header("location: read.php?success=successfully created");
       }else {
          header("location: index.php?error=unknown error occurred&$user_data");
       }
	}

}
