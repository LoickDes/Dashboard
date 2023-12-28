<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Dashboard</title>
    <?php include 'php/connectbdd.php';?> 
    
</head>

<body>
    <?php
       $req1=$bdd->prepare("SELECT DISTINCT Opérateur FROM conso_elec_gaz_correze;");
       $req1->execute();

       $req2=$bdd->prepare("SELECT DISTINCT Filière FROM conso_elec_gaz_correze;");
       $req2->execute();

       $req3=$bdd->prepare("SELECT DISTINCT Année FROM conso_elec_gaz_correze ORDER BY Année ASC;");
       $req3->execute();
    ?>

    <article>
    
    <header>

<form method="post" action="index.php">
    <select name="operateur" id="operateur">
        <option value="Enedis">Opérateur</option>
        <?php foreach($req1 as $donnees){
             echo "<option oninput='showvalue()' value='" . $donnees['Opérateur'] . "'>" . $donnees['Opérateur'] . "</option>";
        }?>
    </select>

    <select name="filiere" id="filiere">
        <option value="Electricité et Gaz">Filière</option>
        <option value="Electricité et Gaz">Electricité et Gaz</option>
        <?php foreach($req2 as $donnees){
             echo "<option value='" . $donnees['Filière'] . "'>" . $donnees['Filière'] . "</option>";
        }?>
    </select>

    <select name="annee" id="annee">
        <option value="2021">Année</option>
        <?php foreach($req3 as $donnees){
             echo "<option value='" . $donnees['Année'] . "'>" . $donnees['Année'] . "</option>";
        }?>
        <option value="2022">2022</option>
    </select>
    <input type="submit" name="visualiser" value="Visualiser">
</form>   

<h1><div>Dashboard<span class="material-symbols-outlined">bar_chart_4_bars
</span></div><span>(Département Corrèze | Région Nouvelle-Aquitaine)</span></h1>

</header>

<?php 

$operateur = isset($_POST['operateur']) ? $_POST['operateur']:'Enedis';
$filiere = isset($_POST['filiere']) ? $_POST['filiere']:'Electricité';
$annee = isset($_POST['annee']) ? $_POST['annee']:2021;

$req2=$bdd->query("SELECT max(ConsommationTotaleMWh) FROM conso_elec_gaz_correze");
$max=$req2->fetch(PDO::FETCH_NUM)[0];    

$req3=$bdd->query("SELECT min(ConsommationTotaleMWh) FROM conso_elec_gaz_correze");
$min=$req3->fetch(PDO::FETCH_NUM)[0];    



?>

        <div id="row1">
            <div class="chartbox1">
                <h2>Consommation totale Corrèze (MWh) <?php echo $filiere?> <?php if($annee==2022){echo '2021';}else{echo $annee;}?></h2>
                <canvas id="graph1"></canvas>
            </div>
            <div class="center">
                <div class="max">
                    <h3>Consommation Max<span class="material-symbols-outlined">trending_up</span></h3>
                    <span><?php echo $max?> MWh</span>
                </div>
                <div class="min">
                    <h3>Consommation Min<span class="material-symbols-outlined">trending_down</span></h3>
                    <span><?php echo $min?> MWh</span>
                </div>
            </div>
            <div class="chartbox2">
                <h2>Evolution des consommations (MWh) pour <?php echo $operateur?></h2>
                <canvas id="graph2"></canvas>
            </div>
        </div>

        <div id="row2">
            <div class="chartbox3">
                <h2>Production d'énergie (MW) Nouvelle-Aquitaine <?php if($annee<2021){echo '2021';}else{echo $annee;}?></h2>
                <canvas id="graph3"></canvas>
            </div>
            <div class="chartbox4">
                <h2>TCO et TCH (%) moyen Nouvelle-Aquitaine <?php if($annee<2021){echo '2021';}else{echo $annee;}?></h2>
                <canvas id="graph4"></canvas>
            </div>
            <div class="chartbox5">
            <h2> Consommation (MW) Nouvelle-Aquitaine</h2>
                <canvas id="graph5"></canvas>
            </div>
        </div>

    </article>
<?php 

if($filiere=='Electricité et Gaz'){
    if($annee==2022){
        $req1=$bdd->prepare("SELECT Opérateur,ConsommationTotaleMWh FROM conso_elec_gaz_correze WHERE Année=2021");
        $req1->execute();
    }else{
        $req1=$bdd->prepare("SELECT Opérateur,ConsommationTotaleMWh FROM conso_elec_gaz_correze WHERE Année=:a");
        $req1->bindParam(':a',$annee, PDO::PARAM_INT);
        $req1->execute();       
    }
}else{

    if($annee==2022){
        $req1=$bdd->prepare("SELECT Opérateur,ConsommationTotaleMWh FROM conso_elec_gaz_correze WHERE Année=2021 AND Filière=:b");
        $req1->bindParam(':b',$filiere, PDO::PARAM_STR);
        $req1->execute();   
    }else{
        $req1=$bdd->prepare("SELECT Opérateur,ConsommationTotaleMWh FROM conso_elec_gaz_correze WHERE Année=:a AND Filière=:b");
        $req1->bindParam(':a',$annee, PDO::PARAM_INT);
        $req1->bindParam(':b',$filiere, PDO::PARAM_STR);
        $req1->execute();   
    } 
}

foreach($req1 as $data){
    $ope[]=$data['Opérateur'];
    $consototale[]=$data['ConsommationTotaleMWh'];
}

$req4=$bdd->prepare("SELECT Année,ConsommationAgricultureMWh,ConsommationIndustrieMWh,ConsommationTertiaireMWh,ConsommationRésidentielMWh,ConsommationSecteurInconnuMWh FROM conso_elec_gaz_correze WHERE Opérateur=:a ORDER BY Année ASC");
$req4->bindParam(':a',$operateur, PDO::PARAM_STR);
$req4->execute();  

foreach($req4 as $data){
    $ann[]=$data['Année'];
    $consoagri[]=$data['ConsommationAgricultureMWh'];
    $consoindus[]=$data['ConsommationIndustrieMWh'];
    $consoterti[]=$data['ConsommationTertiaireMWh'];
    $consoresi[]=$data['ConsommationRésidentielMWh'];
    $consosect[]=$data['ConsommationSecteurInconnuMWh'];
}




$req5=$bdd->prepare("SELECT Année,ConsommationMW FROM eco2mix_nouvelle_aquitaine");
$req5->execute();  

foreach($req5 as $data){
    $conso[]=$data['ConsommationMW'];
    $annAquitaine[]=$data['Année'];
}

if($annee<2021){
    $req6=$bdd->prepare("SELECT TCOThermique,TCHThermique,TCONucléaire, TCHNucléaire, TCOEolien,TCHEolien, TCOSolaire, TCHSolaire FROM eco2mix_nouvelle_aquitaine WHERE Année=2021");
    $req6->execute();  
}else{
    $req6=$bdd->prepare("SELECT TCOThermique,TCHThermique,TCONucléaire, TCHNucléaire, TCOEolien,TCHEolien, TCOSolaire, TCHSolaire FROM eco2mix_nouvelle_aquitaine WHERE Année=:a");
    $req6->bindParam(':a',$annee, PDO::PARAM_INT);
    $req6->execute();  
}

foreach($req6 as $data){

    $tcothermique=$data['TCOThermique'];
    $tchthermique=$data['TCHThermique'];
    $tconucleaire=$data['TCONucléaire'];
    $tchnucleaire=$data['TCHNucléaire'];
    $tcoeolien=$data['TCOEolien'];
    $tcheolien=$data['TCHEolien'];
    $tcosolaire=$data['TCOSolaire'];
    $tchsolaire=$data['TCHSolaire'];

}

$tch = [$tchthermique,$tchnucleaire,$tcheolien,$tchsolaire];
$tco = [$tcothermique,$tconucleaire,$tcoeolien,$tcosolaire];


if($annee<2021){
    $req7=$bdd->prepare("SELECT ThermiqueMW, NucléaireMW, EolienMW, SolaireMW, HydrauliqueMW, BioénergiesMW FROM eco2mix_nouvelle_aquitaine WHERE Année=2021");
    $req7->execute();  
}else{
    $req7=$bdd->prepare("SELECT ThermiqueMW, NucléaireMW, EolienMW, SolaireMW, HydrauliqueMW, BioénergiesMW FROM eco2mix_nouvelle_aquitaine WHERE Année=:a");
    $req7->bindParam(':a',$annee, PDO::PARAM_INT);
    $req7->execute();  
}
foreach($req7 as $data){

    $thermique=$data['ThermiqueMW'];
    $nucleaire=$data['NucléaireMW'];
    $eolien=$data['EolienMW'];
    $solaire=$data['SolaireMW'];
    $hydraulique=$data['HydrauliqueMW'];
    $bioenergies=$data['BioénergiesMW'];

}

$donnees=[$thermique,$nucleaire,$eolien,$solaire,$hydraulique,$bioenergies];



include "php/graphconfig.php"?>  
</body>
</html>