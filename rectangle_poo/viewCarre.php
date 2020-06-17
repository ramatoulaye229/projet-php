
 <?php


    if( isset($_POST['btn_submit'])){

        if($_POST['btn_submit']==="calcul"){

        $validator=new Validator();

        $longueur=$_POST['longueur'];
      
          $validator->is_empty($longueur,'longueur');
         if($validator->is_valid()){
                   $validator->is_positif( $longueur,'longueur');
                   if($validator->is_valid()){
                      $carre=new Carre($longueur);
                      $id= $_SESSION['id'];
                      $id++;
                      $_SESSION["Resultat".$id]=$carre;
                    
                      $_SESSION['id']=$id;
                   }
           
         }
         $errors=$validator->getErrors();

            if(isset($errors['longueur'])){
                $longueur="";
            }

        }else{
            session_destroy();
        }
    }


 ?>



         <div class="container mt-5">

        
             <form method="post" action="">
                 <div class="form-group row">
                     <label for="inputName" class="col-sm-1-12 col-form-label">Longueur</label>
                     <div class="col-6 ml-2">
                         <input type="text" class="form-control" name="longueur" value="<?=$longueur?>" id="inputName" placeholder="">
                     </div>
            <?php if(isset($errors['longueur'])){


            ?>
                     <div class="alert alert-danger col-4">
                         <strong>Erreur</strong> <?php echo $errors['longueur'];?>
                     </div>
             <?php
            }
            ?>

                 </div>
                 

                 <div class="form-group row">
                     <div class="offset-sm-2 col-sm-2">
                         <button type="submit" name="btn_submit" value="calcul" class="btn btn-primary">Calculer</button>
                     </div>
                     <div class="col-sm-2">
                         <button type="submit" name="btn_submit" value="reinitialisation" class="btn btn-secondary">Reinitialiser</button>
                     </div>
                 </div>
             </form>
         </div>
<?php
      if( isset($_POST['btn_submit']) && $_POST['btn_submit']==="calcul" && count($errors)===0) {
?>
        <table class="table container table-bordered">
            <thead>
                <tr>
                    <th>Demi-Perimetre</th>
                    <th>Perimetre</th>
                    <th>Surface</th>
                    <th>Diagonale</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($_SESSION as $key=> $carre) {
                    if($key!=="id")  {
            ?>
                <tr>
                    <td scope="row"><?=$carre->demiPerimetre()?></td>
                    <td><?=$carre->perimetre()?></td>
                    <td><?=$carre->surface()?></td>
                    <td><?=$carre->diagonale()?></td>
                </tr>

                <?php
                }
                }
                ?>

            </tbody>
        </table>

    <?php
       }
 ?>
