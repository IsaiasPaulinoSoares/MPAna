<?php
session_start();
?>


                    <?php
                    if(isset($_SESSION['nao_autenticado'])):
                    ?>

                    <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>