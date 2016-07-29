<?php
//Connexion BDD
include_once('etc/mysql/index.php');
$db_host= $sqlserver;
$db_name= $sqlbase;
$username= $login;
$db_con=mysql_connect($db_host,$username,$password);
$connection_string=mysql_select_db($db_name);
mysql_connect($db_host,$username,$password);
mysql_select_db($db_name);

function supp_html($chaine){
	$html= strip_tags($chaine);
	$slash=stripslashes($html);
	return $slash;
}

function supp_htmlcontenu($chaine){
	$html= strip_tags($chaine, '<em><strong><span><ul><ol><li><blockquote><sup><hr>');
	$slash=stripslashes($html);
	return $slash;
}

function guillemet($chaine){
	$guil= str_replace('"','',$chaine);
	return $guil;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<title>
<?php
//Affichage du titre du livre dans la balise title
$sql = 'select * from livres where ID_livre = "'.$_GET['id'].'"';
$res = mysql_query($sql);
$livre = mysql_fetch_array($res);
echo supp_html($livre['titre_livre']);
?>		
, Ceysson Editions d'art</title>
<meta name="description" content="
<?php
//Affichage du titre du livre dans la balise meta description
$resume=supp_html($livre['resume_livre']);
echo supp_html($livre['titre_livre']).', '.$resume;?>">
<meta name="keywords" content="Editions, livre, livres, beaux-livres, beau-livre, art moderne, art contemporain, maison d'edition, livre d'art">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1 " />

<link rel="stylesheet" href="styles/styles_ceysson.css">
<link rel="stylesheet" type="text/css" href="styles/jquery.lightbox-0.5.css" media="screen" />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1 " />

<script type="text/javascript">
// Google Analytics
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-29281024-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript">


$(document).ready(function(){

    $(".volet").hide();
	$("#infos").show();


	$("#spaninfos").click(function(){ 
	    $(".volet").hide();	
	    $("#infos").fadeIn('slow');
		
	
	});
	
	$("#spanextrait").click(function(){ 
	    $(".volet").hide();	
	    $("#extrait").fadeIn('slow');

	});
	
	$("#spanresume").click(function(){ 
	    $(".volet").hide();	
	    $("#resume").fadeIn('slow');
	
	});
	
	$("#spanvisuels").click(function(){ 
	    $(".volet").hide();	
	    $("#visuels").fadeIn('slow');

	});
  });
 
function couleur(lien,menu_livre) {
  var liens = document.getElementById(menu_livre).getElementsByTagName("a");
  for(var i=0;i<liens.length;i++) {
    liens[i].style.color = "#F1EBB4";
	liens[i].style.backgroundColor = "#1D1D1D";
  }
  lien.style.color = "black";
  lien.style.backgroundColor = "#F1EBB4";
}


    $(function() {
        $('#photos a').lightBox();
    });
	
	$(function() {
	$('.image a').lightBox();
});
</script>

</head>

<body>
<div id="page">
    <div id="nav">
        <ul>
               <li><a href="index.html">ACCUEIL</a></li>
            <li><a href="livres.html">LES LIVRES</a></li>
            <li><a href="maison-edition.html">MAISON D'EDITION</a></li>
            <li><a href="contact.html">CONTACT</a></li>
        </ul>
    </div>
    
    <div id="header">
    <img src="images/logo_ceysson.jpg" alt="ceysson" title="ceysson" />
    </div>
    

    <div id="livre">
    
    <?php
	$sql = 'select * from livres where ID_livre = "'.$_GET['id'].'"';
	$res = mysql_query($sql);
	while ($livre = mysql_fetch_array($res))
	{
		if($livre['id_faconnage'] == 1)
		{
			$faconnage = "Livre relié";
		}
		else if($livre['id_faconnage'] == 2)
		{
			$faconnage = "Livre broché";
		}
		else
		{
			$faconnage = "";
		}
		$titre_lien = guillemet($livre['titre_livre']);
		echo '<h2>'.supp_htmlcontenu($livre['titre_livre']).'</h2> <h3>'.supp_htmlcontenu($livre['sous_titre_livre']).'</h3>
		<div class="image"><a href="http://www.editions-iac.com/donnees/livres/'.$livre['ID_livre'].'/'.$livre['couverture'].'"><img src="http://www.editions-iac.com/donnees/livres/'.$livre['ID_livre'].'/'.$livre['couverture'].'" alt="'.$titre_lien.'" title="'.$titre_lien.'"></a></div>';?>
		<div id="menu_livre">
			<a class="lien" href="#informations" onClick="couleur(this,'menu_livre');">
			<span id="spaninfos" class="menu_volet">
			D&eacute;tails
			</span>
			</a>
			
            <a class="lien" href="#resumelivre" onClick="couleur(this,'menu_livre');">
			<span id="spanresume" class="menu_volet">
			Résumé
			</span>
			</a>
			
            <a class="lien" href="#extraitlivre" onClick="couleur(this,'menu_livre');">
			<span id="spanextrait" class="menu_volet">
			Extrait
			</span>
			</a>
	
			<a class="lien" href="#visuelslivre" onClick="couleur(this,'menu_livre');">
			<span id="spanvisuels" class="menu_volet">
			Visuels
			</span>  
			</a>
		</div>
        
        <?php
		echo '
		<div id="infos" class="volet"> <p>Format : '.supp_htmlcontenu($livre['format_livre']).'</p> <p>Pagination : '.$livre['pagination_livres'].' pages</p> <p>';
		if($livre['prix_livre'] != 0){echo 'Prix : '.$livre['prix_livre'].'€';} else{echo '';} 
	echo' </p><p>Façonnage : '.supp_htmlcontenu($faconnage).'</p>';
		
	$tab_date = explode(' ', $livre['parution_livre']);
	$tab_dmy = explode('-', $tab_date[0]);
	$mois = $tab_dmy[1];
		switch($mois) {
			case '01': $mois = 'Janvier'; break;
			case '02': $mois = 'Février'; break;
			case '03': $mois = 'Mars'; break;
			case '04': $mois = 'Avril'; break;
			case '05': $mois = 'Mai'; break;
			case '06': $mois = 'Juin'; break;
			case '07': $mois = 'Juillet'; break;
			case '08': $mois = 'Août'; break;
			case '09': $mois = 'Septembre'; break;
			case '10': $mois = 'Octobre'; break;
			case '11': $mois = 'Novembre'; break;
			case '12': $mois = 'Decembre'; break;
			default: $mois =''; break;
		  }
	$newdate = ''.$mois.' '.$tab_dmy[0].'';
	echo '<p> Publication : '.$newdate.'</p>
	
	 <p class="description">'.stripslashes($livre['description_livre']).'</p><p class="description">'.stripslashes($livre['tete_livre']).'</p><br/><p class="description">Auteur(s) : <br/>'.supp_htmlcontenu($livre['auteurs_livre']).' </p>';
		if ($livre['bilingue'] != '')
		{
			echo '<p class="description">Bilingue : '.supp_htmlcontenu($livre['bilingue']).'</p>';
		}
		echo '</div>
		<div id="resume" class="volet">'.stripslashes($livre['resume_livre']).'</div>
		<div id="extrait" class="volet">'.stripslashes($livre['extrait_livre']).'</div>
		<div id="visuels" class="volet"><div id="photos">';
		//Affichage visuels
		if($livre["visuel_grand1"] !=  ''){echo '<a href="http://www.editions-iac.com/donnees/livres/'.$livre['ID_livre'].'/'.$livre['visuel_grand1'].'"><img src="http://www.editions-iac.com/donnees/livres/'.$livre['ID_livre'].'/'.$livre['visuel_grand1'].'" alt="'.guillemet($livre['titre_livre']).'" title="'.guillemet($livre['titre_livre']).'"></a>';}
		if($livre["visuel_grand2"] !=  ''){ echo'<a href="http://www.editions-iac.com/donnees/livres/'.$livre['ID_livre'].'/'.$livre['visuel_grand2'].'"><img src="http://www.editions-iac.com/donnees/livres/'.$livre['ID_livre'].'/'.$livre['visuel_grand2'].'" alt="'.guillemet($livre['titre_livre']).'" title="'.guillemet($livre['titre_livre']).'"></a>';}
		if($livre["visuel_grand3"] !=  ''){ echo '<a href="http://www.editions-iac.com/donnees/livres/'.$livre['ID_livre'].'/'.$livre['visuel_grand3'].'"><img src="http://www.editions-iac.com/donnees/livres/'.$livre['ID_livre'].'/'.$livre['visuel_grand3'].'" alt="'.guillemet($livre['titre_livre']).'" title="'.guillemet($livre['titre_livre']).'"></a>';}
		if($livre["visuel_grand4"] !=  ''){echo '<a href="http://www.editions-iac.com/donnees/livres/'.$livre['ID_livre'].'/'.$livre['visuel_grand4'].'"><img src="http://www.editions-iac.com/donnees/livres/'.$livre['ID_livre'].'/'.$livre['visuel_grand4'].'" alt="'.guillemet($livre['titre_livre']).'" title="'.guillemet($livre['titre_livre']).'"></a>';}
		
		//Affichage planches
		if($livre["planche_grand1"] !=  ''){echo '<a href="http://www.editions-iac.com/donnees/livres/'.$livre['ID_livre'].'/'.$livre['planche_grand1'].'"><img src="http://www.editions-iac.com/donnees/livres/'.$livre['ID_livre'].'/'.$livre['planche_grand1'].'" alt="'.guillemet($livre['titre_livre']).'" title="'.guillemet($livre['titre_livre']).'"></a>';}
		if($livre["planche_grand2"] !=  ''){echo '<a href="http://www.editions-iac.com/donnees/livres/'.$livre['ID_livre'].'/'.$livre['planche_grand2'].'"><img src="http://www.editions-iac.com/donnees/livres/'.$livre['ID_livre'].'/'.$livre['planche_grand2'].'" alt="'.guillemet($livre['titre_livre']).'" title="'.guillemet($livre['titre_livre']).'"></a>';}
		if($livre["planche_grand3"] !=  ''){echo '<a href="http://www.editions-iac.com/donnees/livres/'.$livre['ID_livre'].'/'.$livre['planche_grand3'].'"><img src="http://www.editions-iac.com/donnees/livres/'.$livre['ID_livre'].'/'.$livre['planche_grand3'].'" alt="'.guillemet($livre['titre_livre']).'" title="'.guillemet($livre['titre_livre']).'"></a>';}
		if($livre["planche_grand4"] !=  ''){ echo '<a href="http://www.editions-iac.com/donnees/livres/'.$livre['ID_livre'].'/'.$livre['planche_grand4'].'"><img src="http://www.editions-iac.com/donnees/livres/'.$livre['ID_livre'].'/'.$livre['planche_grand4'].'" alt="'.guillemet($livre['titre_livre']).'" title="'.guillemet($livre['titre_livre']).'"></a>';}
		echo '</div></div>';	
	}
	?>
   
</div>

</div>
    
<div id="footer">
	<ul>
		<li><a href="contact.html">Contact</a></li>              
		<li><a href="mentions.html">Mentions l&eacute;gales</a></li>
	</ul>
    <p>© Ceysson Éditions d'Art 2012  |  Ceysson Éditions d'Art est une marque I.A.C. média</p>
</div>
</div>
</body>	
</html>
