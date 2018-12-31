<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Barre de recherche</title>
		<link rel="stylesheet" href="Content/css/nobel.css"/>
	</head>
	<body>
        <form id="add_client" action="?controller=add&action=add_client" method="post">
            <label> Nom <input name="nom" type="text"/></label> 
            <label> Prénom <input name="prenom" type="text"/></label> 
            <label> Adresse <input name="adresse" type="text"/></label> 
            <label> CP <input name="cp" type="text"/></label> 
            <label> Ville <input name="ville" type="text"/></label> 
            <label> Mail <input name="mail" type="text"/></label> 
            <label> Téléphone <input name="telephone" type="text"/></label> 
            <input type="submit" value="S'enregistrer"/>
        </form>

        <form id="search_pro" action="?controller=search&action=search_pro" method="post">
            <p>
                <label> Code postal <input name="cp" type="text"/></label> 
                Type de préstation :
                <label> <input name="formule" type="radio" value="Ebenpop"/> Ebenpop</label> <br/> 
                <label> <input name="formule" type="radio" value="Ebenseat"/> Ebenseat</label> <br/> 
                <label> <input name="formule" type="radio" value="Ebenlux"/> Ebenlux</label> <br/> 
                <input type="submit" value="Rechercher"/>
            </p>
        </form>
		
	</body>
</html>