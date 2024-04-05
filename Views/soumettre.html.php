<?php
         if(isset($_SESSION['errors'])){
            $errors=$_SESSION['errors'];
            unset($_SESSION['errors']);
            
        }
?>   
       

<div class="box3C">
        <div class="form_title">
            <p>Soumettre une demande</p>
            <form method="post" action="<?=WEBROOT?>">
                <div>
                    <label for="">Motif</label><br>
                    <textarea type="text" name="motif" class="put"></textarea><br>
                    <div class="text-danger"><?= isset($errors['motif'])?$errors['motif']:""; ?></div>
                </div>
                <div> 
                    <label for="">Date</label><br>
                    <input type="date" name="date"><br>
                    <div class="text-danger"><?= isset($errors['date'])?$errors['date']:""; ?></div>
                </div>
        
              <input type="hidden" name="controller" value="user_connect">
              <button class="butt" type="submit" name="action" value="add-demande">Enregister</button>
        
            </form>
        </div>
        
    </div>