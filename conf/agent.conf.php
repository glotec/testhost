<?php

    require_once 'database.php';

    if (isset($_POST['search']))
    {
        $search = $_POST['research'];

        $sql = "SELECT personnes.nom,personnes.postnom,personnes.etatcivil,personnes.genre,personnes.lieu_naissance,
                    personnes.phone,personnes.email,personnes.photo, addresses.addresse, service.fonction, 
                    details.date_engagement FROM personnes INNER JOIN addresses ON personnes.id = addresses.personne 
                    INNER JOIN details ON  personnes.id = details.personne INNER JOIN service ON details.service = service.id
                    WHERE CONCAT(nom,postnom) LIKE '%".$search."%'  ORDER BY PERSONNES.id DESC";
        $res = $con->query($sql);
    }
    else
    {
        $sql = "SELECT personnes.nom,personnes.postnom,personnes.etatcivil,personnes.genre,personnes.lieu_naissance,
                    personnes.phone,personnes.email,personnes.photo, addresses.addresse, service.fonction, 
                    details.date_engagement FROM personnes INNER JOIN addresses ON personnes.id = addresses.personne 
                    INNER JOIN details ON  personnes.id = details.personne INNER JOIN service 
                    ON details.service = service.id ORDER BY PERSONNES.id DESC";
        $res = $con->query($sql);
    }