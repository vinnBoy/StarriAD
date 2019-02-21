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
<div id="chartContainer" style="padding-top: 40px; padding-left: 40px; height: 370px; width: 90%;"></div><br><br><br>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


  <div class="container table-active ">
  <h3 class="text-center center-x pt-5">Listagem de Campanhas</h3>
  <div class="row pt-5" > 
  
  <?php foreach ($campanhas as $campanha) : ?>
  <div class="col-md-4 center-text padding-left-10 mt-6">
    <h6>Usuário</h6>
    <label><?php echo $campanha['email'];?></label>
    <h6>Nome da campanha</h6>
    <label><?php echo $campanha['titulo'];?></label>
    <h6>Investimento</h6>
    <label><?php echo $campanha['investimento'];?></label>
    <h6>Categoria</h6>
    <label><?php echo $campanha['categoria'];?></label>
      <br>
      <a href="<?= base_url('users/set_destaque?id='.$campanha['id'])?>">
        <button>Tornar Destaque</button>
      </a>
    <hr>
  </div>
  <?php endforeach; ?>
  </div>    
  </div>

<div class="container table-active ">
    <h3 class="text-center center-x pt-5">Listagem de Destaques</h3>
    <div class="row pt-5" >

        <?php foreach ($destaques as $destaque) : ?>
            <div class="col-md-4 center-text padding-left-10 mt-6">
                <img width="300" height="200" src="<?= base_url() .'uploads/'.$destaque['nome_thumbnail']; ?>">
                <br><br>
                <h6>Nome da campanha</h6>
                <label><?php echo $destaque['titulo'];?></label>
                <h6>Descrição</h6>
                <label><?php echo $destaque['descricao'];?></label>
                <h6>Email</h6>
                <label><?php echo $destaque['email'];?></label>
                <br>
                <a href="<?= base_url('users/delete_destaque?id='.$destaque['destaques_id'])?>">
                    <button>Tirar destaque</button>
                </a>
                <hr>

            </div>
        <?php endforeach; ?>
    </div>
</div>


<div class="container table-active ">
    <h3 class="text-center center-x pt-5">Ranking</h3>
    <div class="row pt-5" >

        <?php foreach ($users as $key=>$user) : ?>
            <div class="col-md-4 center-text padding-left-10 mt-6">
                <img width="300" height="200" src="<?= base_url() .'uploads/'.$user['file']; ?>">

                <h6>Nome</h6>
                <label><?php echo $user['nome'];?></label>
                <h6>Descrição</h6>
                <label><?php echo $user['descricao'];?></label>
                <h6>Data Inicio</h6>
                <label><?php echo $user['data_inicio'];?></label>
                <h6>Data encerramento</h6>
                <label><?php echo $user['data_encerramento'];?></label>
                <br>
                <hr>

            </div>
        <?php endforeach; ?>
        <br>

    </div>
    <div  class="row pt-5 padding-left-10">
        <a href="<?= base_url('pages/patrocinio')?>">
            <button>Adicionar</button>
        </a>
    </div>
</div>
