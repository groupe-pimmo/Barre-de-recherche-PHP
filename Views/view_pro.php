<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Prestations</title>
		<link rel="stylesheet" href="Content/css/nobel.css"/>
	</head>
	<body>
        <p>Voici votre professionnels :</p>
        <table>
            <tr> <th>Nom</th> <th>Adresse</th> <th>CP</th> <th>Ville</th> <th>Prestation</th> <th>Formule</th> <th>Telephone</th> </tr>
            <?php foreach($pro as $val) : ?>
                <tr> 
                    <td> <?= e($val['nom_prof']) ?> </td> 
                    <td> <?= e($val['adresse']) ?> </td> 
                    <td> <?= e($val['cp']) ?> </td> 
                    <td> <?= e($val['ville']) ?> </td>
                    <td> <?= e($val['prestation']) ?> </td>
                    <td> <?= e($val['formule']) ?> </td>
                    <td> <?= e($val['telephone']) ?> </td>
                </tr>
            <?php endforeach ?>
        </table>
    </body>
    <footer>
        <?php require_once('retour.php') ?>
    </footer>
</html>