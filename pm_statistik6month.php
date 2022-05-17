/*
*******************************************************************************
FILENAME		pm_statistik6month.php

Encoding		UTF-8

DESCRIPTION		Preventive maintenance statistik 6 month

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

// Test value
$FRANDATUM = "2022-12-01";
$TILLDATUM = "2022-12-31";

date_default_timezone_set('Europe/Stockholm');

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

$sqlFUm1=$sqlFUpart1."'".$preyear."-".$premonth1."-01' AND '".$preyear."-".$premonth1."-31'".$sqlFUpart3;
$sqlFUm2=$sqlFUpart1."'".$preyear."-".$premonth2."-01' AND '".$nextlastfeb."'".$sqlFUpart3;
$sqlFUm3=$sqlFUpart1."'".$preyear."-".$premonth3."-01' AND '".$preyear."-".$premonth3."-31'".$sqlFUpart3;
$sqlFUm4=$sqlFUpart1."'".$preyear."-".$premonth4."-01' AND '".$preyear."-".$premonth4."-30'".$sqlFUpart3;
$sqlFUm5=$sqlFUpart1."'".$preyear."-".$premonth5."-01' AND '".$preyear."-".$premonth5."-31'".$sqlFUpart3;
$sqlFUm6=$sqlFUpart1."'".$preyear."-".$premonth6."-01' AND '".$preyear."-".$premonth6."-30'".$sqlFUpart3;

}

$sqlFUm_0=$sqlFUpart1."'2001-01-01' AND '".$idagDatum."'".$sqlFUpart3;

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

// Connect to database
$connFU=odbc_connect("dbname","username","password");

if (!$connFU)
  {exit("Connection Failed: ".$connFU);}

$rsFUm_0=odbc_exec($connFU, $sqlFUm_0);

// Reset counters
$im1_0 = 0;
$est1_0 = 0;

$andn_0 = 0;
$anes_0 = 0;
$barn_0 = 0;
$defi_0 = 0;
$desi_0 = 0;
$dial_0 = 0;
$diat_0 = 0;
$endo_0 = 0;
$ftv_0 = 0;
$fysi_0 = 0;
$gymn_0 = 0;
$infu_0 = 0;
$kard_0 = 0;
$labu_0 = 0;
$lase_0 = 0;
$meda_0 = 0;
$mikr_0 = 0;
$mtau_0 = 0;
$mtkal_0 = 0;
$onko_0 = 0;
$oput_0 = 0;
$rtge_0 = 0;
$ultr_0 = 0;
$vent_0 = 0;
$vidk_0 = 0;
$saknas_0 = 0;

$andn_0h = 0;
$anes_0h = 0;
$barn_0h = 0;
$defi_0h = 0;
$desi_0h = 0;
$dial_0h = 0;
$diat_0h = 0;
$endo_0h = 0;
$ftv_0h = 0;
$fysi_0h = 0;
$gymn_0h = 0;
$infu_0h = 0;
$kard_0h = 0;
$labu_0h = 0;
$lase_0h = 0;
$meda_0h = 0;
$mikr_0h = 0;
$mtau_0h = 0;
$mtkal_0h = 0;
$onko_0h = 0;
$oput_0h = 0;
$rtge_0h = 0;
$ultr_0h = 0;
$vent_0h = 0;
$vidk_0h = 0;
$saknas_0h = 0;

$andn_0_19 = 0;
$anes_0_19 = 0;
$barn_0_19 = 0;
$defi_0_19 = 0;
$desi_0_19 = 0;
$dial_0_19 = 0;
$diat_0_19 = 0;
$endo_0_19 = 0;
$ftv_0_19 = 0;
$fysi_0_19 = 0;
$gymn_0_19 = 0;
$infu_0_19 = 0;
$kard_0_19 = 0;
$labu_0_19 = 0;
$lase_0_19 = 0;
$meda_0_19 = 0;
$mikr_0_19 = 0;
$mtau_0_19 = 0;
$mtkal_0_19 = 0;
$onko_0_19 = 0;
$oput_0_19 = 0;
$rtge_0_19 = 0;
$ultr_0_19 = 0;
$vent_0_19 = 0;
$vidk_0_19 = 0;
$saknas_0_19 = 0;

$andn_0_19h = 0;
$anes_0_19h = 0;
$barn_0_19h = 0;
$defi_0_19h = 0;
$desi_0_19h = 0;
$dial_0_19h = 0;
$diat_0_19h = 0;
$endo_0_19h = 0;
$ftv_0_19h = 0;
$fysi_0_19h = 0;
$gymn_0_19h = 0;
$infu_0_19h = 0;
$kard_0_19h = 0;
$labu_0_19h = 0;
$lase_0_19h = 0;
$meda_0_19h = 0;
$mikr_0_19h = 0;
$mtau_0_19h = 0;
$mtkal_0_19h = 0;
$onko_0_19h = 0;
$oput_0_19h = 0;
$rtge_0_19h = 0;
$ultr_0_19h = 0;
$vent_0_19h = 0;
$vidk_0_19h = 0;
$saknas_0_19h = 0;

// Count number in every group
while (odbc_fetch_row($rsFUm_0))
  { 
  $FILTER=odbc_result($rsFUm_0, "intfilter");  
  $TIDATGANG=odbc_result($rsFUm_0, "Estimatedtime");
  $RISKTAL=odbc_result($rsFUm_0, "intRisktal");  
  $INVGRUPP=odbc_result($rsFUm_0, "grupp");
  $PLACERING=odbc_result($rsFUm_0, "Place");

  $est1_0 = $est1_0 + $TIDATGANG;
  ++$im1_0;
    
  if ($INVGRUPP == "ANDN") {
  ++$andn_0;
  $andn_0h=$andn_0h+$TIDATGANG;
     if ($RISKTAL > 18) {
  ++$andn_0_19;
  $andn_0_19h=$andn_0_19h+$TIDATGANG;
  }
  } elseif ($INVGRUPP == "ANES") {
  ++$anes_0;
  $anes_0h=$anes_0h+$TIDATGANG;
     if ($RISKTAL > 18) {
  ++$anes_0_19;
  $anes_0_19h=$anes_0_19h+$TIDATGANG;
  }
  } elseif ($INVGRUPP == "BARN") {
  ++$barn_0;
  $barn_0h=$barn_0h+$TIDATGANG;;
     if ($RISKTAL > 18) {
  ++$barn_0_19;
  $barn_0_19h=$barn_0_19h+$TIDATGANG;
  }
  } elseif ($INVGRUPP == "DEFI") {
  ++$defi_0;
  $defi_0h=$defi_0h+$TIDATGANG;
     if ($RISKTAL > 18) {
  ++$defi_0_19;
  $defi_0_19h=$defi_0_19h+$TIDATGANG;
  }
  } elseif ($INVGRUPP == "DESI") {
  ++$desi_0;
  $desi_0h=$desi_0h+$TIDATGANG;
     if ($RISKTAL > 18) {
  ++$desi_0_19;
  $desi_0_19h=$desi_0_19h+$TIDATGANG;
  }
  } elseif ($INVGRUPP == "DIAL") {
  ++$dial_0;
  $dial_0h=$dial_0h+$TIDATGANG;
     if ($RISKTAL > 18) {
  ++$dial_0_19;
  $dial_0_19h=$dial_0_19h+$TIDATGANG;
  }
  } elseif ($INVGRUPP == "DIAT") { 
  ++$diat_0;
  $diat_0h=$diat_0h+$TIDATGANG;
     if ($RISKTAL > 18) {
  ++$diat_0_19;
  $diat_0_19h=$diat_0_19h+$TIDATGANG;
  }
  } elseif ($INVGRUPP == "ENDO") {  
  ++$endo_0;
  $endo_0h=$endo_0h+$TIDATGANG;
     if ($RISKTAL > 18) {
  ++$endo_0_19;
  $endo_0_19h=$endo_0_19h+$TIDATGANG;
  }
  } elseif ($INVGRUPP == "FTV") {   
  ++$ftv_0;
  $ftv_0h=$ftv_0h+$TIDATGANG;
     if ($RISKTAL > 18) {
  ++$ftv_0_19;
  $ftv_0_19h=$ftv_0_19h+$TIDATGANG;
  }
  } elseif ($INVGRUPP == "FYSI") { 
  ++$fysi_0;
  $fysi_0h=$fysi_0h+$TIDATGANG;
     if ($RISKTAL > 18) {
  ++$fysi_0_19;
  $fysi_0_19h=$fysi_0_19h+$TIDATGANG;
  }
  } elseif ($INVGRUPP == "GYMN") {   
  ++$gymn_0;
  $gymn_0h=$gymn_0h+$TIDATGANG;
     if ($RISKTAL > 18) {
  ++$gymn_0_19;
  $gymn_0_19h=$gymn_0_19h+$TIDATGANG;
  }
  } elseif ($INVGRUPP == "INFU") { 
  ++$infu_0;
  $infu_0h=$infu_0h+$TIDATGANG;
     if ($RISKTAL > 18) {
  ++$infu_0_19;
  $infu_0_19h=$infu_0_19h+$TIDATGANG;
  }
  } elseif ($INVGRUPP == "KARD") {   
  ++$kard_0;
  $kard_0h=$kard_0h+$TIDATGANG;
     if ($RISKTAL > 18) {
  ++$kard_0_19;
  $kard_0_19h=$kard_0_19h+$TIDATGANG;
  }
  } elseif ($INVGRUPP == "LABU") {   
  ++$labu_0;
  $labu_0h=$labu_0h+$TIDATGANG;
     if ($RISKTAL > 18) {
  ++$labu_0_19;
  $labu_0_19h=$labu_0_19h+$TIDATGANG;
  }
  } elseif ($INVGRUPP == "LASE") {   
  ++$lase_0;
  $lase_0h=$lase_0h+$TIDATGANG;
     if ($RISKTAL > 18) {
  ++$lase_0_19;
  $lase_0_19h=$lase_0_19h+$TIDATGANG;
  }
  } elseif ($INVGRUPP == "MEDA") {   
  ++$meda_0;
  $meda_0h=$meda_0h+$TIDATGANG;
     if ($RISKTAL > 18) {
  ++$meda_0_19;
  $meda_0_19h=$meda_0_19h+$TIDATGANG;
  }
  } elseif ($INVGRUPP == "MIKR") {   
  ++$mikr_0;
  $mikr_0h=$mikr_0h+$TIDATGANG;
     if ($RISKTAL > 18) {
  ++$mikr_0_19;
  $mikr_0_19h=$mikr_0_19h+$TIDATGANG;
  }
  } elseif ($INVGRUPP == "MTAU") {   
  ++$mtau_0;
  $mtau_0h=$mtau_0h+$TIDATGANG;
     if ($RISKTAL > 18) {
  ++$mtau_0_19;
  $mtau_0_19h=$mtau_0_19h+$TIDATGANG;
  }
  } elseif ($INVGRUPP == "MTKAL") {   
  ++$mtkal_0;
  $mtkal_0h=$mtkal_0h+$TIDATGANG;
     if ($RISKTAL > 18) {
  ++$mtkal_0_19;
  $mtkal_0_19h=$mtkal_0_19h+$TIDATGANG;
  }
  } elseif ($INVGRUPP == "ONKO") {   
  ++$onko_0;
  $onko_0h=$onko_0h+$TIDATGANG;
     if ($RISKTAL > 18) {
  ++$onko_0_19;
  $onko_0_19h=$onko_0_19h+$TIDATGANG;
  }
  } elseif ($INVGRUPP == "OPUT") {   
  ++$oput_0;
  $oput_0h=$oput_0h+$TIDATGANG;
     if ($RISKTAL > 18) {
  ++$oput_0_19;
  $oput_0_19h=$oput_0_19h+$TIDATGANG;
  }
  } elseif ($INVGRUPP == "RTGE") {   
  ++$rtge_0;
  $rtge_0h=$rtge_0h+$TIDATGANG;
     if ($RISKTAL > 18) {
  ++$rtge_0_19;
  $rtge_0_19h=$rtge_0_19h+$TIDATGANG;
  }
  } elseif ($INVGRUPP == "ULTR") {   
  ++$ultr_0;
  $ultr_0h=$ultr_0h+$TIDATGANG;
     if ($RISKTAL > 18) {
  ++$ultr_0_19;
  $ultr_0_19h=$ultr_0_19h+$TIDATGANG;
  }
  } elseif ($INVGRUPP == "VENT") {   
  ++$vent_0;
  $vent_0h=$vent_0h+$TIDATGANG;
     if ($RISKTAL > 18) {
  ++$vent_0_19;
  $vent_0_19h=$vent_0_19h+$TIDATGANG;
  }
  } elseif ($INVGRUPP == "VIDK") {   
  ++$vidk_0;
  $vidk_0h=$vidk_0h+$TIDATGANG;
     if ($RISKTAL > 18) {
  ++$vidk_0_19;
  $vidk_0_19h=$vidk_0_19h+$TIDATGANG;
  }
  } else {   
  ++$saknas_0;
  $saknas_0h=$saknas_0h+$TIDATGANG;
     if ($RISKTAL > 18) {
  ++$saknas_0_19;
  $saknas_0_19h=$saknas_0_19h+$TIDATGANG;
  }
  }
 
  }

odbc_close($connFU);

// Month +1
$connFU=odbc_connect("dbname","username","password");

if (!$connFU)
  {exit("Connection Failed: ".$connFU);}

$rsFUm1=odbc_exec($connFU, $sqlFUm1);

$im1 = 0;
$est1 = 0;

$andn = 0;
$anes = 0;
$barn = 0;
$defi = 0;
$desi = 0;
$dial = 0;
$diat = 0;
$endo = 0;
$ftv = 0;
$fysi = 0;
$gymn = 0;
$infu = 0;
$kard = 0;
$labu = 0;
$lase = 0;
$meda = 0;
$mikr = 0;
$mtau = 0;
$mtkal = 0;
$onko = 0;
$oput = 0;
$rtge = 0;
$ultr = 0;
$vent = 0;
$vidk = 0;
$saknas = 0;

$andn_19 = 0;
$anes_19 = 0;
$barn_19 = 0;
$defi_19 = 0;
$desi_19 = 0;
$dial_19 = 0;
$diat_19 = 0;
$endo_19 = 0;
$ftv_19 = 0;
$fysi_19 = 0;
$gymn_19 = 0;
$infu_19 = 0;
$kard_19 = 0;
$labu_19 = 0;
$lase_19 = 0;
$meda_19 = 0;
$mikr_19 = 0;
$mtau_19 = 0;
$mtkal_19 = 0;
$onko_19 = 0;
$oput_19 = 0;
$rtge_19 = 0;
$ultr_19 = 0;
$vent_19 = 0;
$vidk_19 = 0;
$saknas_19 = 0;

while (odbc_fetch_row($rsFUm1))
  { 
  $FILTER=odbc_result($rsFUm1, "intfilter");  
  $TIDATGANG=odbc_result($rsFUm1, "Estimatedtime");
  $RISKTAL=odbc_result($rsFUm1, "intRisktal");  
  $INVGRUPP=odbc_result($rsFUm1, "grupp");
  $PLACERING=odbc_result($rsFUm1, "Place");
  
  $est1 = $est1 + $TIDATGANG;
  ++$im1;
    
  if ($INVGRUPP == "ANDN") {
  ++$andn;
     if ($RISKTAL > 18) {
  ++$andn_19;
  }
  } elseif ($INVGRUPP == "ANES") {
  ++$anes;
     if ($RISKTAL > 18) {
  ++$anes_19;
  }
  } elseif ($INVGRUPP == "BARN") {
  ++$barn;
     if ($RISKTAL > 18) {
  ++$barn_19;
  }
  } elseif ($INVGRUPP == "DEFI") {
  ++$defi;
     if ($RISKTAL > 18) {
  ++$defi_19;
  }
  } elseif ($INVGRUPP == "DESI") {
  ++$desi;
     if ($RISKTAL > 18) {
  ++$desi_19;
  }
  } elseif ($INVGRUPP == "DIAL") {
  ++$dial;
     if ($RISKTAL > 18) {
  ++$dial_19;
  }
  } elseif ($INVGRUPP == "DIAT") { 
  ++$diat;
     if ($RISKTAL > 18) {
  ++$diat_19;
  }
  } elseif ($INVGRUPP == "ENDO") {  
  ++$endo;
     if ($RISKTAL > 18) {
  ++$endo_19;
  }
  } elseif ($INVGRUPP == "FTV") {   
  ++$ftv;
     if ($RISKTAL > 18) {
  ++$ftv_19;
  }
  } elseif ($INVGRUPP == "FYSI") { 
  ++$fysi;
     if ($RISKTAL > 18) {
  ++$fysi_19;
  }
  } elseif ($INVGRUPP == "GYMN") {   
  ++$gymn;
     if ($RISKTAL > 18) {
  ++$gymn_19;
  }
  } elseif ($INVGRUPP == "INFU") { 
  ++$infu;
     if ($RISKTAL > 18) {
  ++$infu_19;
  }
  } elseif ($INVGRUPP == "KARD") {   
  ++$kard;
     if ($RISKTAL > 18) {
  ++$kard_19;
  }
  } elseif ($INVGRUPP == "LABU") {   
  ++$labu;
     if ($RISKTAL > 18) {
  ++$labu_19;
  }
  } elseif ($INVGRUPP == "LASE") {   
  ++$lase;
     if ($RISKTAL > 18) {
  ++$lase_19;
  }
  } elseif ($INVGRUPP == "MEDA") {   
  ++$meda;
     if ($RISKTAL > 18) {
  ++$meda_19;
  }
  } elseif ($INVGRUPP == "MIKR") {   
  ++$mikr;
     if ($RISKTAL > 18) {
  ++$mikr_19;
  }
  } elseif ($INVGRUPP == "MTAU") {   
  ++$mtau;
     if ($RISKTAL > 18) {
  ++$mtau_19;
  }
  } elseif ($INVGRUPP == "MTKAL") {   
  ++$mtkal;
     if ($RISKTAL > 18) {
  ++$mtkal_19;
  }
  } elseif ($INVGRUPP == "ONKO") {   
  ++$onko;
     if ($RISKTAL > 18) {
  ++$onko_19;
  }
  } elseif ($INVGRUPP == "OPUT") {   
  ++$oput;
     if ($RISKTAL > 18) {
  ++$oput_19;
  }
  } elseif ($INVGRUPP == "RTGE") {   
  ++$rtge;
     if ($RISKTAL > 18) {
  ++$rtge_19;
  }
  } elseif ($INVGRUPP == "ULTR") {   
  ++$ultr;
     if ($RISKTAL > 18) {
  ++$ultr_19;
  }
  } elseif ($INVGRUPP == "VENT") {   
  ++$vent;
     if ($RISKTAL > 18) {
  ++$vent_19;
  }
  } elseif ($INVGRUPP == "VIDK") {   
  ++$vidk;
     if ($RISKTAL > 18) {
  ++$vidk_19;
  }
  } else {   
  ++$saknas;
     if ($RISKTAL > 18) {
  ++$saknas_19;
  }
  }
 
  }

odbc_close($connFU);

// Month +2
$connFU=odbc_connect("dbname","username","password");

if (!$connFU)
  {exit("Connection Failed: ".$connFU);}

$rsFUm2=odbc_exec($connFU, $sqlFUm2);

$im2 = 0;
$est2 = 0;

$andn2 = 0;
$anes2 = 0;
$barn2 = 0;
$defi2 = 0;
$desi2 = 0;
$dial2 = 0;
$diat2 = 0;
$endo2 = 0;
$ftv2 = 0;
$fysi2 = 0;
$gymn2 = 0;
$infu2 = 0;
$kard2 = 0;
$labu2 = 0;
$lase2 = 0;
$meda2 = 0;
$mikr2 = 0;
$mtau2 = 0;
$mtkal2 = 0;
$onko2 = 0;
$oput2 = 0;
$rtge2 = 0;
$ultr2 = 0;
$vent2 = 0;
$vidk2 = 0;
$saknas2 = 0;

$andn2_19 = 0;
$anes2_19 = 0;
$barn2_19 = 0;
$defi2_19 = 0;
$desi2_19 = 0;
$dial2_19 = 0;
$diat2_19 = 0;
$endo2_19 = 0;
$ftv2_19 = 0;
$fysi2_19 = 0;
$gymn2_19 = 0;
$infu2_19 = 0;
$kard2_19 = 0;
$labu2_19 = 0;
$lase2_19 = 0;
$meda2_19 = 0;
$mikr2_19 = 0;
$mtau2_19 = 0;
$mtkal2_19 = 0;
$onko2_19 = 0;
$oput2_19 = 0;
$rtge2_19 = 0;
$ultr2_19 = 0;
$vent2_19 = 0;
$vidk2_19 = 0;
$saknas2_19 = 0;

while (odbc_fetch_row($rsFUm2))
  { 
  $FILTER=odbc_result($rsFUm2, "intfilter");  
  $TIDATGANG=odbc_result($rsFUm2, "Estimatedtime");
  $RISKTAL=odbc_result($rsFUm2, "intRisktal");  
  $INVGRUPP=odbc_result($rsFUm2, "grupp");
  $PLACERING=odbc_result($rsFUm2, "Place");
  
  $est2 = $est2 + $TIDATGANG;
  ++$im2;
    
  if ($INVGRUPP == "ANDN") {
  ++$andn2;
     if ($RISKTAL > 18) {
  ++$andn2_19;
  }
  } elseif ($INVGRUPP == "ANES") {
  ++$anes2;
     if ($RISKTAL > 18) {
  ++$anes2_19;
  }
  } elseif ($INVGRUPP == "BARN") {
  ++$barn2;
     if ($RISKTAL > 18) {
  ++$barn2_19;
  }
  } elseif ($INVGRUPP == "DEFI") {
  ++$defi2;
     if ($RISKTAL > 18) {
  ++$defi2_19;
  }
  } elseif ($INVGRUPP == "DESI") {
  ++$desi2;
     if ($RISKTAL > 18) {
  ++$desi2_19;
  }
  } elseif ($INVGRUPP == "DIAL") {
  ++$dial2;
     if ($RISKTAL > 18) {
  ++$dial2_19;
  }
  } elseif ($INVGRUPP == "DIAT") { 
  ++$diat2;
     if ($RISKTAL > 18) {
  ++$diat2_19;
  }
  } elseif ($INVGRUPP == "ENDO") {  
  ++$endo2;
     if ($RISKTAL > 18) {
  ++$endo2_19;
  }
  } elseif ($INVGRUPP == "FTV") {   
  ++$ftv2;
     if ($RISKTAL > 18) {
  ++$ftv2_19;
  }
  } elseif ($INVGRUPP == "FYSI") { 
  ++$fysi2;
     if ($RISKTAL > 18) {
  ++$fysi2_19;
  }
  } elseif ($INVGRUPP == "GYMN") {   
  ++$gymn2;
     if ($RISKTAL > 18) {
  ++$gymn2_19;
  }
  } elseif ($INVGRUPP == "INFU") { 
  ++$infu2;
     if ($RISKTAL > 18) {
  ++$infu2_19;
  }
  } elseif ($INVGRUPP == "KARD") {   
  ++$kard2;
     if ($RISKTAL > 18) {
  ++$kard2_19;
  }
  } elseif ($INVGRUPP == "LABU") {   
  ++$labu2;
     if ($RISKTAL > 18) {
  ++$labu2_19;
  }
  } elseif ($INVGRUPP == "LASE") {   
  ++$lase2;
     if ($RISKTAL > 18) {
  ++$lase2_19;
  }
  } elseif ($INVGRUPP == "MEDA") {   
  ++$meda2;
     if ($RISKTAL > 18) {
  ++$meda2_19;
  }
  } elseif ($INVGRUPP == "MIKR") {   
  ++$mikr2;
     if ($RISKTAL > 18) {
  ++$mikr2_19;
  }
  } elseif ($INVGRUPP == "MTAU") {   
  ++$mtau2;
     if ($RISKTAL > 18) {
  ++$mtau2_19;
  }
  } elseif ($INVGRUPP == "MTKAL") {   
  ++$mtkal2;
     if ($RISKTAL > 18) {
  ++$mtkal2_19;
  }
  } elseif ($INVGRUPP == "ONKO") {   
  ++$onko2;
     if ($RISKTAL > 18) {
  ++$onko2_19;
  }
  } elseif ($INVGRUPP == "OPUT") {   
  ++$oput2;
     if ($RISKTAL > 18) {
  ++$oput2_19;
  }
  } elseif ($INVGRUPP == "RTGE") {   
  ++$rtge2;
     if ($RISKTAL > 18) {
  ++$rtge2_19;
  }
  } elseif ($INVGRUPP == "ULTR") {   
  ++$ultr2;
     if ($RISKTAL > 18) {
  ++$ultr2_19;
  }
  } elseif ($INVGRUPP == "VENT") {   
  ++$vent2;
     if ($RISKTAL > 18) {
  ++$vent2_19;
  }
  } elseif ($INVGRUPP == "VIDK") {   
  ++$vidk2;
     if ($RISKTAL > 18) {
  ++$vidk2_19;
  }
  } else {   
  ++$saknas2;
     if ($RISKTAL > 18) {
  ++$saknas2_19;
  }
  }
 
  }

odbc_close($connFU);

// Month +3
$connFU=odbc_connect("dbname","username","password");

if (!$connFU)
  {exit("Connection Failed: ".$connFU);}

$rsFUm3=odbc_exec($connFU, $sqlFUm3);

$im3 = 0;
$est3 = 0;

$andn3 = 0;
$anes3 = 0;
$barn3 = 0;
$defi3 = 0;
$desi3 = 0;
$dial3 = 0;
$diat3 = 0;
$endo3 = 0;
$ftv3 = 0;
$fysi3 = 0;
$gymn3 = 0;
$infu3 = 0;
$kard3 = 0;
$labu3 = 0;
$lase3 = 0;
$meda3 = 0;
$mikr3 = 0;
$mtau3 = 0;
$mtkal3 = 0;
$onko3 = 0;
$oput3 = 0;
$rtge3 = 0;
$ultr3 = 0;
$vent3 = 0;
$vidk3 = 0;
$saknas3 = 0;

$andn3_19 = 0;
$anes3_19 = 0;
$barn3_19 = 0;
$defi3_19 = 0;
$desi3_19 = 0;
$dial3_19 = 0;
$diat3_19 = 0;
$endo3_19 = 0;
$ftv3_19 = 0;
$fysi3_19 = 0;
$gymn3_19 = 0;
$infu3_19 = 0;
$kard3_19 = 0;
$labu3_19 = 0;
$lase3_19 = 0;
$meda3_19 = 0;
$mikr3_19 = 0;
$mtau3_19 = 0;
$mtkal3_19 = 0;
$onko3_19 = 0;
$oput3_19 = 0;
$rtge3_19 = 0;
$ultr3_19 = 0;
$vent3_19 = 0;
$vidk3_19 = 0;
$saknas3_19 = 0;

while (odbc_fetch_row($rsFUm3))
  { 
  $FILTER=odbc_result($rsFUm3, "intfilter");  
  $TIDATGANG=odbc_result($rsFUm3, "Estimatedtime");
  $RISKTAL=odbc_result($rsFUm3, "intRisktal");  
  $INVGRUPP=odbc_result($rsFUm3, "grupp");
  $PLACERING=odbc_result($rsFUm3, "Place");
  
  $est3 = $est3 + $TIDATGANG;
  ++$im3;
    
  if ($INVGRUPP == "ANDN") {
  ++$andn3;
     if ($RISKTAL > 18) {
  ++$andn3_19;
  }
  } elseif ($INVGRUPP == "ANES") {
  ++$anes3;
     if ($RISKTAL > 18) {
  ++$anes3_19;
  }
  } elseif ($INVGRUPP == "BARN") {
  ++$barn3;
     if ($RISKTAL > 18) {
  ++$barn3_19;
  }
  } elseif ($INVGRUPP == "DEFI") {
  ++$defi3;
     if ($RISKTAL > 18) {
  ++$defi3_19;
  }
  } elseif ($INVGRUPP == "DESI") {
  ++$desi3;
     if ($RISKTAL > 18) {
  ++$desi3_19;
  }
  } elseif ($INVGRUPP == "DIAL") {
  ++$dial3;
     if ($RISKTAL > 18) {
  ++$dial3_19;
  }
  } elseif ($INVGRUPP == "DIAT") { 
  ++$diat3;
     if ($RISKTAL > 18) {
  ++$diat3_19;
  }
  } elseif ($INVGRUPP == "ENDO") {  
  ++$endo3;
     if ($RISKTAL > 18) {
  ++$endo3_19;
  }
  } elseif ($INVGRUPP == "FTV") {   
  ++$ftv3;
     if ($RISKTAL > 18) {
  ++$ftv3_19;
  }
  } elseif ($INVGRUPP == "FYSI") { 
  ++$fysi3;
     if ($RISKTAL > 18) {
  ++$fysi3_19;
  }
  } elseif ($INVGRUPP == "GYMN") {   
  ++$gymn3;
     if ($RISKTAL > 18) {
  ++$gymn3_19;
  }
  } elseif ($INVGRUPP == "INFU") { 
  ++$infu3;
     if ($RISKTAL > 18) {
  ++$infu3_19;
  }
  } elseif ($INVGRUPP == "KARD") {   
  ++$kard3;
     if ($RISKTAL > 18) {
  ++$kard3_19;
  }
  } elseif ($INVGRUPP == "LABU") {   
  ++$labu3;
     if ($RISKTAL > 18) {
  ++$labu3_19;
  }
  } elseif ($INVGRUPP == "LASE") {   
  ++$lase3;
     if ($RISKTAL > 18) {
  ++$lase3_19;
  }
  } elseif ($INVGRUPP == "MEDA") {   
  ++$meda3;
     if ($RISKTAL > 18) {
  ++$meda3_19;
  }
  } elseif ($INVGRUPP == "MIKR") {   
  ++$mikr3;
     if ($RISKTAL > 18) {
  ++$mikr3_19;
  }
  } elseif ($INVGRUPP == "MTAU") {   
  ++$mtau3;
     if ($RISKTAL > 18) {
  ++$mtau3_19;
  }
  } elseif ($INVGRUPP == "MTKAL") {   
  ++$mtkal3;
     if ($RISKTAL > 18) {
  ++$mtkal3_19;
  }
  } elseif ($INVGRUPP == "ONKO") {   
  ++$onko3;
     if ($RISKTAL > 18) {
  ++$onko3_19;
  }
  } elseif ($INVGRUPP == "OPUT") {   
  ++$oput3;
     if ($RISKTAL > 18) {
  ++$oput3_19;
  }
  } elseif ($INVGRUPP == "RTGE") {   
  ++$rtge3;
     if ($RISKTAL > 18) {
  ++$rtge3_19;
  }
  } elseif ($INVGRUPP == "ULTR") {   
  ++$ultr3;
     if ($RISKTAL > 18) {
  ++$ultr3_19;
  }
  } elseif ($INVGRUPP == "VENT") {   
  ++$vent3;
     if ($RISKTAL > 18) {
  ++$vent3_19;
  }
  } elseif ($INVGRUPP == "VIDK") {   
  ++$vidk3;
     if ($RISKTAL > 18) {
  ++$vidk3_19;
  }
  } else {   
  ++$saknas3;
     if ($RISKTAL > 18) {
  ++$saknas3_19;
  }
  }
 
  }

odbc_close($connFU);

// Month +4
$connFU=odbc_connect("dbname","username","password");

if (!$connFU)
  {exit("Connection Failed: ".$connFU);}

$rsFUm4=odbc_exec($connFU, $sqlFUm4);

$im4 = 0;
$est4 = 0;

$andn4 = 0;
$anes4 = 0;
$barn4 = 0;
$defi4 = 0;
$desi4 = 0;
$dial4 = 0;
$diat4 = 0;
$endo4 = 0;
$ftv4 = 0;
$fysi4 = 0;
$gymn4 = 0;
$infu4 = 0;
$kard4 = 0;
$labu4 = 0;
$lase4 = 0;
$meda4 = 0;
$mikr4 = 0;
$mtau4 = 0;
$mtkal4 = 0;
$onko4 = 0;
$oput4 = 0;
$rtge4 = 0;
$ultr4 = 0;
$vent4 = 0;
$vidk4 = 0;
$saknas4 = 0;

$andn4_19 = 0;
$anes4_19 = 0;
$barn4_19 = 0;
$defi4_19 = 0;
$desi4_19 = 0;
$dial4_19 = 0;
$diat4_19 = 0;
$endo4_19 = 0;
$ftv4_19 = 0;
$fysi4_19 = 0;
$gymn4_19 = 0;
$infu4_19 = 0;
$kard4_19 = 0;
$labu4_19 = 0;
$lase4_19 = 0;
$meda4_19 = 0;
$mikr4_19 = 0;
$mtau4_19 = 0;
$mtkal4_19 = 0;
$onko4_19 = 0;
$oput4_19 = 0;
$rtge4_19 = 0;
$ultr4_19 = 0;
$vent4_19 = 0;
$vidk4_19 = 0;
$saknas4_19 = 0;

while (odbc_fetch_row($rsFUm4))
  { 
  $FILTER=odbc_result($rsFUm4, "intfilter");  
  $TIDATGANG=odbc_result($rsFUm4, "Estimatedtime");
  $RISKTAL=odbc_result($rsFUm4, "intRisktal");  
  $INVGRUPP=odbc_result($rsFUm4, "grupp");
  $PLACERING=odbc_result($rsFUm4, "Place");
  
  $est4 = $est4 + $TIDATGANG;
  ++$im4;
    
  if ($INVGRUPP == "ANDN") {
  ++$andn4;
     if ($RISKTAL > 18) {
  ++$andn4_19;
  }
  } elseif ($INVGRUPP == "ANES") {
  ++$anes4;
     if ($RISKTAL > 18) {
  ++$anes4_19;
  }
  } elseif ($INVGRUPP == "BARN") {
  ++$barn4;
     if ($RISKTAL > 18) {
  ++$barn4_19;
  }
  } elseif ($INVGRUPP == "DEFI") {
  ++$defi4;
     if ($RISKTAL > 18) {
  ++$defi4_19;
  }
  } elseif ($INVGRUPP == "DESI") {
  ++$desi4;
     if ($RISKTAL > 18) {
  ++$desi4_19;
  }
  } elseif ($INVGRUPP == "DIAL") {
  ++$dial4;
     if ($RISKTAL > 18) {
  ++$dial4_19;
  }
  } elseif ($INVGRUPP == "DIAT") { 
  ++$diat4;
     if ($RISKTAL > 18) {
  ++$diat4_19;
  }
  } elseif ($INVGRUPP == "ENDO") {  
  ++$endo4;
     if ($RISKTAL > 18) {
  ++$endo4_19;
  }
  } elseif ($INVGRUPP == "FTV") {   
  ++$ftv4;
     if ($RISKTAL > 18) {
  ++$ftv4_19;
  }
  } elseif ($INVGRUPP == "FYSI") { 
  ++$fysi4;
     if ($RISKTAL > 18) {
  ++$fysi4_19;
  }
  } elseif ($INVGRUPP == "GYMN") {   
  ++$gymn4;
     if ($RISKTAL > 18) {
  ++$gymn4_19;
  }
  } elseif ($INVGRUPP == "INFU") { 
  ++$infu4;
     if ($RISKTAL > 18) {
  ++$infu4_19;
  }
  } elseif ($INVGRUPP == "KARD") {   
  ++$kard4;
     if ($RISKTAL > 18) {
  ++$kard4_19;
  }
  } elseif ($INVGRUPP == "LABU") {   
  ++$labu4;
     if ($RISKTAL > 18) {
  ++$labu4_19;
  }
  } elseif ($INVGRUPP == "LASE") {   
  ++$lase4;
     if ($RISKTAL > 18) {
  ++$lase4_19;
  }
  } elseif ($INVGRUPP == "MEDA") {   
  ++$meda4;
     if ($RISKTAL > 18) {
  ++$meda4_19;
  }
  } elseif ($INVGRUPP == "MIKR") {   
  ++$mikr4;
     if ($RISKTAL > 18) {
  ++$mikr4_19;
  }
  } elseif ($INVGRUPP == "MTAU") {   
  ++$mtau4;
     if ($RISKTAL > 18) {
  ++$mtau4_19;
  }
  } elseif ($INVGRUPP == "MTKAL") {   
  ++$mtkal4;
     if ($RISKTAL > 18) {
  ++$mtkal4_19;
  }
  } elseif ($INVGRUPP == "ONKO") {   
  ++$onko4;
     if ($RISKTAL > 18) {
  ++$onko4_19;
  }
  } elseif ($INVGRUPP == "OPUT") {   
  ++$oput4;
     if ($RISKTAL > 18) {
  ++$oput4_19;
  }
  } elseif ($INVGRUPP == "RTGE") {   
  ++$rtge4;
     if ($RISKTAL > 18) {
  ++$rtge4_19;
  }
  } elseif ($INVGRUPP == "ULTR") {   
  ++$ultr4;
     if ($RISKTAL > 18) {
  ++$ultr4_19;
  }
  } elseif ($INVGRUPP == "VENT") {   
  ++$vent4;
     if ($RISKTAL > 18) {
  ++$vent4_19;
  }
  } elseif ($INVGRUPP == "VIDK") {   
  ++$vidk4;
     if ($RISKTAL > 18) {
  ++$vidk4_19;
  }
  } else {   
  ++$saknas4;
     if ($RISKTAL > 18) {
  ++$saknas4_19;
  }
  }
 
  }

odbc_close($connFU);

// Month +5
$connFU=odbc_connect("dbname","username","password");

if (!$connFU)
  {exit("Connection Failed: ".$connFU);}

$rsFUm5=odbc_exec($connFU, $sqlFUm5);

$im5 = 0;
$est5 = 0;

$andn5 = 0;
$anes5 = 0;
$barn5 = 0;
$defi5 = 0;
$desi5 = 0;
$dial5 = 0;
$diat5 = 0;
$endo5 = 0;
$ftv5 = 0;
$fysi5 = 0;
$gymn5 = 0;
$infu5 = 0;
$kard5 = 0;
$labu5 = 0;
$lase5 = 0;
$meda5 = 0;
$mikr5 = 0;
$mtau5 = 0;
$mtkal5 = 0;
$onko5 = 0;
$oput5 = 0;
$rtge5 = 0;
$ultr5 = 0;
$vent5 = 0;
$vidk5 = 0;
$saknas5 = 0;

$andn5_19 = 0;
$anes5_19 = 0;
$barn5_19 = 0;
$defi5_19 = 0;
$desi5_19 = 0;
$dial5_19 = 0;
$diat5_19 = 0;
$endo5_19 = 0;
$ftv5_19 = 0;
$fysi5_19 = 0;
$gymn5_19 = 0;
$infu5_19 = 0;
$kard5_19 = 0;
$labu5_19 = 0;
$lase5_19 = 0;
$meda5_19 = 0;
$mikr5_19 = 0;
$mtau5_19 = 0;
$mtkal5_19 = 0;
$onko5_19 = 0;
$oput5_19 = 0;
$rtge5_19 = 0;
$ultr5_19 = 0;
$vent5_19 = 0;
$vidk5_19 = 0;
$saknas5_19 = 0;

while (odbc_fetch_row($rsFUm5))
  { 
  $FILTER=odbc_result($rsFUm5, "intfilter");  
  $TIDATGANG=odbc_result($rsFUm5, "Estimatedtime");
  $RISKTAL=odbc_result($rsFUm5, "intRisktal");  
  $INVGRUPP=odbc_result($rsFUm5, "grupp");
  $PLACERING=odbc_result($rsFUm5, "Place");
  
  $est5 = $est5 + $TIDATGANG;
  ++$im5;
    
  if ($INVGRUPP == "ANDN") {
  ++$andn5;
     if ($RISKTAL > 18) {
  ++$andn5_19;
  }
  } elseif ($INVGRUPP == "ANES") {
  ++$anes5;
     if ($RISKTAL > 18) {
  ++$anes5_19;
  }
  } elseif ($INVGRUPP == "BARN") {
  ++$barn5;
     if ($RISKTAL > 18) {
  ++$barn5_19;
  }
  } elseif ($INVGRUPP == "DEFI") {
  ++$defi5;
     if ($RISKTAL > 18) {
  ++$defi5_19;
  }
  } elseif ($INVGRUPP == "DESI") {
  ++$desi5;
     if ($RISKTAL > 18) {
  ++$desi5_19;
  }
  } elseif ($INVGRUPP == "DIAL") {
  ++$dial5;
     if ($RISKTAL > 18) {
  ++$dial5_19;
  }
  } elseif ($INVGRUPP == "DIAT") { 
  ++$diat5;
     if ($RISKTAL > 18) {
  ++$diat5_19;
  }
  } elseif ($INVGRUPP == "ENDO") {  
  ++$endo5;
     if ($RISKTAL > 18) {
  ++$endo5_19;
  }
  } elseif ($INVGRUPP == "FTV") {   
  ++$ftv5;
     if ($RISKTAL > 18) {
  ++$ftv5_19;
  }
  } elseif ($INVGRUPP == "FYSI") { 
  ++$fysi5;
     if ($RISKTAL > 18) {
  ++$fysi5_19;
  }
  } elseif ($INVGRUPP == "GYMN") {   
  ++$gymn5;
     if ($RISKTAL > 18) {
  ++$gymn5_19;
  }
  } elseif ($INVGRUPP == "INFU") { 
  ++$infu5;
     if ($RISKTAL > 18) {
  ++$infu5_19;
  }
  } elseif ($INVGRUPP == "KARD") {   
  ++$kard5;
     if ($RISKTAL > 18) {
  ++$kard5_19;
  }
  } elseif ($INVGRUPP == "LABU") {   
  ++$labu5;
     if ($RISKTAL > 18) {
  ++$labu5_19;
  }
  } elseif ($INVGRUPP == "LASE") {   
  ++$lase5;
     if ($RISKTAL > 18) {
  ++$lase5_19;
  }
  } elseif ($INVGRUPP == "MEDA") {   
  ++$meda5;
     if ($RISKTAL > 18) {
  ++$meda5_19;
  }
  } elseif ($INVGRUPP == "MIKR") {   
  ++$mikr5;
     if ($RISKTAL > 18) {
  ++$mikr5_19;
  }
  } elseif ($INVGRUPP == "MTAU") {   
  ++$mtau5;
     if ($RISKTAL > 18) {
  ++$mtau5_19;
  }
  } elseif ($INVGRUPP == "MTKAL") {   
  ++$mtkal5;
     if ($RISKTAL > 18) {
  ++$mtkal5_19;
  }
  } elseif ($INVGRUPP == "ONKO") {   
  ++$onko5;
     if ($RISKTAL > 18) {
  ++$onko5_19;
  }
  } elseif ($INVGRUPP == "OPUT") {   
  ++$oput5;
     if ($RISKTAL > 18) {
  ++$oput5_19;
  }
  } elseif ($INVGRUPP == "RTGE") {   
  ++$rtge5;
     if ($RISKTAL > 18) {
  ++$rtge5_19;
  }
  } elseif ($INVGRUPP == "ULTR") {   
  ++$ultr5;
     if ($RISKTAL > 18) {
  ++$ultr5_19;
  }
  } elseif ($INVGRUPP == "VENT") {   
  ++$vent5;
     if ($RISKTAL > 18) {
  ++$vent5_19;
  }
  } elseif ($INVGRUPP == "VIDK") {   
  ++$vidk5;
     if ($RISKTAL > 18) {
  ++$vidk5_19;
  }
  } else {   
  ++$saknas5;
     if ($RISKTAL > 18) {
  ++$saknas5_19;
  }
  }
 
  }

odbc_close($connFU);

// Month +6
$connFU=odbc_connect("dbname","username","password");

if (!$connFU)
  {exit("Connection Failed: ".$connFU);}

$rsFUm6=odbc_exec($connFU, $sqlFUm6);

$im6 = 0;
$est6 = 0;

$andn6 = 0;
$anes6 = 0;
$barn6 = 0;
$defi6 = 0;
$desi6 = 0;
$dial6 = 0;
$diat6 = 0;
$endo6 = 0;
$ftv6 = 0;
$fysi6 = 0;
$gymn6 = 0;
$infu6 = 0;
$kard6 = 0;
$labu6 = 0;
$lase6 = 0;
$meda6 = 0;
$mikr6 = 0;
$mtau6 = 0;
$mtkal6 = 0;
$onko6 = 0;
$oput6 = 0;
$rtge6 = 0;
$ultr6 = 0;
$vent6 = 0;
$vidk6 = 0;
$saknas6 = 0;

$andn6_19 = 0;
$anes6_19 = 0;
$barn6_19 = 0;
$defi6_19 = 0;
$desi_19 = 0;
$dial6_19 = 0;
$diat6_19 = 0;
$endo6_19 = 0;
$ftv6_19 = 0;
$fysi6_19 = 0;
$gymn6_19 = 0;
$infu6_19 = 0;
$kard6_19 = 0;
$labu6_19 = 0;
$lase6_19 = 0;
$meda6_19 = 0;
$mikr6_19 = 0;
$mtau6_19 = 0;
$mtkal6_19 = 0;
$onko6_19 = 0;
$oput6_19 = 0;
$rtge6_19 = 0;
$ultr6_19 = 0;
$vent6_19 = 0;
$vidk6_19 = 0;
$saknas6_19 = 0;

while (odbc_fetch_row($rsFUm6))
  { 
  $FILTER=odbc_result($rsFUm6, "intfilter");  
  $TIDATGANG=odbc_result($rsFUm6, "Estimatedtime");
  $RISKTAL=odbc_result($rsFUm6, "intRisktal");  
  $INVGRUPP=odbc_result($rsFUm6, "grupp");
  $PLACERING=odbc_result($rsFUm6, "Place");
 
  $est6 = $est6 + $TIDATGANG;
  ++$im6;
    
  if ($INVGRUPP == "ANDN") {
  ++$andn6;
     if ($RISKTAL > 18) {
  ++$andn6_19;
  }
  } elseif ($INVGRUPP == "ANES") {
  ++$anes6;
     if ($RISKTAL > 18) {
  ++$anes6_19;
  }
  } elseif ($INVGRUPP == "BARN") {
  ++$barn6;
     if ($RISKTAL > 18) {
  ++$barn6_19;
  }
  } elseif ($INVGRUPP == "DEFI") {
  ++$defi6;
     if ($RISKTAL > 18) {
  ++$defi6_19;
  }
  } elseif ($INVGRUPP == "DESI") {
  ++$desi6;
     if ($RISKTAL > 18) {
  ++$desi6_19;
  }
  } elseif ($INVGRUPP == "DIAL") {
  ++$dial6;
     if ($RISKTAL > 18) {
  ++$dial6_19;
  }
  } elseif ($INVGRUPP == "DIAT") { 
  ++$diat6;
     if ($RISKTAL > 18) {
  ++$diat6_19;
  }
  } elseif ($INVGRUPP == "ENDO") {  
  ++$endo6;
     if ($RISKTAL > 18) {
  ++$endo6_19;
  }
  } elseif ($INVGRUPP == "FTV") {   
  ++$ftv6;
     if ($RISKTAL > 18) {
  ++$ftv6_19;
  }
  } elseif ($INVGRUPP == "FYSI") { 
  ++$fysi6;
     if ($RISKTAL > 18) {
  ++$fysi6_19;
  }
  } elseif ($INVGRUPP == "GYMN") {   
  ++$gymn6;
     if ($RISKTAL > 18) {
  ++$gymn6_19;
  }
  } elseif ($INVGRUPP == "INFU") { 
  ++$infu6;
     if ($RISKTAL > 18) {
  ++$infu6_19;
  }
  } elseif ($INVGRUPP == "KARD") {   
  ++$kard6;
     if ($RISKTAL > 18) {
  ++$kard6_19;
  }
  } elseif ($INVGRUPP == "LABU") {   
  ++$labu6;
     if ($RISKTAL > 18) {
  ++$labu6_19;
  }
  } elseif ($INVGRUPP == "LASE") {   
  ++$lase6;
     if ($RISKTAL > 18) {
  ++$lase6_19;
  }
  } elseif ($INVGRUPP == "MEDA") {   
  ++$meda6;
     if ($RISKTAL > 18) {
  ++$meda6_19;
  }
  } elseif ($INVGRUPP == "MIKR") {   
  ++$mikr6;
     if ($RISKTAL > 18) {
  ++$mikr6_19;
  }
  } elseif ($INVGRUPP == "MTAU") {   
  ++$mtau6;
     if ($RISKTAL > 18) {
  ++$mtau6_19;
  }
  } elseif ($INVGRUPP == "MTKAL") {   
  ++$mtkal6;
     if ($RISKTAL > 18) {
  ++$mtkal6_19;
  }
  } elseif ($INVGRUPP == "ONKO") {   
  ++$onko6;
     if ($RISKTAL > 18) {
  ++$onko6_19;
  }
  } elseif ($INVGRUPP == "OPUT") {   
  ++$oput6;
     if ($RISKTAL > 18) {
  ++$oput6_19;
  }
  } elseif ($INVGRUPP == "RTGE") {   
  ++$rtge6;
     if ($RISKTAL > 18) {
  ++$rtge6_19;
  }
  } elseif ($INVGRUPP == "ULTR") {   
  ++$ultr6;
     if ($RISKTAL > 18) {
  ++$ultr6_19;
  }
  } elseif ($INVGRUPP == "VENT") {   
  ++$vent6;
     if ($RISKTAL > 18) {
  ++$vent6_19;
  }
  } elseif ($INVGRUPP == "VIDK") {   
  ++$vidk6;
     if ($RISKTAL > 18) {
  ++$vidk6_19;
  }
  } else {   
  ++$saknas6;
     if ($RISKTAL > 18) {
  ++$saknas6_19;
  }
  }
 
  }

odbc_close($connFU); 

$est1 = round($est1);
$est2 = round($est2);
$est3 = round($est3);
$est4 = round($est4);
$est5 = round($est5);
$est6 = round($est6);

echo "<center><br><b><font size='5'>Sammanställning per inventariegrupp (totalt och risktal 19-30)</font></b><br><p>";

echo "<center><br><b><font size='5'>Fördelning antal FU:n som eftersläpar till dags datum ".$todayDATE."</font></b><br>";
echo "<br>";
echo "<div class='chart-container' style='position: relative; height:250px; width:1000px;'>";
echo "<canvas id='myChartrest'></canvas>";
echo "</div>";

echo "<br><p><br><p><br><p><br><p><br><p><br><p><br>";
echo "<center><br><b><font size='5'>Fördelning arbetstimmar FU:n som eftersläpar till dags datum ".$todayDATE."</font></b><br>";
echo "<br>";
echo "<div class='chart-container' style='position: relative; height:250px; width:1000px;'>";
echo "<canvas id='myChartrest_h'></canvas>";
echo "</div>";

echo "<br><p><br><p><br><p><br><p><br><p><br><p><br>";
echo "<br><hr size='5' color='blue'><br>";
echo "<center>";
echo "<table width=100% CELLPADDING='2' CELLSPACING='1'>";
echo "<tr BGCOLOR='#CCCCCC'>";
echo "<td colspan='6'><center><h1><b>Antal nya kvarvarande FU:n/månad perioden $premonth1TextK - $premonth6TextK</b></h1></center>";
echo "</tr>";
echo "<tr BGCOLOR='#CCCCCC'>";
echo "<td colspan='6'>"; 

echo "</td>";
echo "</tr>";
echo "<tr BGCOLOR='#CCCCCC'>";
echo "<td colspan='6'><center><b><font size='5'>Sammanställning, beräknat antal och arbetstimmar</font></b><br><p>";
echo "</tr>";
echo "<tr BGCOLOR='#CCCCCC' Align='middle'>";
echo "<td>";
echo "<table width=80% CELLPADDING='2' CELLSPACING='0'>";
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
echo "</table>";
echo "</td>"; 
echo "<td><div class='chart-container' style='position: relative; height:250px; width:500px;'><canvas id='myChart'></canvas></div></td>";
echo "</tr>";
echo "</table>";
echo "</center>";

echo "<center><hr><br><b><font size='5'>$premonth1TextK</font></b><br>";
echo "<br>";
echo "<div class='chart-container' style='position: relative; height:250px; width:1000px;'>";
echo "<canvas id='myChartpre1'></canvas>";
echo "</div>";

echo "<br><p><br><p><br><p><br><p><br><p><br><p><br>";
echo "<center><hr><br><b><font size='5'>$premonth2TextK</font></b><br>";
echo "<div class='chart-container' style='position: relative; height:250px; width:1000px;'>";
echo "<canvas id='myChartpre2'></canvas>";
echo "</div>";

echo "<br><p><br><p><br><p><br><p><br><p><br><p><br>";
echo "<center><hr><br><b><font size='5'>$premonth3TextK</font></b><br>";
echo "<div class='chart-container' style='position: relative; height:250px; width:1000px;'>";
echo "<canvas id='myChartpre3'></canvas>";
echo "</div>";

echo "<br><p><br><p><br><p><br><p><br><p><br><p><br>";
echo "<center><hr><br><b><font size='5'>$premonth4TextK</font></b><br>";
echo "<div class='chart-container' style='position: relative; height:250px; width:1000px;'>";
echo "<canvas id='myChartpre4'></canvas>";
echo "</div>";

echo "<br><p><br><p><br><p><br><p><br><p><br><p><br>";
echo "<center><hr><br><b><font size='5'>$premonth5TextK</font></b><br>";
echo "<div class='chart-container' style='position: relative; height:250px; width:1000px;'>";
echo "<canvas id='myChartpre5'></canvas>";
echo "</div>";

echo "<br><p><br><p><br><p><br><p><br><p><br><p><br>";
echo "<center><hr><br><b><font size='5'>$premonth6TextK</font></b><br>";
echo "<div class='chart-container' style='position: relative; height:250px; width:1000px;'>";
echo "<canvas id='myChartpre6'></canvas>";
echo "</div>";

?>

<script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
<?php
        echo "labels: ['$premonth1Text', '$premonth2Text', '$premonth3Text', '$premonth4Text', '$premonth5Text', '$premonth6Text'],";
        echo "datasets: [{";
        echo "label: 'Antal FU:n',";
        echo "data: [$im1, $im2, $im3, $im4, $im5, $im6],";
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

<script>
var ctx = document.getElementById("myChartrest");
var myChartpre1 = new Chart(ctx, {
    type: 'bar',
    data: {
<?php
        echo "labels: ['ANDN', 'ANES', 'BARN', 'DEFI', 'DESI', 'DIAL', 'DIAT', 'ENDO', 'FTV', 'FYSI', 'GYMN', 'INFU', 'KARD', 'LABU', 'LASE', 'MEDA', 'MIKR', 'MTAU', 'MTKAL', 'ONKO', 'OPUT', 'RTGE', 'ULTR', 'VENT', 'VIDK', 'SAKNAS'],";
        echo "datasets: [{";
        echo "label: 'Totalt antal FU:n per inventariegrupp',";
        echo "data: [$andn_0, $anes_0, $barn_0, $defi_0, $desi_0, $dial_0, $diat_0, $endo_0, $ftv_0, $fysi_0, $gymn_0, $infu_0, $kard_0, $labu_0, $lase_0, $meda_0, $mikr_0, $mtau_0, $mtkal_0, $onko_0, $oput_0, $rtge_0, $ultr_0, $vent_0, $vidk_0, $saknas_0],";
        
?>
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
                ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1,
        },
            {
<?php     
        echo "label: 'Antal med risktal 19-30',";
        echo "data: [$andn_0_19, $anes_0_19, $barn_0_19, $defi_0_19, $desi_0_19, $dial_0_19, $diat_0_19, $endo_0_19, $ftv_0_19, $fysi_0_19, $gymn_0_19, $infu_0_19, $kard_0_19, $labu_0_19, $lase_0_19, $meda_0_19, $mikr_0_19, $mtau_0_19, $mtkal_0_19, $onko_0_19, $oput_0_19, $rtge_0_19, $ultr_0_19, $vent_0_19, $vidk_0_19, $saknas_0_19],";
        
?>
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)'
                ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)'
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

<script>
var ctx = document.getElementById("myChartrest_h");
var myChartpre1 = new Chart(ctx, {
    type: 'bar',
    data: {
<?php
        echo "labels: ['ANDN', 'ANES', 'BARN', 'DEFI', 'DESI', 'DIAL', 'DIAT', 'ENDO', 'FTV', 'FYSI', 'GYMN', 'INFU', 'KARD', 'LABU', 'LASE', 'MEDA', 'MIKR', 'MTAU', 'MTKAL', 'ONKO', 'OPUT', 'RTGE', 'ULTR', 'VENT', 'VIDK', 'SAKNAS'],";
        echo "datasets: [{";
        echo "label: 'Totalt antal arbetstimmar per inventariegrupp',";
        echo "data: [$andn_0h, $anes_0h, $barn_0h, $defi_0h, $desi_0h, $dial_0h, $diat_0h, $endo_0h, $ftv_0h, $fysi_0h, $gymn_0h, $infu_0h, $kard_0h, $labu_0h, $lase_0h, $meda_0h, $mikr_0h, $mtau_0h, $mtkal_0h, $onko_0h, $oput_0h, $rtge_0h, $ultr_0h, $vent_0h, $vidk_0h, $saknas_0h],";
        
?>
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
                ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1,
        },
        {
<?php     
        echo "label: 'Fördelning arbetstimmar per inventariegrupp med risktal 19-30',";
        echo "data: [$andn_0_19h, $anes_0_19h, $barn_0_19h, $defi_0_19h, $desi_0_19h, $dial_0_19h, $diat_0_19h, $endo_0_19h, $ftv_0_19h, $fysi_0_19h, $gymn_0_19h, $infu_0_19h, $kard_0_19h, $labu_0_19h, $lase_0_19h, $meda_0_19h, $mikr_0_19h, $mtau_0_19h, $mtkal_0_19h, $onko_0_19h, $oput_0_19h, $rtge_0_19h, $ultr_0_19h, $vent_0_19h, $vidk_0_19h, $saknas_0_19h],";
        
?>
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)'
                ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)'
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

<script>
var ctx = document.getElementById("myChartpre1");
var myChartpre1 = new Chart(ctx, {
    type: 'bar',
    data: {
<?php
        echo "labels: ['ANDN', 'ANES', 'BARN', 'DEFI', 'DESI', 'DIAL', 'DIAT', 'ENDO', 'FTV', 'FYSI', 'GYMN', 'INFU', 'KARD', 'LABU', 'LASE', 'MEDA', 'MIKR', 'MTAU', 'MTKAL', 'ONKO', 'OPUT', 'RTGE', 'ULTR', 'VENT', 'VIDK', 'SAKNAS'],";
        echo "datasets: [{";
        echo "label: '$premonth1Text: Totalt antal FU:n per inventariegrupp',";
        echo "data: [$andn, $anes, $barn, $defi, $desi, $dial, $diat, $endo, $ftv, $fysi, $gymn, $infu, $kard, $labu, $lase, $meda, $mikr, $mtau, $mtkal, $onko, $oput, $rtge, $ultr, $vent, $vidk, $saknas],";
        
?>
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
                ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1,
        },
            {
<?php     
        echo "label: '$premonth1Text: Antal med risktal 19-30',";
        echo "data: [$andn_19, $anes_19, $barn_19, $defi_19, $desi_19, $dial_19, $diat_19, $endo_19, $ftv_19, $fysi_19, $gymn_19, $infu_19, $kard_19, $labu_19, $lase_19, $meda_19, $mikr_19, $mtau_19, $mtkal_19, $onko_19, $oput_19, $rtge_19, $ultr_19, $vent_19, $vidk_19, $saknas_19],";
        
?>
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)'
                ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)'
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

<script>
var ctx = document.getElementById("myChartpre2");
var myChartpre2 = new Chart(ctx, {
    type: 'bar',
    data: {
<?php
        echo "labels: ['ANDN', 'ANES', 'BARN', 'DEFI', 'DESI', 'DIAL', 'DIAT', 'ENDO', 'FTV', 'FYSI', 'GYMN', 'INFU', 'KARD', 'LABU', 'LASE', 'MEDA', 'MIKR', 'MTAU', 'MTKAL', 'ONKO', 'OPUT', 'RTGE', 'ULTR', 'VENT', 'VIDK', 'SAKNAS'],";
        echo "datasets: [{";
        echo "label: '$premonth2Text: Antal FU:n per inventariegrupp',";
        echo "data: [$andn2, $anes2, $barn2, $defi2, $desi2, $dial2, $diat2, $endo2, $ftv2, $fysi2, $gymn2, $infu2, $kard2, $labu2, $lase2, $meda2, $mikr2, $mtau2, $mtkal2, $onko2, $oput2, $rtge2, $ultr2, $vent2, $vidk2, $saknas2],";
        
?>
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
                ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1,
        },
                    {
<?php     
        echo "label: '$premonth2Text: Antal med risktal 19-30',";
        echo "data: [$andn2_19, $anes2_19, $barn2_19, $defi2_19, $desi2_19, $dial2_19, $diat2_19, $endo2_19, $ftv2_19, $fysi2_19, $gymn2_19, $infu2_19, $kard2_19, $labu2_19, $lase2_19, $meda2_19, $mikr2_19, $mtau2_19, $mtkal2_19, $onko2_19, $oput2_19, $rtge2_19, $ultr2_19, $vent2_19, $vidk2_19, $saknas2_19],";
        
?>
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)'
                ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)'
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

<script>
var ctx = document.getElementById("myChartpre3");
var myChartpre3 = new Chart(ctx, {
    type: 'bar',
    data: {
<?php
        echo "labels: ['ANDN', 'ANES', 'BARN', 'DEFI', 'DESI', 'DIAL', 'DIAT', 'ENDO', 'FTV', 'FYSI', 'GYMN', 'INFU', 'KARD', 'LABU', 'LASE', 'MEDA', 'MIKR', 'MTAU', 'MTKAL', 'ONKO', 'OPUT', 'RTGE', 'ULTR', 'VENT', 'VIDK', 'SAKNAS'],";
        echo "datasets: [{";
        echo "label: '$premonth3Text: Antal FU:n per inventariegrupp',";
        echo "data: [$andn3, $anes3, $barn3, $defi3, $desi3, $dial3, $diat3, $endo3, $ftv3, $fysi3, $gymn3, $infu3, $kard3, $labu3, $lase3, $meda3, $mikr3, $mtau3, $mtkal3, $onko3, $oput3, $rtge3, $ultr3, $vent3, $vidk3, $saknas3],";
        
?>
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
                ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1,
        },
                    {
<?php     
        echo "label: '$premonth3Text: Antal med risktal 19-30',";
        echo "data: [$andn3_19, $anes3_19, $barn3_19, $defi3_19, $desi3_19, $dial3_19, $diat3_19, $endo3_19, $ftv3_19, $fysi3_19, $gymn3_19, $infu3_19, $kard3_19, $labu3_19, $lase3_19, $meda3_19, $mikr3_19, $mtau3_19, $mtkal3_19, $onko3_19, $oput3_19, $rtge3_19, $ultr3_19, $vent3_19, $vidk3_19, $saknas3_19],";
        
?>
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)'
                ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)'
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

<script>
var ctx = document.getElementById("myChartpre4");
var myChartpre4 = new Chart(ctx, {
    type: 'bar',
    data: {
<?php
        echo "labels: ['ANDN', 'ANES', 'BARN', 'DEFI', 'DESI', 'DIAL', 'DIAT', 'ENDO', 'FTV', 'FYSI', 'GYMN', 'INFU', 'KARD', 'LABU', 'LASE', 'MEDA', 'MIKR', 'MTAU', 'MTKAL', 'ONKO', 'OPUT', 'RTGE', 'ULTR', 'VENT', 'VIDK', 'SAKNAS'],";
        echo "datasets: [{";
        echo "label: '$premonth4Text: Antal FU:n per inventariegrupp',";
        echo "data: [$andn4, $anes4, $barn4, $defi4, $desi4, $dial4, $diat4, $endo4, $ftv4, $fysi4, $gymn4, $infu4, $kard4, $labu4, $lase4, $meda4, $mikr4, $mtau4, $mtkal4, $onko4, $oput4, $rtge4, $ultr4, $vent4, $vidk4, $saknas4],";
        
?>
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
                ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1,
        },
                            {
<?php     
        echo "label: '$premonth4Text: Antal med risktal 19-30',";
        echo "data: [$andn4_19, $anes4_19, $barn4_19, $defi4_19, $desi4_19, $dial4_19, $diat4_19, $endo4_19, $ftv4_19, $fysi4_19, $gymn4_19, $infu4_19, $kard4_19, $labu4_19, $lase4_19, $meda4_19, $mikr4_19, $mtau4_19, $mtkal4_19, $onko4_19, $oput4_19, $rtge4_19, $ultr4_19, $vent4_19, $vidk4_19, $saknas4_19],";
        
?>
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)'
                ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)'
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

<script>
var ctx = document.getElementById("myChartpre5");
var myChartpre5 = new Chart(ctx, {
    type: 'bar',
    data: {
<?php
        echo "labels: ['ANDN', 'ANES', 'BARN', 'DEFI', 'DESI', 'DIAL', 'DIAT', 'ENDO', 'FTV', 'FYSI', 'GYMN', 'INFU', 'KARD', 'LABU', 'LASE', 'MEDA', 'MIKR', 'MTAU', 'MTKAL', 'ONKO', 'OPUT', 'RTGE', 'ULTR', 'VENT', 'VIDK', 'SAKNAS'],";
        echo "datasets: [{";
        echo "label: '$premonth5Text: Antal FU:n per inventariegrupp',";
        echo "data: [$andn5, $anes5, $barn5, $defi5, $desi5, $dial5, $diat5, $endo5, $ftv5, $fysi5, $gymn5, $infu5, $kard5, $labu5, $lase5, $meda5, $mikr5, $mtau5, $mtkal5, $onko5, $oput5, $rtge5, $ultr5, $vent5, $vidk5, $saknas5],";
        
?>
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
                ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1,
        },
                            {
<?php     
        echo "label: '$premonth5Text: Antal med risktal 19-30',";
        echo "data: [$andn5_19, $anes5_19, $barn5_19, $defi5_19, $desi5_19, $dial5_19, $diat5_19, $endo5_19, $ftv5_19, $fysi5_19, $gymn5_19, $infu5_19, $kard5_19, $labu5_19, $lase5_19, $meda5_19, $mikr5_19, $mtau5_19, $mtkal5_19, $onko5_19, $oput5_19, $rtge5_19, $ultr5_19, $vent5_19, $vidk5_19, $saknas5_19],";
        
?>
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)'
                ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)'
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

<script>
var ctx = document.getElementById("myChartpre6");
var myChartpre6 = new Chart(ctx, {
    type: 'bar',
    data: {
<?php
        echo "labels: ['ANDN', 'ANES', 'BARN', 'DEFI', 'DESI', 'DIAL', 'DIAT', 'ENDO', 'FTV', 'FYSI', 'GYMN', 'INFU', 'KARD', 'LABU', 'LASE', 'MEDA', 'MIKR', 'MTAU', 'MTKAL', 'ONKO', 'OPUT', 'RTGE', 'ULTR', 'VENT', 'VIDK', 'SAKNAS'],";
        echo "datasets: [{";
        echo "label: '$premonth6Text: Antal FU:n per inventariegrupp',";
        echo "data: [$andn6, $anes6, $barn6, $defi6, $desi6, $dial6, $diat6, $endo6, $ftv6, $fysi6, $gymn6, $infu6, $kard6, $labu6, $lase6, $meda6, $mikr6, $mtau6, $mtkal6, $onko6, $oput6, $rtge6, $ultr6, $vent6, $vidk6, $saknas6],";
        
?>
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
                ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1,
        },
                            {
<?php     
        echo "label: '$premonth6Text: Antal med risktal 19-30',";
        echo "data: [$andn6_19, $anes6_19, $barn6_19, $defi6_19, $desi6_19, $dial6_19, $diat6_19, $endo6_19, $ftv6_19, $fysi6_19, $gymn6_19, $infu6_19, $kard6_19, $labu6_19, $lase6_19, $meda6_19, $mikr6_19, $mtau6_19, $mtkal6_19, $onko6_19, $oput6_19, $rtge6_19, $ultr6_19, $vent6_19, $vidk6_19, $saknas6_19],";
        
?>
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)'
                ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)'
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
