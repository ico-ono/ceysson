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

//Fonction pour remplacer les caractères spéciaux dans l'URL
function reecriture_url($chaine){
 
    $chaine=trim($chaine);
    $chaine= strtr($chaine,"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ","aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn");
    $chaine = preg_replace('/([^.a-z0-9]+)/i', '-', $chaine);
    $chaine = strtolower($chaine);
    return $chaine;
 
}
function supp_html($chaine){
	$html= strip_tags($chaine);
	$slash=stripslashes($html);
	return $slash;
}

function supp_htmlcontenu($chaine){
	$html= strip_tags($chaine, '<em><strong><span><ul><ol><li><blockquote><sup><hr><br>');
	$slash=stripslashes($html);
	return $slash;
}

function guillemet($chaine){
	$guil= str_replace('"','',$chaine);
	return $guil;
}    
                

	?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1 " />
<title>Ceysson Editions d'art</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1 " />
<meta name="description" content="Les Éditions Ceysson réalisent depuis 2005 des beaux livres, des catalogues d'expositions et des monographies d'artiste. Elles présentent de manière privilégiée des monographies d'artistes modernes et contemporains."> 
<meta name="keywords" content="Editions, livre, livres, beaux-livres, beau-livre, art moderne, art contemporain, maison d'edition, livre d'art">
<link rel="stylesheet" href="styles/styles_ceysson.css">

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
	<script type="text/javascript" src="js/easySlider1.7.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){	
			$("#slider").easySlider({
				auto: true, 
				continuous: true,
				numeric: true
			});
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
<img src="images/logo_ceysson.jpg" alt="ceysson" title="ceysson"/>
</div>

<div id="aside">
	<ul>
    <?php
		$sql = 'select * from categorie_ceysson';
		$res = mysql_query($sql);
		while ($cat = mysql_fetch_array($res))
		{ 
			$titre_cat = reecriture_url($cat['titre']);
			echo '<li><a href="categorie-'.$cat['id_categorie_ceysson'].'-'.$titre_cat.'.html">'.$cat['titre'].'</a></li>';
		}
		
		?>
    	</ul>
</div>

<article>
 <div id="slider">
 <ul>	
  		
 				<?php 
		$sql = 'select * from livres where editeur_livre = "ceysson"  AND id_qualification= "1" order by parution_livre desc';
		
		$res = mysql_query($sql);
		
		while ($livres = mysql_fetch_array($res))
		{ 
			$html = strip_tags($livres['titre_livre']);
			$chaine = reecriture_url($html);
			$titre = trim($chaine,".");
			$titre_livre = str_replace(".", "-",$titre);
			$titre_lien = guillemet($livres['titre_livre']);
			$resume = stripslashes($livres['resume_livre']);
			echo '<li><a href="livre-'.$livres['ID_livre'].'-'.$titre_livre.'.html"><div class="image"><img src="http://www.editions-iac.com/donnees/livres/'.$livres['ID_livre'].'/couverture1.jpg" alt="'.$titre_lien.'" title="'.$titre_lien.'"></div>
			<h2>'.supp_htmlcontenu($livres['titre_livre']).'</h2><h3>'.supp_htmlcontenu($livres['sous_titre_livre']).'</h3><h4>'.supp_htmlcontenu($livres['auteurs_livre']).'</h4>
			<div id="desc">';
			
			$taille_resume = strlen($resume);
			if ($taille_resume > 600)
			{
				echo substr($resume,0,600).'[...]';                
            }
			else
			{
				echo $resume;
			}
            echo '</div></a></li>';
			
				
		}
		
		?>	
				
</ul>
    

</div>
</article>


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
