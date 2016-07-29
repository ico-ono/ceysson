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
	$html= strip_tags($chaine, '<em><strong><span><ul><ol><li><blockquote><sup><hr>');
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
<title>
<?php 
//Affichage dun nom de la catégorie dans la balise title
$sql ="SELECT * FROM categorie_ceysson WHERE id_categorie_ceysson =".$_GET['cat'];
$res =mysql_query($sql);
$cat= mysql_fetch_array($res);
    echo $cat['titre'];?>, Ceysson Editions d'art</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1 " />
<meta name="description" content="Découvrez les livres édités par la maison d'édition Ceysson Editions d'Art dans la catégorie
<?php
//Affichage dun nom de la catégorie dans la balise meta description
 echo $cat['titre'];?> ">

<meta name="keywords" content="Editions, livre, livres, beaux-livres, beau-livre, art moderne, art contemporain, maison d'edition, livre d'art">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1 " />
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
</head>

<?php
// Fonction pour permettre l'affichage des livres sur plusieurs pages
function affichePages($nb,$page,$total)
{
	$nbpages=ceil($total/$nb);
    $numeroPages = 1;
    $compteurPages = 1;
    $limite  = 0;
    echo '<table class="numero" border = "0" ><tr>'."\n";
    while($numeroPages <= $nbpages)
	{
    	echo '<td ><a href = "'.$page.'?limite='.$limite.'&cat='.$_GET['cat'].'"">'.$numeroPages.'</a></td>'."\n";
        $limite = $limite + $nb;
        $numeroPages = $numeroPages + 1;
        $compteurPages = $compteurPages + 1;
        if($compteurPages == 10) 
		{
        	$compteurPages = 1;
            echo '<br>'."\n";
        }
	}
    echo '</tr></table>'."\n";
}
//récupération de $limite
    if(isset($_GET['limite'])) 
        $limite=$_GET['limite'];
    else   $limite=0;

//Fonction vérifiant $limite
function verifLimite($limite,$total,$nombre)
{
    if(is_numeric($limite)) 
	{      
	    if(($limite >=0) && ($limite <= $total) && (($limite%$nombre)==0)) 
		{
        	$valide = 1;
        }    
        else 
		{
            $valide = 0;
        }
    }
    else {
            $valide = 0;
    }
return $valide;

}

//Fonction permettant d'afficher les liens précédent et suivant
function displayNextPreviousButtons($limite,$total,$nb,$page) {
$limiteSuivante = $limite + $nb;
$limitePrecedente = $limite - $nb;
echo  '<table><tr>'."\n";
if($limite != 0) {
          echo  '<img class="precedent" src="images/precedent.png" alt="precedent" title="precedent"';

}
if($limiteSuivante < $total) {
        echo  '<img class="suivant" src="images/suivant.png" alt="suivant" title="suivant"';
            
}
echo  '</tr></table>'."\n";
}

?>
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


    
	<div id="livres"> 
    <table class="liste">
    <tr>
    <td>
    <ul>
    <?php
    //Définition des paramètres pour le calcul des pages
    $nombre = 6;
    if (!isset($limite)) $limite = 0;     
    $path_parts = pathinfo($_SERVER['PHP_SELF']);
    $page = $path_parts['basename'];
    
    
    //Requete comptant le nombre de résultat dans la table
    $cat = $_GET["cat"];
    $select = 'SELECT count(*) FROM livres where id_categorie_ceysson = "'.$cat.'"';
    $result = mysql_query($select);
    $row = mysql_fetch_row($result);
    $total = $row[0];
    
    $verifLimite= verifLimite($limite,$total,$nombre);
    if(!$verifLimite)  
    {
        $limite = 0;
    }
    //Affichage des résultats
    $return = mysql_query('select * FROM livres where id_categorie_ceysson = "'.$_GET["cat"].'" order by parution_livre desc limit '.$limite.','.$nombre);
    while ($livres = mysql_fetch_array($return))
    {
        if($total) 
		{
         	if($livres['id_faconnage'] == 1)
			{
             	$faconnage = "Livre relié";
            }
            else if($livres['id_faconnage'] == 2)
            {
             	$faconnage = "Livre broché";
            }
            else
			{
            	$faconnage = "";
            }
             echo '<div id="content_livre">';
                        
            $chaine = reecriture_url($livres['titre_livre']);
			$titre = trim($chaine,".");
			$titre_livre = str_replace(".", "-",$titre);
			$titre_lien = guillemet($livres['titre_livre']);
             echo '<div class="image"><a href="livre-'.$livres['ID_livre'].'-'.$titre_livre.'.html"><img src="http://www.editions-iac.com/donnees/livres/'.$livres['ID_livre'].'/'.$livres['couverture'].'" alt="'.$titre_lien.'" title="'.$titre_lien.'"></a></div>
             <a  href="livre.php?id='.$livres['ID_livre'].'"><div class="description">
             <h2>'.supp_htmlcontenu($livres['titre_livre']).'</h2>
			  <h3>'.supp_htmlcontenu($livres['sous_titre_livre']).'</h3>
             <p>'.$livres['pagination_livres'].' pages <br/>
             <p>'.$faconnage.' <br/>
             <p>'.$livres['prix_livre'].'€ <br/></div></a></div>';
        }
    }
    ?>
    </ul>
    </td>
    </tr>
    </table> 
        
    
    <?php
    if($total > $nombre) 
	{
    	// affichage des liens vers les pages
        affichePages($nombre,$page,$total);
	}
    ?>
    
</div>
</div>
    
<div id="footer">
	<ul>	
            <li><a href="contact.html">Contact</a></li>
            <li><a href="mentions.html">Mentions l&eacute;gales</a></li>
	</ul>
	<p>© IAC Éditions d'Art 2012  |  IAC Éditions d'Art est une marque I.A.C. média</p>
</div>
    
</div>

</body>
</html>
