<div class="c-2-2">

  <h2 class="title">Pedidos</h2>

  <form id="pesquisa-pedidos" action="<?php echo base_url() . 'gerente/pedidos/resultado' ?>" method="POST">
    <div class="admin-pesquisa">

      <p>2. Pedidos efetuados entre :</p>

      <div>
        <input class="datepicker" id="date1" name="date1" type="text"/>
        <br>

        <p>e</p>
        <input class="datepicker" id="date2" name="date2" type="text"/>
      </div>

      <div class="clear"></div>
      <div class="buttonspacer c">
        <input type="submit" class="btn-pay" value="Pesquisar Pedidos"/>
      </div>
    </div>
  </form>

</div>
</div>
</div>