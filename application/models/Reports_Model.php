<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Reports_Model extends CI_Model{

    public function __construct()
	{
		parent::__construct();
        //$this->load->model('generic_Model');
	}

    public function high_sea_departure_report($from,$to)
	{
		if($from==''){
			$from="2020-01-01";
		}
		if($to==''){
			$to="2100-01-01";
		}
		return $this->db->query("
						SELECT
							tbldepartureheader.activeCode, 
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
						WHERE departureDate BETWEEN '$from' AND '$to'
		");
	}

	public function high_sea_departure_harbour($request)
	{
		if(isset($_POST['request'])){
			$request = $_POST['request'];
	
			return $this->db->query("SELECT tbldepartureheader.activeCode, 
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
									WHERE   tbldepartureheader.harbour = '$request'") ;
	
	
		}				
	}

	public function annual_log_report($from,$to)
	{
		if($from==''){
			$from="2020-01-01";
		}
		if($to==''){
			$to="2100-01-01";
		}
		return $this->db->query("
						SELECT
							tblvessel.vesselNo, 
							tblvessel.vesselName, 
							tbllogbook.id, 
							tbllogbook.dateTime, 
							tbllogbook.description, 
							tbllogbook.latitude, 
							tbllogbook.longitude
						FROM
							tbllogbook
							INNER JOIN
							tblvessel
							ON 
								tbllogbook.vesselID = tblvessel.id
						WHERE dateTime BETWEEN '$from' AND '$to'
		");
	}

	public function annual_death_report($from,$to)
	{
		if($from==''){
			$from="2020-01-01";
		}
		if($to==''){
			$to="2100-01-01";
		}
		return $this->db->query("
						SELECT
							tblvessel.vesselNo, 
							tblvessel.vesselName, 
							tbllogbook.id, 
							tbllogbook.dateTime, 
							tbllogbook.description, 
							tbllogbook.latitude, 
							tbllogbook.longitude, 
							tblfishermen.nameWithInitials, 
							tblfishermen.addressHouse, 
							tblfishermen.addressStreetName, 
							tblfishermen.addressCity
						FROM
							tbllogbook
							INNER JOIN
							tblvessel
							ON 
								tbllogbook.vesselID = tblvessel.id
							INNER JOIN
							tbldeath
							ON 
								tbllogbook.id = tbldeath.logBookID
							INNER JOIN
							tblfishermen
							ON 
								tbldeath.fishermenID = tblfishermen.id
						WHERE dateTime BETWEEN '$from' AND '$to'
		");
	}

	public function annual_vessel_report($from,$to)
	{
		if($from==''){
			$from="2020-01-01";
		}
		if($to==''){
			$to="2100-01-01";
		}
		return $this->db->query("
						SELECT
							tblvessel.vesselName, 
							tblvessel.vesselNo, 
							tbldistrictoffice.description, 
							tblvessel.registrationDate,
							tblowner.ownerName,
							tblowner.contactNo,
							tblowner.addressHouse,
							tblowner.addressStreetName,
							tblowner.addressCity
						FROM
							tblvessel
							INNER JOIN
							tblowner							
							ON 
								tblvessel.ownerID = tblowner.id
								
							INNER JOIN
							tbldistrictoffice
							ON
								tblowner.districtOffice = tbldistrictoffice.district	
						WHERE tblvessel.registrationDate BETWEEN '$from' AND '$to'
		");
	}

	public function annual_fisherman_report($from,$to)
	{
		if($from==''){
			$from="2020-01-01";
		}
		if($to==''){
			$to="2100-01-01";
		}
		return $this->db->query("
						SELECT
							tblfishermen.nameWithInitials, 
							tblfishermen.fisheriesIDNo, 
							tblfishermen.registrationDate, 
							tbldistrictoffice.description, 
							tblfishermen.addressHouse, 
							tblfishermen.addressStreetName, 
							tblfishermen.addressCity,
							tblfishermen.contactNo
						FROM
							tblfishermen
							INNER JOIN
							tbldistrictoffice
							ON 
								tblfishermen.districtOffice = tbldistrictoffice.district
						WHERE registrationDate BETWEEN '$from' AND '$to'
		");
	}
}