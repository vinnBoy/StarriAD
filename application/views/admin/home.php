<div class="col-md-12 center-x">
    <h2> <?php echo $title; ?> </h2>
</div>
<?php
 
$dataPoints = array(
	array("y" => 2, "label" => "Novembro"),
	array("y" => count($campanhas), "label" => "Dezembro"),

);
 
?>

<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Campanhas Publicadas"
	},
	axisY: {
		title: "Número de campanhas"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>

<body>
<div id="chartContainer" style="padding-top: 40px; padding-left: 40px; height: 370px; width: 90%;"></div><br>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


  <div class="container table-active ">
  <div class="row" >  
  <?php foreach ($campanhas as $campanha) : ?>
  <div class="col-md-4 center-text padding-left-10 mt-5">
    <h5>Usuário</h5>
    <label><?php echo $campanha['email'];?></label>
    <h5>Nome da campanha</h5>
    <label><?php echo $campanha['titulo'];?></label>
    <h5>Investimento</h5>
    <label><?php echo $campanha['investimento'];?></label>
    <h5>Categoria</h5>
    <label><?php echo $campanha['categoria'];?></label>
    <hr>
  </div>
  <?php endforeach; ?>
  </div>    
  </div>  
