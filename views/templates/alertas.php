<?php

    foreach($alertas as $key => $msj):
        foreach($msj as  $ms):
?>
    <div class="alert <?php echo $key;?>">
            <?php echo $ms;  ?>
    </div>

<?php
        endforeach;    
    endforeach    
?>