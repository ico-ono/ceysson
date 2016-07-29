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
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1 " />
<title>Contact, Ceysson, Editions d'art</title>
<meta name="description" content="Prendre contact avec la maison d'édition Ceysson Editions d'art."> 
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


<script language="javascript">
//<![CDATA[
//nous appliquons simplement une couleur d'arri?re plan aux objets trait?s, 
function couleur(obj) {
	 obj.style.backgroundColor = "#FFFFFF";
}

function valider(contact)
{
			var msg = "";
			contact.securite.value = "test_reussi";
		
		//Vérification du champ message
			if(document.contact.message.value== 0)
			{
			document.contact.message.style.backgroundColor= "#ff7f72";
			msg += "Vous devez entrer un message \n";
			}
			
			//Vérification du champ message taille
			if(document.contact.message.value.length> 500)
			{
			document.contact.message.style.backgroundColor= "#ff7f72";
			msg += "Votre description est trop longue, maximum 500 caractères \n";
			}
		
		
		//V?rification du mail s'il n'est pas vide on v?rifie le . et @
		 
				if (document.contact.email.value != "")
			{
				indexAroba = document.contact.email.value.indexOf('@');
				indexPoint = document.contact.email.value.indexOf('.');
				if ((indexAroba < 0) || (indexPoint < 0))		
				{
		 
		//dans le cas ou il manque soit le . soit l'@ on modifie la couleur d'arri?re plan du champ mail et d?finissons un message d'alerte
		 
					document.contact.email.style.backgroundColor = "#ff7f72";
					msg += "Le mail est incorrect\n";
				}
			}
			else{
			document.contact.email.style.backgroundColor= "#ff7f72";
			msg += "Vous devez entrer une adresse mail\n";
			}
				
		
		
		//Si aucun message d'alerte a ?t? initialis? on retourne TRUE
			if (msg == "") return(true);
		 
		//Si un message d'alerte a ?t? initialis? on lance l'alerte
			else	
			{
				alert(msg);
				return(false);
			}
}

	
//]]>
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
<div id="contact">
    <article class="equipe">
    <h3>Direction</h3>
    <p>
    <strong>Bernard Ceysson</strong><br/>
    <strong>Lo&iuml;c B&eacute;n&eacute;ti&egrave;re</strong><br/>
    <strong>Fran&ccedil;ois Ceysson</strong><br/>
    </p>
    
    <h3>Responsables des éditions</h3>
    <p>
    <strong>Chlo&eacute; Billon-Grand</strong><br/>
    <p>chloe (at) ceysson (point) com</p>
<p>
    <strong>Nastasiea Hadoux</strong><br/></p>
    <p>nastasiea (at) ceysson (point) com</p>
  
    </p>
    
    <h3>Adresse</h3>
    <p>
    Ceysson &Eacute;ditions d'Art<br/>
    11, rue des creuses<br/>
    42000 Saint-&Eacute;tienne<br/><br/>
    
    Tel: 04 77 90 44 52<br/>
    
    Fax: 04 77 53 74 48 
    </p>
    
    </article>

    <article class="formulaire">
   	<?php
      	/*if(isset($_POST['envoyer']))
			{
				
			//Récupération des variables
			$nom=@$_POST['nom'];
			$mail=@$_POST['email'];
			$num=@$_POST['tel'];
			$mes=@nl2br(stripslashes($_POST['message']));
		
			//Vérification des caractères entrés dans le formulaire (anti-spammer)	
			if (mb_eregi("MIME-Version:|Content-Type:|Content-Transfer-Encoding:|bcc:|cc:", $mail . $mes . $nom . $num )) {
			echo("<p>Tentative d'intrusion détectée</p>");
			}		
			
			else if(mb_eregi("href|\[url\]",  $mail . $mes . $nom . $num)) {
			echo("<p>Nous ne permettons pas de liens html dans les messages.</p>");
			}
				
			else if ($_POST["securite"] != "test_reussi") echo("Tentative d'intrusion détectée");
			
			else if ($_POST["vide"] != "") echo("Tentative d'intrusion détectée");
			else{
			//Envoi du mail
			$entete = "MIME-Version: 1.0\r\n";
			$entete .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$sujet = 'Formulaire de contact IAC Editions';
			$message =  "Nom :".$nom." <br /> <strong>Adresse mail</strong> : ".$mail."\nNumero de téléphone : ".$num." \nMessage : ".$mes."\n";		
        	$destinataire="edition@iac-media.com";
			if(mail($destinataire, $sujet, $message, $entete))
			{
				echo "<p>Votre message a bien été envoyé</p>"	;
			}
			else
			{					 
				echo "<p>Une erreur est survenue lors de l'envoi du message</p>";						  															
			}

		
		 }
			}*/
/*<form name="contact" method="post" action="contact.html">
        <input type="hidden" name="securite" value="" />
		<p><label> Nom </label> <input type="text" name="nom"></p>
		<p><label> E-mail *</label> <input type="text" name="email" onKeyUp="javascript:couleur(this);" ></p>
		<p><label> Num&eacute;ro de t&eacute;l&eacute;phone </label> <input type="text" name="tel"></p>
		<p><label> Message *</label></p><p> <textarea align="left" name="message" rows="5" cols="40" onKeyUp="javascript:couleur(this);" > </textarea></p></br>
		<p class="envoyer" ><input type="submit" value="" name="envoyer" onclick="valider(document.contact)" /></p>
        <input type="hidden" name="vide" value="" />
		</form>*/ ?>

		
    </article>

    <article class="diffusion">
    <h3> Diffusion </h3>
    <p>Tous nos titres sont diffus&eacute;s et distribu&eacute;s par Pollen-Litt&eacute;ral-Diffusion-Distribution et disponibles sur commande, en ligne et chez de nombreux libraires partenaires.
    </p>
    <img src="images/logo_pollen.jpg" alt="Logo Pollen" title="Logo Pollen">
    </article>
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
