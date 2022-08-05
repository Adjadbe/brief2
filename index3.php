<?php  include("connectdatabase.php");?>


<?php 

// var_dump($_POST);

if (isset($_POST['valide'])){
  $titre= addslashes($_POST["titre"]);
  $nbrevictimes = addslashes($_POST["nbrevictimes"]);
  $typeviol = addslashes ($_POST["typeviol"]);
  $nbrenfants = addslashes ($_POST["nbrenfants"]);
  $nbrfemmes = addslashes ($_POST["nbrfemmes"]);
  $nbrhommes = addslashes ($_POST["nbrhommes"]);
  $lieu = addslashes ($_POST["lieu"]);
  $source = addslashes ($_POST["source"]);
  $mois = addslashes ($_POST["mois"]);
  $jour = addslashes ($_POST["jour"]);
  $an = addslashes ($_POST["an"]);
  
  $oldDate = strtotime($jour."/".$mois."/".$an);
  $newDate = date('Y-m-d',$oldDate);
  $dateEvenement = addslashes ($newDate);
   

  $servername = "localhost";
$username = "root";
$password = "";
$db = "brief";

  $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
  $sql = $conn->query("INSERT INTO viols (titre, nbrevictimes, typeviol, nbrenfants, nbrfemmes, nbrhommes, lieu, source, dateEvenement)
 VALUES ( '$titre', '$nbrevictimes', '$typeviol', '$nbrenfants', '$nbrfemmes', '$nbrhommes', '$lieu', '$source', '$dateEvenement')");
//  var_dump($sql);
 echo "Enregistement effectuée avec succès";

}?>





<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Formulaire d'ajout</title>
</head>
<body >



    <div class="principal">
        <div class="secondaire"> <!-- fond degrade -->
            <div class="trois">
                <div class="sidebar_gche">
                    <div class="menu">
                          <a href="index.php"> <div class="puce_blanche"> <p style="color:#3e3f5f; margin-left: 12px; margin-top: 10px;">01</p> </div> <div class="list-item">Accident</div></a>
                            <hr>
                            <a href="index2.php"><div class="puce_blanche"><p style="color:#3e3f5f; margin-left: 12px; margin-top: 10px;">02</p></div> <div class="list-item">Vol</div></a>
                            <hr>
                            <a href="index3.php"><div class="puce_verte"><p style="color:#fff; margin-left: 12px; margin-top: 10px;">03</p></div> <div class="list-item">Viol</div></a>
                            <hr>
                            <a href="index4.php"><div class="puce_blanche"><p style="color:#3e3f5f; margin-left: 12px; margin-top: 10px;">04</p></div> <div class="list-item">Meurtre</div></a>
                            <hr>
                            <a href="index5.php"> <div class="puce_blanche"><p style="color:#3e3f5f; margin-left: 12px; margin-top: 10px;">05</p></div> <div class="list-item">Suicide</div></a>
                            <hr>
                            <a href="index6.php"> <div class="puce_blanche"><p style="color:#3e3f5f; margin-left: 12px; margin-top: 10px;">06</p></div> <div class="list-item">Incendie</div></a>
                            <hr>
                            <a href="index7.php"> <div class="puce_blanche"><p style="color:#3e3f5f; margin-left: 12px; margin-top: 10px;">07</p></div> <div class="list-item">Inondation</div></a>
                            <hr>
                            <a href="index8.php"> <div class="puce_blanche"><p style="color:#3e3f5f; margin-left: 12px; margin-top: 10px;">08</p></div> <div class="list-item">NegligeanceMedical</div></a>
                            <hr>
                            <a href="index9.php"> <div class="puce_blanche"><p style="color:#3e3f5f; margin-left: 12px; margin-top: 10px;">09</p></div> <div class="list-item">Statisques</div></a>
                            
                    </div>
                </div>
                <div class="fond_blanc">
                    <div class="section_centrale">
                        
                        <div class="formulaire">
                                <div style="text-align:center; margin-top: 30px;">
                                  <h3>Information Personelle </h3>  <div class="logo"> <img src="logo2.png" alt="logo" width="80px" ></div>
                                    <p  style="font-weight:bold; font-size: 15px;"> Veuillez entrer vos information afin <br> que nous puissions vous enregistrer.</p>
                                </div>
                            <form action="" method="POST">
                                
                                <div class="" style="float:left ;">
                                    <fieldset> 
                                        <legend>Titre</legend>
                                        <input type="text" class="Titre" id="titre" name="titre" placeholder="Titre de l'article"required>
                                    </fieldset>
                                </div>                                
                                <div class="" style="margin-left: 190px;">
                                    <fieldset> 
                                        <legend>Nombre de victime </legend>
                                        <input type="number" class="nbrvictime" id="nbrvictime" name="nbrevictimes" placeholder="Nombre de victime"required>
                                    </fieldset>
                                </div>
                                <br>
                                <div class="">
                                    <fieldset> 
                                        <legend>Type de viol</legend>
                                           
                                        <input type="text" name="typeviol" class="engin"  placeholder="pedophilie,conjugal,canine..."required>
                                    </fieldset>
                                </div>
                                <br>
                                <div class="">
                                    <fieldset> 

                                        <legend>Lieu</legend>

                                        <select id="ville" name="lieu" style="outline:none;border:none;width:220px">
                                        <option> commune ou commune proche  </option>
                                        <?php
                                        $stmt = $conn->prepare("SELECT id,ville FROM ville");
                                        $stmt->execute();
                                        $stmt->setFetchMode(PDO::FETCH_ASSOC);

                                        $resultat =$stmt->fetchAll();
       
                                     foreach($resultat as $reine){
                                     ?> <option value="<?=$reine ['id']; ?>">
                                      <?=$reine['ville']; ?>
                                        </option>

                                        <?php $conn = null; } ?>
                                          </select>  

                                        <!-- <input type="text" name="lieu" class="lieu" placeholder="commune ou commune proche"required> -->
                                    </fieldset>
                                </div>
                                <br>
                                <table>
                                    <tr> <td>
                                <div class="" style="width:110px">
                                    <fieldset> 
                                        <legend>Enfant</legend>
                                        <input type="text" class="enfant" id="enfant" name="nbrenfants" placeholder="victime">
                                    </fieldset>
                                </div> 
                                 </td>   <td>

                                <div class="" style="margin-left:25px;width:110px">
                                    <fieldset> 
                                        <legend>Femme</legend>
                                        <input type="text" class="femme" id="femme" name="nbrfemmes" placeholder="victime">
                                    </fieldset>
                                </div> </td> <td>

                                <div class="" style="margin-left:25px;width:110px">
                                    <fieldset> 
                                        <legend>Homme</legend>
                                        <input type="text" class="homme" id="homme" name="nbrhommes" placeholder="victime">
                                    </fieldset>
                                </div></td>

                                </tr>
                               </table>  <br/>      

                               <div>
                                <fieldset>
                                    <legend>Source</legend>
                                    <input type="url" name="source" placeholder="lien de publication d'article" required>
                                </fieldset>
                              </div><br/>

                                <div class="">
                                    <label>Date du viol: </label>
                                    <div><br/>
                                        <div style="float:left; margin-right:20px;"> 
                                        
                                            
                                                <input type="number"  name="mois" class="jour" placeholder="MM" maxlength="2"  max="12" min="1" size="5" style=" color:#000; height:25px"required>
                                            
                                        </div>
                                        <div style="float:left; margin-right: 20px;"> 
                                        
                                            
                                                <input type="number" name="jour" class="jour" placeholder="DD"  max="31" min="1" maxlength="2" size="5" style=" color:#000; height:25px" required>
                                                
                                            
                                        
                                        </div>
                                        <div style="margin-left: 90px;"> 
                                            
                                                <input type="number"  name="an" class="jour" placeholder="YYYY"  max="3000" min="1800" size="5"  maxlength="4" style=" color:#000; outline=none;height:25px" required>
                                            
                                            
                                        </div>

                                        
                                    </div>
                                    <input type="submit" name="valide" class="cercle_vert" value="" > 
                                </div>
                            
                                <!-- <marquee>pour les jours et l'année utilisers les valeur:-12 et -2005 au lieu de 12 et 2005</marquee> -->

                            </form>
                        </div>
                         
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>