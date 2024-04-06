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
                </div>
                <div> 
                    <label for="">Type</label><br>
                    <select name="type" id="">
                            <?php foreach($types as $value):?>
                               <option value="<?=$value["type"]?>" ><?=$value["type"]?></option>
                            <?php endforeach;?>
                    </select>
                </div>
        
              <input type="hidden" name="controller" value="user_connect">
              <button class="butt" type="submit" name="action" value="add-demande">Enregister</button>
        
            </form>
        </div>
        
    </div>