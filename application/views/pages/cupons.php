<div class="col-md-12 center-x">
    <h2> <?php echo $title; ?> </h2>
</div>

<div class="row ml-5  pt-5" >

</div>

<!-- Exibição de videos -->

<div class="container table-active mt-5">
<!--    <h3 class="text-center center-x ">Listagem de Cupons</h3>-->
    <div class="row pt-5" >



        <?php foreach($cupons as $cupom) : ?>
            <div class="col-md-4 padding-left-10 pb-5" >
                <h5><?php echo $cupom->nome; ?></h5>
                <label >Valor: R$<?php echo $cupom->valor; ?>,00</label><br>
                <label >Codigo: <?php echo $cupom->codigo; ?></label>
            </div>

        <?php endforeach; ?>

</div>

</div>
<!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->



