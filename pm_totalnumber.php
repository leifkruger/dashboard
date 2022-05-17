/*
*******************************************************************************
FILENAME		pm_totalnumber.php

Encoding		UTF-8

DESCRIPTION		Preventive maintenance total number

NOTES			Menu language - Swedish

AUTHOR			Leif Krüger, leif@leifkruger.se

				Copyright L.Krüger 2022. All rights reserved.
CHANGES

REF NO	VERSION		DATE (YYMMDD)	WHO	DETAIL
-------------------------------------------------------------------------------
		1			2022-05-05		LK	Start date
*******************************************************************************
*/

<!DOCTYPE html>

<?php

// Test date
$FRANDATUM = "2018-12-01";
$TILLDATUM = "2018-12-31";

date_default_timezone_set('Europe/Stockholm');

$yearNumber = date('Y'); 
$yearNumberBefore = date('Y', strtotime('-1 years', strtotime($yearNumber)));
$yearNumberPlusFive = date('Y', strtotime('+5 years', strtotime($yearNumber)));
$weekNumber = date("W"); 
$monthNumber = date("m");
$premonth1 = date("m")+1;
$premonth2 = date("m")+2;
$premonth3 = date("m")+3;
$premonth4 = date("m")+4;
$premonth5 = date("m")+5;
$premonth6 = date("m")+6;
$dayNumber = date("d");
$startDatum = date("Y-m-d", strtotime($yearNumber."W".$weekNumber));
$slutDatum = date('Y-m-d', strtotime('+6 days', strtotime($startDatum)));
$idagDatum = date("Y-m-d");
$Yearfirstdate = $yearNumber."-01-01";

$startDatum1fore = date('Y-m-d', strtotime('-7 days', strtotime($startDatum)));
$slutDatum1fore = date('Y-m-d', strtotime('-1 days', strtotime($startDatum)));

$result = strtotime($yearNumber."-02-01");
$result = strtotime('-1 second', strtotime('+1 month', $result));
$lastFeb = date('Y-m-d', $result);

$lastmonth = str_pad(date('m')-1,  2, '0', STR_PAD_LEFT);

if ($lastmonth == '00') {
	$lastmonth = '12';
	$lastmonthtext = 'dec';
	$lastmonthyear = $yearNumber-1;
}

if ($lastmonth == '01') {
$premonth = "jan ".$yearNumber;
} elseif ($lastmonth == '02') {
$premonth = "feb ".$yearNumber;
} elseif ($lastmonth == '03') {
$premonth = "mar ".$yearNumber;
} elseif ($lastmonth == '04') {
$premonth = "apr ".$yearNumber;
} elseif ($lastmonth == '05') {
$premonth = "maj ".$yearNumber;
} elseif ($lastmonth == '06') {
$premonth = "jun ".$yearNumber;
} elseif ($lastmonth == '07') {
$premonth = "jul ".$yearNumber;
} elseif ($lastmonth == '08') {
$premonth = "aug ".$yearNumber;
} elseif ($lastmonth == '09') {
$premonth = "sep ".$yearNumber;
} elseif ($lastmonth == '10') {
$premonth = "okt ".$yearNumber;
} elseif ($lastmonth == '11') {
$premonth = "nov ".$yearNumber;
} else {
$lastmonth = '12';
$lastmonthtext = 'dec';
$lastmonthyear = $yearNumber-1;
$premonth = "dec ".$lastmonthyear;
}

// Sista feb nästa år
$preyear = $yearNumber+1;
$nextlastfeb = strtotime($preyear."-02-01");
$nextlastfeb = strtotime('-1 second', strtotime('+1 month', $nextlastfeb));
$nextlastfeb = date('Y-m-d', $nextlastfeb);

// Hidden SQL
$sqlFUpart1="SELECT ... ";
$sqlFUpart2="'".$FRANDATUM."' AND '".$TILLDATUM."'";
$sqlFUpart3=")) Order by ... ";

echo "<HTML>";

echo "<HEAD>";
echo "<TITLE>FU-statistik från Medusa</TITLE>";
echo "<META http-equiv=\"Content-Typ\" content=\"text/html; charset=UTF-8\">";

echo "</HEAD>";

echo "<BODY bgcolor='#CCCCCC'>";

echo "<CENTER>";

//Unfinished FU
$sqlunfinishedFU=$sqlFUpart1."'1990-01-01' AND '".$yearNumberPlusFive."-12-31'".$sqlFUpart3;

echo "<H2>Totalt antal aktiva FU:n i Medusa</H2>";

// Connect to database
$connFU=odbc_connect("dbname","username","password");

if (!$connFU)
  {exit("Connection Failed: ".$connFU);}

$rsunfinishedFU=odbc_exec($connFU, $sqlunfinishedFU);

$unFU = 0;
$unFUest = 0;
$noworkingtime = 0;
$AntalRISKTALOVER18 = 0;

// Count high/low risk equipment
while (odbc_fetch_row($rsunfinishedFU))
  {  
  $TIDATGANGunFU=odbc_result($rsunfinishedFU, "Estimatedtime");
  $unFUest = $unFUest + $TIDATGANGunFU;
  ++$unFU;
  $RISKTALOVER18=odbc_result($rsunfinishedFU, "intRisktal");
  
  if ($TIDATGANGunFU == 0) {
  	  ++$noworkingtime;
     }
     
  if ($RISKTALOVER18 > 18) {
  	  ++$AntalRISKTALOVER18;
     }
  }

echo "<table width=500 CELLPADDING='2' CELLSPACING='0'>";
echo "<tr BGCOLOR='#DDDDDD' colspan='3'>";
echo "<td align='left'></td><td align='center'><b>Totalt</b></td><td align='center'><b>Risktal 0-18</b></td><td align='center'><b>Risktal 19-30</b></td>";
echo "</tr>";
echo "<tr BGCOLOR='#FFF5CC'>";
$summa = $unFU-$AntalRISKTALOVER18;
echo "<td><b>Antal FU:n</b></td><td align='center'><Font size='4' color='#0000FF'>$unFU</font></td><td align='center'>$summa</td><td align='center'>".$AntalRISKTALOVER18."</td>";
echo "</tr>";
echo "</table>";

echo "</CENTER>";

echo "</body>";

echo "</html>";

?>
