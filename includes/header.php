<?PHP 
include ("header_start.php");

echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">\n";
?>
<HTML>
<HEAD>
<?PHP

// SVN versions auswertung
exec("svnversion", $VersionArray);
if( strlen($VersionArray[0]))
	$Version = "(r ". $VersionArray[0]. ")";

echo "<TITLE>--- $title  $Version ---</TITLE>";
?>
<meta name="keywords" content="Engel, Himmelsverwaltung">
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="expires" content="0">
<meta name="robots" content="index">
<meta name="revisit-after" content="1 days">
<meta http-equiv="content-language" content="de">
<script type="text/javascript" src="<?PHP echo $url. substr( $ENGEL_ROOT, 1); ?>/css/grossbild.js"></script>
<link rel=stylesheet type="text/css" href="<?PHP echo $url. substr( $ENGEL_ROOT, 1); ?>css/style<?PHP
	if (!IsSet($_SESSION['color'])) 
		echo "1"; 
	else 
		echo $_SESSION['color'];
	?>.css">
<?PHP
if (isset($reload)) {
 if ($reload=="") $reload=3330;
 echo "\n<meta http-equiv=\"refresh\" content=\"".$reload.
      "; URL=./?reload=".$reload."\">\n";
 }

if (isset($Page["AutoReload"])) {
 echo "\n<meta http-equiv=\"refresh\" content=\"". $Page["AutoReload"].
      "; URL=". substr($url, 0, strlen($url)-1). $ENGEL_ROOT. $Page["Name"]."\">\n";
 }
?>
</HEAD>
<BODY>
<?PHP

if( isset($SystemDisableMessage))
	if( strlen($SystemDisableMessage)>0)
	{
		echo $SystemDisableMessage;
		echo "\n\n<BODY>\n</HTML>";
		die();
	}


if( !isset($Page["ShowTabel"]) ) $Page["ShowTabel"]="Y";
if( $Page["ShowTabel"]=="Y" )
{
//############################### ShowTable Start ##############################

?>
	<div align="center">
	<a name="#top"><img src="<?PHP echo $url. substr( $ENGEL_ROOT, 1); ?>pic/himmel<?PHP if( isset($_SESSION['color'])) 
						if ($_SESSION['color']==6) echo "_w"; ?>.png" alt="Unser Himmel"></a>
	<p>
<?PHP
//ausgabe new message
if( isset($_SESSION['CVS']["nonpublic/messages.php"]))
    if( $_SESSION['CVS']["nonpublic/messages.php"] == "Y")
    {
	$SQL = "SELECT `Datum` FROM `Messages` WHERE `RUID`=". $_SESSION["UID"]. " AND `isRead`='N'";
	$erg = mysql_query($SQL, $con);
	if( mysql_num_rows( $erg ) > 0 )
		echo "<br><a href=\"". $url. substr($ENGEL_ROOT, 1).
			"nonpublic/messages.php\">". Get_Text("pub_messages_new1").
			" ".  mysql_num_rows( $erg ). " ".
			Get_Text("pub_messages_new2"). "</a><br><br>";
    }
?>
<table width="95%" align="center" border="0" cellpadding="7" cellspacing="0">
	<tr>
<?PHP
//ausgaeb Menu
if( !isset($_SESSION['Menu']))		$_SESSION['Menu'] = "L";
if( $_SESSION['Menu'] =="L")		include("menu.php");
?>

		<td valign="top" align="center">
<table border="0" width="100%" align="center" class="border" cellpadding="5" cellspacing="1">
	<tr class="contenttopic">
		<td>
<?PHP
		echo "\t<a name=\"#$header\" class=\"contenttopic\">";
		if( strlen( $header) == 0 )
			echo "\n\t<b>". Get_Text($Page["Name"]). "</b></a>\n";
		else
			echo "\n\t<b>$header</b></a>\n";

?>
		</td>
	</tr>
	<tr class="content">
	 	<td>
<br>
<?php 
echo "\n\n\n";
 
if (IsSet($_SESSION['UID'])) {
	if( isset($_SESSION['oldurl']))
		$BACKUP_SESSION_OLDURL = $_SESSION['oldurl'];
	if( isset($_SESSION['newurl']))
		$_SESSION['oldurl'] = $_SESSION['newurl'];
	$_SESSION['newurl'] = $_SERVER["REQUEST_URI"];
} 


//############################### ShowTable Start ##############################
}	/* if (ShowTabel....*/


function SetHeaderGo2Back ()
{
	global $BACKUP_SESSION_OLDURL;
	$_SESSION['oldurl'] = $BACKUP_SESSION_OLDURL;
}


if ( $Page["CVS"] != "Y" ) 
{
        echo "Du besitzt kein Rechte f�r diesen Bereich.<br>\n";
        If (IsSet($_SESSION['oldurl'])) 
		echo "<a href=\"". $_SESSION["oldurl"]. "\">".Get_Text("back")."</a> geht's zur&uuml;ck...\n";
	else
		echo "<a href=\"". $url. substr($ENGEL_ROOT, 0, -1 )."\">".Get_Text("back")."</a> geht's zur&uuml;ck...\n";
        exit ();
}
?>


<!-- ende des header parts //-->


