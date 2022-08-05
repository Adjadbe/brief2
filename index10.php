



<?php
	// inclus connexion.php
    include ("connectdatabase.php");   

    // recuperation de la liste des villes 
    $vil = $conn->prepare("SELECT * FROM ville ORDER BY ville ASC");
    $vil->execute();
    $vil->setFetchMode(PDO::FETCH_ASSOC);
    $villes = $vil->fetchAll(); 

    @$recherche = $_GET["recherche"];
    @$lieu = $_GET["lieu"];
    @$annee = $_GET["lieu"];
	

    if (isset($recherche)) {
        if (($lieu != 0) && ($annee != 0)) {
            for ($mois = 1; $mois <= 12; $mois++) { 
                $info = $conn->prepare("SELECT COUNT(*) AS nbAccident FROM accidents INNER JOIN ville ON lieu = id WHERE MONTH(dateEvenement) = $mois AND (lieu =$lieu) OR (YEAR(dateEvenement) = $annee)");
                $info->execute();
                $info->setFetchMode(PDO::FETCH_ASSOC);
                $tab = $info->fetch();
                $total[] = $tab['nbAccident'];
            }
        }
        
    }

    @$total_jan = $total[0];
    @$total_feb = $total[1];
    @$total_mar = $total[2];
    @$total_apr = $total[3];
    @$total_may = $total[4];
    @$total_jun = $total[5];
    @$total_jul = $total[6];
    @$total_aug = $total[7];
    @$total_sep = $total[8];
    @$total_oct = $total[9];
    @$total_nov = $total[10];
    @$total_dec = $total[11];
	
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Formulaire d'ajout</title>

    <style>
        * {
            margin: 0; 
            padding:0;
        }
	    
		.chartCard {
		    width: 450px;
		    height: 500px;
		
		    display: flex;
			flex-direction: column;
	    	align-items: center;
    		justify-content: center;
        margin-left:50px;
       
	    }
	    
		.chartBox {
		    width: 400px;
        height:220px;
		    padding: 20px;
		    border-radius: 20px;
		    border: 3px solid #3C8D9E;
		    background: white;
         

	    }

		form {
			margin: 50px;
			display: flex;
            
		}

		select, option {
			width: 300px;
			height: 45px;
			border:2px solid #3C8D9E;
     
			opacity: 0.8;
      margin:6px;
		
		}

		input {
			background-color: #EDE601 ;
            padding: 15px 20px;
            cursor: pointer;
            height:90px;
           
		}



        @media (max-width:1350px),(orientation:portrait){
            .chartCard {
		    width: 200px;
		    height: 200px;
		
		    display: flex;
			flex-direction: column;
	    	align-items: center;
    		justify-content: center;
        margin-left:120px;
       
	    }
	    
		.chartBox {
		    width: 310px;
        height:200px;
		    padding: 20px;
		    border-radius: 20px;
		    border: 3px solid #3C8D9E;
		    background: white;
         

	    }

        select, option {
			width: 230px;
			height: 45px;
			border:2px solid #3C8D9E;
     
			opacity: 0.8;
            margin-left:60px;
            
		
		}

        table,tr,td{
            margin-top:300px;
        }
        }


    </style>

</head>
<body >
 

    <div class="principal">
        <div class="secondaire"> <!-- fond degrade -->
            <div class="trois">
                <div class="sidebar_gche">
                    <div class="menu">
                          <a href="index.php"> <div class="puce_blanche"> <p style="color:#3e3f5f; margin-left: 12px; margin-top: 10px;">01</p> </div> <div class="list-item">Accident</div></a>
                            <hr>
                            <a href="index2.php"><div class="puce_blanche"><p style="color:#3e3f5f; margin-left: 12px; margin-top: 10px;">02</p></div> <div class="list-item">Vol</div></a><br/>
                            <hr>
                            <a href="index3.php" ><div class="puce_blanche"><p style="color:#3e3f5f; margin-left: 12px; margin-top: 10px;">03</p></div> <div class="list-item">Viol</div></a><br/>
                            <hr>
                            <a href="index4.php"><div class="puce_blanche"><p style="color:#3e3f5f; margin-left: 12px; margin-top: 10px;">04</p></div> <div class="list-item">Meurtre</div></a><br/>
                            <hr>
                            <a href="index5.php"> <div class="puce_blanche"><p style="color:#3e3f5f; margin-left: 12px; margin-top: 10px;">05</p></div> <div class="list-item">Suicide</div></a><br/>
                            <hr>
                            <a href="index6.php"> <div class="puce_blanche"><p style="color:#3e3f5f; margin-left: 12px; margin-top: 10px;">06</p></div> <div class="list-item">Incendie</div></a><br/>
                            <hr>
                            <a href="index7.php"> <div class="puce_blanche"><p style="color:#3e3f5f; margin-left: 12px; margin-top: 10px;">07</p></div> <div class="list-item">Inondation</div></a><br/>
                            <hr>
                            <a href="index8.php"> <div class="puce_blanche"><p style="color:#3e3f5f; margin-left: 12px; margin-top: 10px;">08</p></div> <div class="list-item">NegligeanceMedical</div></a><br/>
                            <hr>
                            <a href="index9.php"> <div class="puce_verte"><p style="color:#fff; margin-left: 12px; margin-top: 10px;">09</p></div> <div class="list-item">Statisques</div></a>
                            
                    </div>
                </div>
                <div class="logo"> <img src="logo2.png" alt="logo" width="80px" ></div>
                <div class="fond_blanc">
                    <div class="section_centrale">
                                          <div class="chartCard">
                          <form method="GET" action="">

                          
                            <div>
                            <table>
                            <tr>
                                <td>
                               <select name="lieu">
                                        <option>Choisir une ville</option>
                                        <?php foreach ($villes as $ville) { ?>
                                            <option <?= (isset( $_GET["lieu"]) && $_GET["lieu"] == $ville["id"])? "selected": ""; ?> value=<?php echo $ville['id'] ?> ><?php echo $ville['ville']; ?> </option>
                                <?php } ?>
                                    </select>
                              <select name="annee">
                                        <option>Choisir une annee</option>
                                          <option <?= (isset( $_GET["annee"]) && $_GET["annee"] == "2022")? "selected": ""; ?> value="2022">2022</option>
                                          <option <?= (isset( $_GET["annee"]) && $_GET["annee"] == "2021")? "selected": ""; ?> value="2021">2021</option>
                                          <option <?= (isset( $_GET["annee"]) && $_GET["annee"] == "2020")? "selected": ""; ?> value="2020">2020</option>
                                          <option <?= (isset( $_GET["annee"]) && $_GET["annee"] == "2019")? "selected": ""; ?> value="2019">2019</option>
                                          <option <?= (isset( $_GET["annee"]) && $_GET["annee"] == "2018")? "selected": ""; ?> value="2018">2018</option>
                                    </select></td>
                              <td> <button name="recherche"> </button></td>
                              </tr>
                             </table>
                              </div>
                              
                          </form>
                            <div class="chartBox">
                              <canvas id="myChart"></canvas>
                            </div>
                          </div>
                                          
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        //setUp
        const data = {
	        labels: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
	        datasets: [{
		        label: 'Nombre d\'accidents / Mois',
		        data: [
                    <?php echo $total_jan; ?>,
                    <?php echo $total_feb; ?>,
                    <?php echo $total_mar; ?>,
                    <?php echo $total_apr; ?>,
                    <?php echo $total_may; ?>,
                    <?php echo $total_jun; ?>,
                    <?php echo $total_jul; ?>,
                    <?php echo $total_aug; ?>,
                    <?php echo $total_sep; ?>,
                    <?php echo $total_oct; ?>,
                    <?php echo $total_nov; ?>,
                    <?php echo $total_dec; ?> 
                ],
		        backgroundColor: [
			        'rgba(255, 26, 104, 0.2)',
		        ],
		        borderColor: [
			        'rgba(255, 26, 104, 1)',
		        ],
		        borderWidth: 1
	        }]
        };

        //confiG
        const config = {
	        type: 'bar',
	        data,
	        options: {
		        scales: {
			        y: {
				        beginAtZero: true
			        }
		        }
	        }
        };

        //render init block
        const myChart = new Chart(
	        document.getElementById('myChart'),
	        config
        );

    </script>
</body>
</html>