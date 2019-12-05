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
        
    $aula = new Aula();
    $aluno = new Aluno();

    $matricula = $_GET['matricula'];

    
    if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'):

        $aula_id = $_GET['aula_id'];
        if($aula->delete($matricula, $aula_id)){
            echo "Deletado com sucesso!";
        }

    endif;
    if(isset($_POST['cadastrar'])):

        $id_aula  = $_POST['aula'];

        # Insert
        if($aula->insert($matricula, $id_aula)){
            echo "Inserido com sucesso!";
        }

    endif;
    ?>
      <section class="hero is-primary">
         <div class="hero-body">
            <div class="container has-text-centered">
               <h1 class="title">
                  Cadastro da aula                    
               </h1>               
            </div>
         </div>
      </section>
      <!-- id_matricula, nome, telefone, endereco -->
      <section class="section">
         <div class="container">

            <form action="" method="post">
               <div class="field">
               <div class="select">
                    <select name="aula">
                    <?php foreach($aula->findAll() as $key => $value): ?>
                    
                        <?php echo '<option value="'.$value->id_aula.'">'.$value->nome.'</option>'; ?>

                    <?php endforeach; ?>                         
                    </select>
                </div>
               </div>
               <div class="field">
                  <div class="control">
                     <input class="button is-link" type="submit" name="cadastrar"  value="Cadastrar">
                  </div>
               </div>
            </form>
            <?php if(isset($_GET['matricula'])){ ?>
            <div class="table-container margin-top">
               <table class="table table is-bordered is-striped ">
                  <thead>
                     <tr>
                        <th>Nome:</th>
                        <th>Dia:</th>
                        <th>Turno:</th>
                        <th>Campus:</th>
                        <th>Sala:</th>
                        <th>Ações:</th>
                     </tr>
                  </thead>
               
                   <?php foreach($aula->acharID($matricula) as $key => $value): ?>
                    <?php $resultado = $aula->acharAula($value->fk_Aula_id_aula); ?>
                    
                  <tbody>
                     <tr>
                        <td><?php echo $resultado->nome; ?></td>
                        <td><?php echo $resultado->dia; ?></td>
                        <td><?php echo $resultado->turno; ?></td>
                        <td><?php echo $resultado->campus; ?></td>
                        <td><?php echo $resultado->numero; ?></td>
                        <td><?php echo "<a href=aula.php?matricula=".$matricula."&aula_id=".$value->fk_Aula_id_aula."&acao=deletar>Deletar</a>"; ?></td>                      
                     </tr>
                  </tbody>

                  <?php endforeach; ?> 
                
               </table>
               <?php } ?> 
               <a href="index.php"><button class="button is-info">Home</button></a>   
         </div>
      </section>
      
   </body>
</html>