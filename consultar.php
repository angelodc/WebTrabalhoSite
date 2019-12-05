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
        
        if(isset($_GET['matricula'])):
            $matricula = $_GET['matricula'];
         endif;
      ?>


      <section class="hero is-primary">
         <div class="hero-body">
            <div class="container has-text-centered">
               <h1 class="title">
                  Consulte sua salas!                    
               </h1>               
            </div>
         </div>
      </section>

      <section class="section">
         <div class="container">

            <form action="" method="get">
               <div class="field">
                  <label class="label">Matricula</label>
                  <div class="control">
                     <input class="input" type="text" name="matricula"  placeholder="alu000000000">
                  </div>
               </div>
               <div class="field">
                  <div class="control">
                     <input class="button is-link" type="submit"   value="Buscar">
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
                     </tr>
                  </tbody>

                  <?php endforeach; ?> 
                
               </table>
               <?php } ?> 
               <a href="index.php"><button class="button is-info">Home</button></a>
               
               <?php 
                if(isset($_GET['matricula'])){
                    echo '<a href="aula.php?matricula='.$matricula.'">';
                
                ?><button class="button is-success">Alterar Aulas</button></a> <?php
                }
                ?>
            </div>
         </div>
      </section>
      
   </body>
</html>