<?php
    include_once __DIR__ . '/../templates/barra.php'
?>

<h2>Buscar citas</h2>
<div class="busqueda">
    <form class="formulario" action="">
        <label for="fecha">Fecha</label>
        <div class="campo">
            <input 
            type="date"
            id="fecha"
            name="fecha">
        </div>
    </form>
</div>
<div id="citas-admin">
    <ul class="citas">
        <?php
            $idCita =0;
            foreach($citas as $key => $cita){
                if($idCita !== $cita->id){
                $total =0;
        ?>
            <li>
               <h3>Cita</h3>
               <p>ID: <span><?php echo $cita->id; ?></span></p> 
               <p>Hora: <span><?php echo $cita->hora; ?></span></p> 
               <p>Cliente: <span><?php echo $cita->cliente; ?></span></p> 
               <p>Email: <span><?php echo $cita->email; ?></span></p> 
               <p>Telefono: <span><?php echo $cita->telefono; ?></span></p> 


               <!-- <h3><span> Servicios </span> </h3> -->
            <?php 
            $idCita = $cita->id;
            } 
                $total += $cita->precio;
            ?>  <!--fin if-->
              <p>Servicio: <span><?php echo $cita->servicio . " ". $cita->precio; ?></span></p>

            <?php
                $actual = $cita->id;
                $proximo = $citas[$key +1]->id ?? 0;

                if(esUltimo($actual, $proximo)){ ?>

                <p class="total">Total: <span>$ <?php echo $total; ?></span></p>
                <?php } ?>
                
            
            </li>
            <?php  }?>  <!--fin foreach-->
    </ul>
</div>

<?php
    $script = "<script src='build/js/buscador.js'></script>"
?>