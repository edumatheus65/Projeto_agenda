<?php
  include_once('templates/header.php');
?>

    <div class="container">
      <?php include_once("templates/backbtn.html"); ?>
      <h1 id="main-title">Criar contato</h1>
      <form action="<?= $BASE_URL ?>config/process.php" method="POST">

        <input type="hidden" name="type" value="create">
        <div class="form-group">
            <label for="name">Nome do contato</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" required>
        </div>
        <div>
          <label for="phone">Numero de telefone</label>
          <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o telefone" required>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
    </div>
    

<?php
  include_once('templates/footer.php');
?>
