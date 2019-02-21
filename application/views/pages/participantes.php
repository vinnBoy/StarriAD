<div class="col-md-12 center-x">
    <h2> <?php echo $title; ?> </h2>
</div>

<div class="container table-active ">
    <h3 class="text-center center-x pt-5">Listagem de Participantes</h3>
    <div class="row pt-5" >

        <?php foreach ($patrocinios as $key=>$value) : ?>
            <div class="col-md-4 center-text padding-left-10 mt-6">
                <h6>Posição</h6>
                <label><?php echo $key + 1;?></label>
                <h6>Usuário</h6>
                <label><?php echo $value['nome'];?></label>
                <h6>Nome da campanha</h6>
                <label><?php echo $value['pontos'];?></label>

                <hr>
            </div>
        <?php endforeach; ?>
    </div>
</div>



</div>
<!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->



