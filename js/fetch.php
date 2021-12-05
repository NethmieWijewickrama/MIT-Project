<?php

    if(isset($_POST['request'])){
        $request = $_POST['request'];

        $query = "SELECT tbldepartureheader.activeCode, 
                        tbldepartureheader.departureDate, 
                        tblvessel.vesselNo, 
                        tblvessel.vesselName, 
                        tbldepartureheader.harbour, 
                        tbldepartureheader.fishingGear
                FROM
                        tbldepartureheader
                INNER JOIN
                        tblvessel
                ON 
                        tbldepartureheader.vesselID = tblvessel.id
                WHERE   tbldepartureheader.harbour = '$request'";


    }

?>