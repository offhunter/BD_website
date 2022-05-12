<?php

include "db_conn.php";

$sql = "select id_caz, nume_met_previz, num_met_calcul, nume_perioada, nume_tip, nume_valuta, nume_regiune, suma from cazuri inner join met_previziune on(met_previziune.id_met_previz = cazuri.id_met_previz) inner join met_calcul on(met_calcul.id_met_calcul = cazuri.id_met_calcul) inner join perioada on(perioada.id_perioada = cazuri.id_perioada) inner join tipuri on(tipuri.id_tip = cazuri.id_tip) inner join valuta on(valuta.id_valuta = cazuri.id_valuta) inner join regiune on(regiune.id_regiune = cazuri.id_regiune) inner join indice on(indice.id_indice = cazuri.id_indice) ORDER BY id_caz ASC";
$result = mysqli_query($conn, $sql);
