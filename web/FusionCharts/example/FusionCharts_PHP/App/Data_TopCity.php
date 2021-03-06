﻿<?php
include("Includes/Connection_inc.php");
include("Includes/Functions.php");
include("DataGen.php");

//This method writes the top n cities and its sales quantity for a given year.
//To this page, we're provided year and count
$intYear = $_GET['year'];
$count = $_GET['count'];
//XML Data container
//If number of items to show on chart is less than 10, we stagger them
//else we show as rotated
if ($count>10)
	$labelFormatting ="labelDisplay='ROTATE' slantLabels='1'";
else
	$labelFormatting ="labelDisplay='STAGGER'";
	
$strXML  = "<chart caption='" . $intYear . " - Top " . $count . " Cities By Sales' palette='" . getPalette() ."' animation='" . getAnimationState() . "' formatNumberScale='0' numberPrefix='$' seriesNameInToolTip='0' sNumberSuffix='pcs.' showValues='0' plotSpacePercent='10'  " . $labelFormatting . ">";
$strXML .= getSalesByCityXML($intYear,$count,true);
//Add some styles to increase caption font size
$strXML .= "<styles><definition><style type='font' name='CaptionFont' size='15' color='" . getCaptionFontColor() . "' /><style type='font' name='SubCaptionFont' bold='0' /></definition><application><apply toObject='caption' styles='CaptionFont' /><apply toObject='SubCaption' styles='SubCaptionFont' /></application></styles>";
$strXML .= "</chart>";

//Output it
header('Content-type: text/xml');
echo $strXML;
?>