<?php
   function __autoload($class_name){
      require_once 'classes/'. $class_name . '.php';
   }
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Calouro</title>
      <link rel="stylesheet" href="css/bulma.min.css">
      <link rel="stylesheet" href="css/estilo.css">
      <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
   </head>
   <body class="has-background-white-ter">

    <?php
    $aluno = new Aluno();
    if(isset($_POST['cadastro'])):
        $matricula = $_POST['matricula']; 
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];


        $aluno->setId($matricula);
        $aluno->setNome($nome);
        $aluno->setTelefone($telefone);
        $aluno->setEndereco($endereco);

        if($aluno->insert()){
            echo "Aluno Inserido com sucesso!";
        }
        header("Location: aula.php?matricula=".$matricula);     
    endif;
    ?>

      <section class="hero is-primary">
         <div class="hero-body">
            <div class="container has-text-centered">
               <h1 class="title">
                  Cadastro do aluno                    
               </h1>               
            </div>
         </div>
      </section>
      <!-- id_matricula, nome, telefone, endereco -->
      <section class="section">
         <div class="container">

            <form action="" method="post">
               <div class="field">
                  <label class="label">Matricula</label>
                  <div class="control">
                     <input class="input" type="text" name="matricula"  placeholder="alu000000000">
                  </div>
                  <label class="label">Nome</label>
                  <div class="control">
                     <input class="input" type="text" name="nome"  placeholder="John Doe">
                  </div>
                  <label class="label">Telefone</label>
                  <div class="control">
                     <input class="input" type="text" name="telefone"  placeholder="51 9236.6684">
                  </div>
                  <label class="label">Endereco</label>
                  <div class="control">
                     <input class="input" type="text" name="endereco"  placeholder="Av. Joao Paulo I">
                  </div>
               </div>
               <div class="field">
                  <div class="control">
                     <input class="button is-link" type="submit" name="cadastro"  value="Cadastrar">
                  </div>
               </div>
            </form>

         </div>
      </section>
      
   </body>
</html>