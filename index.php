<?php
    include_once("templates/header.php")
?>

   <div class="container">
    <?php if(isset($printMSG) && $printMSG != ''): ?>
        <p id="msg"><?php $printMSG ?></p>        
    <?php endif; ?>

    <h1 id="man-title">Minha agenda</h1>
    <?php if(count($contacts) > 0): ?>

        <table class="table" id="contacts-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
        </table>




        <p>TEM CONTATOS</p>
    <?php else: ?>
        <p id="empty-list-text">Ainda não há contatos na sua agenda, <a href="<?= $BASE_URL ?>./create.php">Clique aqui para adicionar</a></p>
        
    <?php endif; ?>
   </div>

<?php
include_once("templates/footer.php")
?>


    
