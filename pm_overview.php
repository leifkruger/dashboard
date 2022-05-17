/*
*******************************************************************************
FILENAME		pm_overview.php

Encoding		UTF-8

DESCRIPTION		Preventive maintenance overview

NOTES			Menu language - Swedish

AUTHOR			Leif Krüger, leif@leifkruger.se

				Copyright L.Krüger 2022. All rights reserved.
CHANGES

REF NO	VERSION		DATE (YYMMDD)	WHO	DETAIL
-------------------------------------------------------------------------------
		1			2022-05-02		LK	Start date
*******************************************************************************
*/

<!DOCTYPE html>

<?php

// Test parameter
$DATAFILEEXCIST = "x";

date_default_timezone_set('Europe/Stockholm');

// Parameters year, month, day
$yearNumber = date('Y'); 
$yearNumberBefore = date('Y', strtotime('-1 years', strtotime($yearNumber)));
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

// Last february
$result = strtotime($yearNumber."-02-01");
$result = strtotime('-1 second', strtotime('+1 month', $result));
$lastFeb = date('Y-m-d', $result);

// Last month
$lastmonth = str_pad(date('m')-1,  2, '0', STR_PAD_LEFT);

// Check if last month is december
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

// Last february next year
$preyear = $yearNumber+1;
$nextlastfeb = strtotime($preyear."-02-01");
$nextlastfeb = strtotime('-1 second', strtotime('+1 month', $nextlastfeb));
$nextlastfeb = date('Y-m-d', $nextlastfeb);

// Dynamic SQL hidden 
$sqlFUpart1="SELECT ... ";
$sqlFUpart2="'".$FRANDATUM."' AND '".$TILLDATUM."'";
$sqlFUpart3=")) Order by ... ";

// Correct if premonth go over to e new year
if ($lastmonth == '01') {
$premonth1 = "02";
$premonth2 = "03";
$premonth3 = "04";
$premonth4 = "05";
$premonth5 = "06";
$premonth6 = "07";
$premonth1Text = "Feb";
$premonth2Text = "Mar";
$premonth3Text = "Apr";
$premonth4Text = "Maj";
$premonth5Text = "Jun";
$premonth6Text = "Jul";
$premonth1TextK = "Februari";
$premonth2TextK = "Mars";
$premonth3TextK = "April";
$premonth4TextK = "Maj";
$premonth5TextK = "Juni";
$premonth6TextK = "Juli";

$unfinishedFU = $yearNumber."-".$lastmonth."-31";

$sqlFUm1=$sqlFUpart1."'".$yearNumber."-".$premonth1."-01' AND '".$lastFeb."'".$sqlFUpart3;
$sqlFUm2=$sqlFUpart1."'".$yearNumber."-".$premonth2."-01' AND '".$yearNumber."-".$premonth2."-31'".$sqlFUpart3;
$sqlFUm3=$sqlFUpart1."'".$yearNumber."-".$premonth3."-01' AND '".$yearNumber."-".$premonth3."-30'".$sqlFUpart3;
$sqlFUm4=$sqlFUpart1."'".$yearNumber."-".$premonth4."-01' AND '".$yearNumber."-".$premonth4."-31'".$sqlFUpart3;
$sqlFUm5=$sqlFUpart1."'".$yearNumber."-".$premonth5."-01' AND '".$yearNumber."-".$premonth5."-30'".$sqlFUpart3;
$sqlFUm6=$sqlFUpart1."'".$yearNumber."-".$premonth6."-01' AND '".$yearNumber."-".$premonth6."-31'".$sqlFUpart3;

} elseif ($lastmonth == '02') {	
$premonth1 = "03";
$premonth2 = "04";
$premonth3 = "05";
$premonth4 = "06";
$premonth5 = "07";
$premonth6 = "08";
$premonth1Text = "Mar";
$premonth2Text = "Apr";
$premonth3Text = "Maj";
$premonth4Text = "Jun";
$premonth5Text = "Jul";
$premonth6Text = "Aug";
$premonth1TextK = "Mars";
$premonth2TextK = "April";
$premonth3TextK = "Maj";
$premonth4TextK = "Juni";
$premonth5TextK = "Juli";
$premonth6TextK = "Augusti";

$unfinishedFU = $lastFeb;

$sqlFUm1=$sqlFUpart1."'".$yearNumber."-".$premonth1."-01' AND '".$yearNumber."-".$premonth1."-31'".$sqlFUpart3;
$sqlFUm2=$sqlFUpart1."'".$yearNumber."-".$premonth2."-01' AND '".$yearNumber."-".$premonth2."-30'".$sqlFUpart3;
$sqlFUm3=$sqlFUpart1."'".$yearNumber."-".$premonth3."-01' AND '".$yearNumber."-".$premonth3."-31'".$sqlFUpart3;
$sqlFUm4=$sqlFUpart1."'".$yearNumber."-".$premonth4."-01' AND '".$yearNumber."-".$premonth4."-30'".$sqlFUpart3;
$sqlFUm5=$sqlFUpart1."'".$yearNumber."-".$premonth5."-01' AND '".$yearNumber."-".$premonth5."-31'".$sqlFUpart3;
$sqlFUm6=$sqlFUpart1."'".$yearNumber."-".$premonth6."-01' AND '".$yearNumber."-".$premonth6."-31'".$sqlFUpart3;

} elseif ($lastmonth == '03') {	
$premonth1 = "04";
$premonth2 = "05";
$premonth3 = "06";
$premonth4 = "07";
$premonth5 = "08";
$premonth6 = "09";
$premonth1Text = "Apr";
$premonth2Text = "Maj";
$premonth3Text = "Jun";
$premonth4Text = "Jul";
$premonth5Text = "Aug";
$premonth6Text = "Sep";
$premonth1TextK = "April";
$premonth2TextK = "Maj";
$premonth3TextK = "Juni";
$premonth4TextK = "Juli";
$premonth5TextK = "Augusti";
$premonth6TextK = "September";

$unfinishedFU = $yearNumber."-".$lastmonth."-31";

$sqlFUm1=$sqlFUpart1."'".$yearNumber."-".$premonth1."-01' AND '".$yearNumber."-".$premonth1."-30'".$sqlFUpart3;
$sqlFUm2=$sqlFUpart1."'".$yearNumber."-".$premonth2."-01' AND '".$yearNumber."-".$premonth2."-31'".$sqlFUpart3;
$sqlFUm3=$sqlFUpart1."'".$yearNumber."-".$premonth3."-01' AND '".$yearNumber."-".$premonth3."-30'".$sqlFUpart3;
$sqlFUm4=$sqlFUpart1."'".$yearNumber."-".$premonth4."-01' AND '".$yearNumber."-".$premonth4."-31'".$sqlFUpart3;
$sqlFUm5=$sqlFUpart1."'".$yearNumber."-".$premonth5."-01' AND '".$yearNumber."-".$premonth5."-31'".$sqlFUpart3;
$sqlFUm6=$sqlFUpart1."'".$yearNumber."-".$premonth6."-01' AND '".$yearNumber."-".$premonth6."-30'".$sqlFUpart3;

} elseif ($lastmonth == '04') {	
$premonth1 = "05";
$premonth2 = "06";
$premonth3 = "07";
$premonth4 = "08";
$premonth5 = "09";
$premonth6 = "10";
$premonth1Text = "Maj";
$premonth2Text = "Jun";
$premonth3Text = "Jul";
$premonth4Text = "Aug";
$premonth5Text = "Sep";
$premonth6Text = "Okt";
$premonth1TextK = "Maj";
$premonth2TextK = "Juni";
$premonth3TextK = "Juli";
$premonth4TextK = "Augusti";
$premonth5TextK = "September";
$premonth6TextK = "Oktober";

$unfinishedFU = $yearNumber."-".$lastmonth."-30";

$sqlFUm1=$sqlFUpart1."'".$yearNumber."-".$premonth1."-01' AND '".$yearNumber."-".$premonth1."-31'".$sqlFUpart3;
$sqlFUm2=$sqlFUpart1."'".$yearNumber."-".$premonth2."-01' AND '".$yearNumber."-".$premonth2."-30'".$sqlFUpart3;
$sqlFUm3=$sqlFUpart1."'".$yearNumber."-".$premonth3."-01' AND '".$yearNumber."-".$premonth3."-31'".$sqlFUpart3;
$sqlFUm4=$sqlFUpart1."'".$yearNumber."-".$premonth4."-01' AND '".$yearNumber."-".$premonth4."-31'".$sqlFUpart3;
$sqlFUm5=$sqlFUpart1."'".$yearNumber."-".$premonth5."-01' AND '".$yearNumber."-".$premonth5."-30'".$sqlFUpart3;
$sqlFUm6=$sqlFUpart1."'".$yearNumber."-".$premonth6."-01' AND '".$yearNumber."-".$premonth6."-31'".$sqlFUpart3;

} elseif ($lastmonth == '05') {	
$premonth1 = "06";
$premonth2 = "07";
$premonth3 = "08";
$premonth4 = "09";
$premonth5 = "10";
$premonth6 = "11";
$premonth1Text = "Jun";
$premonth2Text = "Jul";
$premonth3Text = "Aug";
$premonth4Text = "Sep";
$premonth5Text = "Okt";
$premonth6Text = "Nov";
$premonth1TextK = "Juni";
$premonth2TextK = "Juli";
$premonth3TextK = "Augusti";
$premonth4TextK = "September";
$premonth5TextK = "Oktober";
$premonth6TextK = "November";

$unfinishedFU = $yearNumber."-".$lastmonth."-31";

$sqlFUm1=$sqlFUpart1."'".$yearNumber."-".$premonth1."-01' AND '".$yearNumber."-".$premonth1."-30'".$sqlFUpart3;
$sqlFUm2=$sqlFUpart1."'".$yearNumber."-".$premonth2."-01' AND '".$yearNumber."-".$premonth2."-31'".$sqlFUpart3;
$sqlFUm3=$sqlFUpart1."'".$yearNumber."-".$premonth3."-01' AND '".$yearNumber."-".$premonth3."-31'".$sqlFUpart3;
$sqlFUm4=$sqlFUpart1."'".$yearNumber."-".$premonth4."-01' AND '".$yearNumber."-".$premonth4."-30'".$sqlFUpart3;
$sqlFUm5=$sqlFUpart1."'".$yearNumber."-".$premonth5."-01' AND '".$yearNumber."-".$premonth5."-31'".$sqlFUpart3;
$sqlFUm6=$sqlFUpart1."'".$yearNumber."-".$premonth6."-01' AND '".$yearNumber."-".$premonth6."-30'".$sqlFUpart3;

} elseif ($lastmonth == '06') {	
$premonth1 = "07";
$premonth2 = "08";
$premonth3 = "09";
$premonth4 = "10";
$premonth5 = "10";
$premonth6 = "12";
$premonth1Text = "Jul";
$premonth2Text = "Aug";
$premonth3Text = "Sep";
$premonth4Text = "Okt";
$premonth5Text = "Nov";
$premonth6Text = "Dec";
$premonth1TextK = "Juli";
$premonth2TextK = "Augusti";
$premonth3TextK = "September";
$premonth4TextK = "Oktober";
$premonth5TextK = "November";
$premonth6TextK = "December";

$unfinishedFU = $yearNumber."-".$lastmonth."-30";

$sqlFUm1=$sqlFUpart1."'".$yearNumber."-".$premonth1."-01' AND '".$yearNumber."-".$premonth1."-31'".$sqlFUpart3;
$sqlFUm2=$sqlFUpart1."'".$yearNumber."-".$premonth2."-01' AND '".$yearNumber."-".$premonth2."-31'".$sqlFUpart3;
$sqlFUm3=$sqlFUpart1."'".$yearNumber."-".$premonth3."-01' AND '".$yearNumber."-".$premonth3."-30'".$sqlFUpart3;
$sqlFUm4=$sqlFUpart1."'".$yearNumber."-".$premonth4."-01' AND '".$yearNumber."-".$premonth4."-31'".$sqlFUpart3;
$sqlFUm5=$sqlFUpart1."'".$yearNumber."-".$premonth5."-01' AND '".$yearNumber."-".$premonth5."-30'".$sqlFUpart3;
$sqlFUm6=$sqlFUpart1."'".$yearNumber."-".$premonth6."-01' AND '".$yearNumber."-".$premonth6."-31'".$sqlFUpart3;

} elseif ($lastmonth == '07') {	
$premonth1 = "08";
$premonth2 = "09";
$premonth3 = "10";
$premonth4 = "11";
$premonth5 = "12";
$premonth6 = "01";
$premonth1Text = "Aug";
$premonth2Text = "Sep";
$premonth3Text = "Okt";
$premonth4Text = "Nov";
$premonth5Text = "Dec";
$premonth6Text = "Jan";
$premonth1TextK = "Augusti";
$premonth2TextK = "September";
$premonth3TextK = "Oktober";
$premonth4TextK = "November";
$premonth5TextK = "December";
$premonth6TextK = "Januari";

$unfinishedFU = $yearNumber."-".$lastmonth."-31";

$sqlFUm1=$sqlFUpart1."'".$yearNumber."-".$premonth1."-01' AND '".$yearNumber."-".$premonth1."-31'".$sqlFUpart3;
$sqlFUm2=$sqlFUpart1."'".$yearNumber."-".$premonth2."-01' AND '".$yearNumber."-".$premonth2."-30'".$sqlFUpart3;
$sqlFUm3=$sqlFUpart1."'".$yearNumber."-".$premonth3."-01' AND '".$yearNumber."-".$premonth3."-31'".$sqlFUpart3;
$sqlFUm4=$sqlFUpart1."'".$yearNumber."-".$premonth4."-01' AND '".$yearNumber."-".$premonth4."-30'".$sqlFUpart3;
$sqlFUm5=$sqlFUpart1."'".$yearNumber."-".$premonth5."-01' AND '".$yearNumber."-".$premonth5."-31'".$sqlFUpart3;
$sqlFUm6=$sqlFUpart1."'".$preyear."-".$premonth6."-01' AND '".$preyear."-".$premonth6."-31'".$sqlFUpart3;

} elseif ($lastmonth == '08') {
$premonth1 = "09";
$premonth2 = "10";
$premonth3 = "11";
$premonth4 = "12";
$premonth5 = "01";
$premonth6 = "02";
$premonth1Text = "Sep";
$premonth2Text = "Okt";
$premonth3Text = "Nov";
$premonth4Text = "Dec";
$premonth5Text = "Jan";
$premonth6Text = "Feb";
$premonth1TextK = "September";
$premonth2TextK = "Oktober";
$premonth3TextK = "November";
$premonth4TextK = "December";
$premonth5TextK = "Januari";
$premonth6TextK = "Februari";

$unfinishedFU = $yearNumber."-".$lastmonth."-31";

$sqlFUm1=$sqlFUpart1."'".$yearNumber."-".$premonth1."-01' AND '".$yearNumber."-".$premonth1."-30'".$sqlFUpart3;
$sqlFUm2=$sqlFUpart1."'".$yearNumber."-".$premonth2."-01' AND '".$yearNumber."-".$premonth2."-31'".$sqlFUpart3;
$sqlFUm3=$sqlFUpart1."'".$yearNumber."-".$premonth3."-01' AND '".$yearNumber."-".$premonth3."-30'".$sqlFUpart3;
$sqlFUm4=$sqlFUpart1."'".$yearNumber."-".$premonth4."-01' AND '".$yearNumber."-".$premonth4."-31'".$sqlFUpart3;
$sqlFUm5=$sqlFUpart1."'".$preyear."-".$premonth5."-01' AND '".$preyear."-".$premonth5."-31'".$sqlFUpart3;
$sqlFUm6=$sqlFUpart1."'".$preyear."-".$premonth6."-01' AND '".$nextlastfeb."'".$sqlFUpart3;

} elseif ($lastmonth == '09') {
$premonth1 = "10";
$premonth2 = "11";
$premonth3 = "12";
$premonth4 = "01";
$premonth5 = "02";
$premonth6 = "03";
$premonth1Text = "Okt";
$premonth2Text = "Nov";
$premonth3Text = "Dec";
$premonth4Text = "Jan";
$premonth5Text = "Feb";
$premonth6Text = "Mar";
$premonth1TextK = "Oktober";
$premonth2TextK = "November";
$premonth3TextK = "December";
$premonth4TextK = "Januari";
$premonth5TextK = "Februari";
$premonth6TextK = "Mars";

$unfinishedFU = $yearNumber."-".$lastmonth."-30";

$sqlFUm1=$sqlFUpart1."'".$yearNumber."-".$premonth1."-01' AND '".$yearNumber."-".$premonth1."-31'".$sqlFUpart3;
$sqlFUm2=$sqlFUpart1."'".$yearNumber."-".$premonth2."-01' AND '".$yearNumber."-".$premonth2."-30'".$sqlFUpart3;
$sqlFUm3=$sqlFUpart1."'".$yearNumber."-".$premonth3."-01' AND '".$yearNumber."-".$premonth3."-31'".$sqlFUpart3;
$sqlFUm4=$sqlFUpart1."'".$preyear."-".$premonth4."-01' AND '".$preyear."-".$premonth4."-31'".$sqlFUpart3;
$sqlFUm5=$sqlFUpart1."'".$preyear."-".$premonth5."-01' AND '".$nextlastfeb."'".$sqlFUpart3;
$sqlFUm6=$sqlFUpart1."'".$preyear."-".$premonth6."-01' AND '".$preyear."-".$premonth6."-31'".$sqlFUpart3;

} elseif ($lastmonth == '10') {
$premonth1 = "11";
$premonth2 = "12";
$premonth3 = "01";
$premonth4 = "02";
$premonth5 = "03";
$premonth6 = "04";
$premonth1Text = "Nov";
$premonth2Text = "Dec";
$premonth3Text = "Jan";
$premonth4Text = "Feb";
$premonth5Text = "Mar";
$premonth6Text = "Apr";
$premonth1TextK = "November";
$premonth2TextK = "December";
$premonth3TextK = "Januari";
$premonth4TextK = "Februari";
$premonth5TextK = "Mars";
$premonth6TextK = "April";

$unfinishedFU = $yearNumber."-".$lastmonth."-31";

$sqlFUm1=$sqlFUpart1."'".$yearNumber."-".$premonth1."-01' AND '".$yearNumber."-".$premonth1."-30'".$sqlFUpart3;
$sqlFUm2=$sqlFUpart1."'".$yearNumber."-".$premonth2."-01' AND '".$yearNumber."-".$premonth2."-31'".$sqlFUpart3;
$sqlFUm3=$sqlFUpart1."'".$preyear."-".$premonth3."-01' AND '".$preyear."-".$premonth3."-31'".$sqlFUpart3;
$sqlFUm4=$sqlFUpart1."'".$preyear."-".$premonth4."-01' AND '".$nextlastfeb."'".$sqlFUpart3;
$sqlFUm5=$sqlFUpart1."'".$preyear."-".$premonth5."-01' AND '".$preyear."-".$premonth5."-31'".$sqlFUpart3;
$sqlFUm6=$sqlFUpart1."'".$preyear."-".$premonth6."-01' AND '".$preyear."-".$premonth6."-30'".$sqlFUpart3;


} elseif ($lastmonth == '11') {
$premonth1 = "12";
$premonth2 = "01";
$premonth3 = "02";
$premonth4 = "03";
$premonth5 = "04";
$premonth6 = "05";
$premonth1Text = "Dec";
$premonth2Text = "Jan";
$premonth3Text = "Feb";
$premonth4Text = "Mar";
$premonth5Text = "Apr";
$premonth6Text = "Maj";
$premonth1TextK = "December";
$premonth2TextK = "Januari";
$premonth3TextK = "Februari";
$premonth4TextK = "Mars";
$premonth5TextK = "April";
$premonth6TextK = "Maj";

$unfinishedFU = $yearNumber."-".$lastmonth."-30";

$sqlFUm1=$sqlFUpart1."'".$yearNumber."-".$premonth1."-01' AND '".$yearNumber."-".$premonth1."-31'".$sqlFUpart3;
$sqlFUm2=$sqlFUpart1."'".$preyear."-".$premonth2."-01' AND '".$preyear."-".$premonth2."-31'".$sqlFUpart3;
$sqlFUm3=$sqlFUpart1."'".$preyear."-".$premonth3."-01' AND '".$nextlastfeb."'".$sqlFUpart3;
$sqlFUm4=$sqlFUpart1."'".$preyear."-".$premonth4."-01' AND '".$preyear."-".$premonth4."-31'".$sqlFUpart3;
$sqlFUm5=$sqlFUpart1."'".$preyear."-".$premonth5."-01' AND '".$preyear."-".$premonth5."-30'".$sqlFUpart3;
$sqlFUm6=$sqlFUpart1."'".$preyear."-".$premonth6."-01' AND '".$preyear."-".$premonth6."-31'".$sqlFUpart3;


} else {
$premonth1 = "01";
$premonth2 = "02";
$premonth3 = "03";
$premonth4 = "04";
$premonth5 = "05";
$premonth6 = "06";
$premonth1Text = "Jan";
$premonth2Text = "Feb";
$premonth3Text = "Mar";
$premonth4Text = "Apr";
$premonth5Text = "Maj";
$premonth6Text = "Jun";
$premonth1TextK = "Januari";
$premonth2TextK = "Februari";
$premonth3TextK = "Mars";
$premonth4TextK = "April";
$premonth5TextK = "Maj";
$premonth6TextK = "Juni";

$yearNumber_x = $yearNumber - 1;
$unfinishedFU = $yearNumber_x."-".$lastmonth."-31";

$sqlFUm1=$sqlFUpart1."'".$preyear."-".$premonth1."-01' AND '".$preyear."-".$premonth1."-31'".$sqlFUpart3;
$sqlFUm2=$sqlFUpart1."'".$preyear."-".$premonth2."-01' AND '".$nextlastfeb."'".$sqlFUpart3;
$sqlFUm3=$sqlFUpart1."'".$preyear."-".$premonth3."-01' AND '".$preyear."-".$premonth3."-31'".$sqlFUpart3;
$sqlFUm4=$sqlFUpart1."'".$preyear."-".$premonth4."-01' AND '".$preyear."-".$premonth4."-30'".$sqlFUpart3;
$sqlFUm5=$sqlFUpart1."'".$preyear."-".$premonth5."-01' AND '".$preyear."-".$premonth5."-31'".$sqlFUpart3;
$sqlFUm6=$sqlFUpart1."'".$preyear."-".$premonth6."-01' AND '".$preyear."-".$premonth6."-30'".$sqlFUpart3;

}

if ($monthNumber == '01') {
    $lastyear = $yearNumber-1;
    $lastresult = strtotime($lastyear."-".$lastmonth."-01");
    $lastresult = strtotime('-1 second', strtotime('+1 month', $lastresult));
    $lastmonthend = date('Y-m-d', $lastresult);	
    $lastmonthstart = $lastyear."-".$lastmonth."-01";
    } else {
    $lastresult = strtotime($yearNumber."-".$lastmonth."-01");
    $lastresult = strtotime('-1 second', strtotime('+1 month', $lastresult));
    $lastmonthend = date('Y-m-d', $lastresult);	
    $lastmonthstart = $yearNumber."-".$lastmonth."-01";
    }

$current_week=date('W');
$today = date('Y-m-d H:i');
$todayDATE = date('Y-m-d');
$datumminus3 = date("Y-m-d", strtotime("-12 month", strtotime($todayDATE)));
$datum1 = date("Y-m-d", strtotime("+3 month", strtotime($todayDATE)));
$todayTIME = date('H:i');
$todayWEEKDAY = date('F');
$datumminusA = date("Y-m-d", strtotime("-2 week", strtotime($todayDATE)));
$datumminusB = date("Y-m-d", strtotime("-1 month", strtotime($todayDATE)));
$datumminus3manader = date("Y-m-d", strtotime("-3 month", strtotime($todayDATE)));
$datumminus6manader = date("Y-m-d", strtotime("-6 month", strtotime($todayDATE)));
$datumminus9manader = date("Y-m-d", strtotime("-9 month", strtotime($todayDATE)));
$datumminus12manader = date("Y-m-d", strtotime("-12 month", strtotime($todayDATE)));
$datumminus24manader = date("Y-m-d", strtotime("-24 month", strtotime($todayDATE)));

// Create HTML code
echo "<HTML>";
echo "<HEAD>";
echo "<TITLE>FU-statistik från Medusa</TITLE>";
echo "<META http-equiv=\"Content-Typ\" content=\"text/html; charset=UTF-8\">";
echo "<script src='../.././chartjs/Chart.bundle.js'></script>";
echo "</HEAD>";

echo "<P>";

echo "<BODY bgcolor='#CCCCCC'>";

echo "<CENTER>";

// Unfinished PM. Measure from 2001 until today
$sqlunfinishedFU=$sqlFUpart1."'2001-01-01' AND '".$unfinishedFU."'".$sqlFUpart3;

// Connect to database
$connFU=odbc_connect("dbname","username","password");

if (!$connFU)
  {exit("Connection Failed: ".$connFU);}

$rsunfinishedFU=odbc_exec($connFU, $sqlunfinishedFU);

$unFU = 0;
$unFUhigh = 0;
$unFUest = 0;
$unFUesthigh = 0;
$noworkingtime = 0;
$unFUminus3manader = 0;
$unFUhighminus3manader = 0;
$unFUminus6manader = 0;
$unFUhighminus6manader = 0;
$unFUminus9manader = 0;
$unFUhighminus9manader = 0;
$unFUminus12manader = 0;
$unFUhighminus12manader = 0;
$unFUminus24manader = 0;
$unFUhighminus24manader = 0;

while (odbc_fetch_row($rsunfinishedFU))
  {  
  $TIDATGANGunFU=odbc_result($rsunfinishedFU, "Estimatedtime");
  $ANTALFUHOGARISKTAL=odbc_result($rsunfinishedFU, "intRisktal");
  $NASTAFU=odbc_result($rsunfinishedFU, "Nextdate");
  $unFUest = $unFUest + $TIDATGANGunFU;
  ++$unFU;
  if ($TIDATGANGunFU == 0) {
  	 ++$noworkingtime;
     };
  if ($ANTALFUHOGARISKTAL > 18) {
  	 ++$unFUhigh;
  	 //$unFUesthigh = $unFUesthigh + $TIDATGANGunFU;
     };
  if ($NASTAFU < $datumminus3manader) {
  	 ++$unFUminus3manader;
     };
  if (($NASTAFU < $datumminus3manader) && ($ANTALFUHOGARISKTAL > 18)) {
  	 ++$unFUhighminus3manader;
     };
  if ($NASTAFU < $datumminus6manader) {
  	 ++$unFUminus6manader;
     };
  if (($NASTAFU < $datumminus6manader) && ($ANTALFUHOGARISKTAL > 18)) {
  	 ++$unFUhighminus6manader;
     };
  if ($NASTAFU < $datumminus9manader) {
  	 ++$unFUminus9manader;
     };
  if (($NASTAFU < $datumminus9manader) && ($ANTALFUHOGARISKTAL > 18)) {
  	 ++$unFUhighminus9manader;
     };
  if ($NASTAFU < $datumminus12manader) {
  	 ++$unFUminus12manader;
     };
  if (($NASTAFU < $datumminus12manader) && ($ANTALFUHOGARISKTAL > 18)) {
  	 ++$unFUhighminus12manader;
     };
  if ($NASTAFU < $datumminus24manader) {
  	 ++$unFUminus24manader;
     };
  if (($NASTAFU < $datumminus24manader) && ($ANTALFUHOGARISKTAL > 18)) {
  	 ++$unFUhighminus24manader;
     };
  };

odbc_close($connFU);

// Month +1
$connFU=odbc_connect("dbname","username","password");
$rsFUm1=odbc_exec($connFU, $sqlFUm1);

$im1 = 0;
$est1 = 0;
$noworkingtime1 = 0;

while (odbc_fetch_row($rsFUm1))
  {  
  $TIDATGANG1=odbc_result($rsFUm1, "Estimatedtime");
  $est1 = $est1 + $TIDATGANG1;
  ++$im1;
  if ($TIDATGANG1 == 0) {
  	  ++$noworkingtime1;
     }
  }

odbc_close($connFU);

// Month +2
$connFU=odbc_connect("dbname","username","password");
$rsFUm2=odbc_exec($connFU, $sqlFUm2);

$im2 = 0;
$est2 = 0;

while (odbc_fetch_row($rsFUm2))
  { 
  $TIDATGANG2=odbc_result($rsFUm2, "Estimatedtime");
  $est2 = $est2 + $TIDATGANG2;
  ++$im2;
  }

odbc_close($connFU);

// Month +3
$connFU=odbc_connect("dbname","username","password");
$rsFUm3=odbc_exec($connFU, $sqlFUm3);

$im3 = 0;
$est3 = 0;

while (odbc_fetch_row($rsFUm3))
  { 
  $TIDATGANG3=odbc_result($rsFUm3, "Estimatedtime");
  $est3 = $est3 + $TIDATGANG3;
  ++$im3;
  }

odbc_close($connFU);

// Month +4
$connFU=odbc_connect("dbname","username","password");
$rsFUm4=odbc_exec($connFU, $sqlFUm4);

$im4 = 0;
$est4 = 0;

while (odbc_fetch_row($rsFUm4))
  { 
  $TIDATGANG4=odbc_result($rsFUm4, "Estimatedtime");
  $est4 = $est4 + $TIDATGANG4;
  ++$im4;
  }

odbc_close($connFU);

// Month +5
$connFU=odbc_connect("dbname","username","password");
$rsFUm5=odbc_exec($connFU, $sqlFUm5);

$im5 = 0;
$est5 = 0;

while (odbc_fetch_row($rsFUm5))
  {
  $TIDATGANG5=odbc_result($rsFUm5, "Estimatedtime");
  $est5 = $est5 + $TIDATGANG5;
  ++$im5;
  }
  
odbc_close($connFU);

// Month +6
$connFU=odbc_connect("dbname","username","password");
$rsFUm6=odbc_exec($connFU, $sqlFUm6);

$im6 = 0;
$est6 = 0;

while (odbc_fetch_row($rsFUm6))
  {
  $TIDATGANG6=odbc_result($rsFUm6, "Estimatedtime");
  $est6 = $est6 + $TIDATGANG6;  	  
  ++$im6;
  }

odbc_close($connFU); 

// Round result
$est1 = round($est1);
$est2 = round($est2);
$est3 = round($est3);
$est4 = round($est4);
$est5 = round($est5);
$est6 = round($est6);

// Result presentation in a table
echo "<center>";
echo "<table width=100% CELLPADDING='2' CELLSPACING='1'>";
echo "<tr BGCOLOR='#CCCCCC' Align='middle'>";
echo "<td>";
echo "<table width=90% CELLPADDING='2' CELLSPACING='0'>";
echo "<tr BGCOLOR='#DDDDDD' colspan='3'>";
echo "<td align='left'><b>Månad</b></td><td><b>Antal FU:n</b></td><td><b>Arbetstimmar [h]</b></td>";
echo "</tr>";
echo "<tr BGCOLOR='#CCCCCC'>";
echo "<td align='left'>$premonth1TextK</td><td align='center'><Font size='4' color='#0000FF'>$im1</font></td><td align='center'>$est1</td>";
echo "<tr BGCOLOR='#DDDDDD'>";
echo "<td>$premonth2TextK</td><td align='center'><Font size='4' color='#0000FF'>$im2</font></td><td align='center'>$est2</td>";
echo "</tr>";
echo "<tr BGCOLOR='#CCCCCC'>";
echo "<td>$premonth3TextK</td><td align='center'><Font size='4' color='#0000FF'>$im3 </font></td><td align='center'>$est3</td>";
echo "</tr>";
echo "<tr BGCOLOR='#DDDDDD'>";
echo "<td>$premonth4TextK</td><td align='center'><Font size='4' color='#0000FF'>$im4 </font></td><td align='center'>$est4</td>";
echo "</tr>";
echo "<tr BGCOLOR='#CCCCCC'>";
echo "<td>$premonth5TextK</td><td align='center'><Font size='4' color='#0000FF'>$im5 </font></td><td align='center'>$est5</td>";
echo "</tr>";
echo "<tr BGCOLOR='#DDDDDD'>";
echo "<td>$premonth6TextK</td><td align='center'><Font size='4' color='#0000FF'>$im6 </font></td><td align='center'>$est6</td>";
echo "</tr>";
echo "<tr BGCOLOR='#CCCCCC'>";
echo "<td></td><td align='center'><Font size='4' color='#0000FF'></font></td><td align='center'></td>";
echo "</tr>";
echo "<tr BGCOLOR='#FFE680'>";
echo "<td>FU-eftersläp t o m $idagDatum. Totalt antal/varav höga risktal</td><td align='center'><Font size='4' color='#0000FF'><b>$unFU / $unFUhigh</b></font></td><td align='center'><b>".round($unFUest)."</b></td>";
echo "</tr>";
echo "<tr BGCOLOR='#FFF5CC'>";
echo "<td>FU-eftersläp > 3 mån</td><td align='center'><Font size='4' color='#0000FF'>$unFUminus3manader / $unFUhighminus3manader</font></td><td align='center'><b></b></td>";
echo "</tr>";
echo "<tr BGCOLOR='#FFE680'>";
echo "<td>FU-eftersläp > 6 mån</td><td align='center'><Font size='4' color='#0000FF'>$unFUminus6manader / $unFUhighminus6manader</font></td><td align='center'><b></b></td>";
echo "</tr>";
echo "<tr BGCOLOR='#FFF5CC'>";
echo "<td>FU-eftersläp > 9 mån</td><td align='center'><Font size='4' color='#0000FF'>$unFUminus9manader / $unFUhighminus9manader</font></td><td align='center'><b></b></td>";
echo "</tr>";
echo "<tr BGCOLOR='#FFE680'>";
echo "<td>FU-eftersläp > 12 mån</td><td align='center'><Font size='4' color='#0000FF'>$unFUminus12manader / $unFUhighminus12manader</font></td><td align='center'><b></b></td>";
echo "</tr>";
echo "<tr BGCOLOR='#FFF5CC'>";
echo "<td>FU-eftersläp > 24 mån</td><td align='center'><Font size='4' color='#0000FF'>$unFUminus24manader / $unFUhighminus24manader</font></td><td align='center'><b></b></td>";
echo "</tr>";
$totfuantal = $unFU + $im1;
$totfuantalest = round($unFUest) + $est1;
$totfuuntime = $noworkingtime + $noworkingtime1;
$totfuunest = $totfuuntime*2;
echo "</table>";
echo "</td>"; 
echo "<td><div class='chart-container' style='position: relative; height:250px; width:500px;'><canvas id='myChart'></canvas></div></td>";
echo "</tr>";
echo "</table>";
echo "</center>";

?>

<script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
<?php
        echo "labels: ['$premonth1Text', '$premonth2Text', '$premonth3Text', '$premonth4Text', '$premonth5Text', '$premonth6Text'],";
        echo "\ndatasets: [{";
        echo "\nlabel: 'Antal FU:n',";
        echo "\ndata: [$im1, $im2, $im3, $im4, $im5, $im6],";
?>
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1,
        },
                {
<?php
        echo "label: 'Beräknat antal h',";
        echo "data: [".$est1.", ".$est2.", ".$est3.", ".$est4.", ".$est5.", ".$est6."],";
?>
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1,
        }
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

;
</script>

<?php

echo "</CENTER>";

echo "</body>";

echo "</html>";

?>
