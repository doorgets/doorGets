<?php

/**
 *
    doorGets CMS V4.1 - 28 feb 2013
    doorGets it's free PHP Open Source CMS Final for tutorial and blog
    
    Copyright (C) 2012 - 2013  Mounir R'Quiba from Paris

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
     any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
    
    Website exemple : http://www.professeur-php.com
    Website info : http://www.doorgets.com
    
    Contact Mounir R'Quiba : professeurphp@gmail.com
    
    OPEN MIND IS GOOD, OPEN SOURCE IS BETTER ;)

**/
?><?php print $form->open('post','',''); ?>
<div class="titre"><?php print $this->getWords('Connectez votre base de données'); ?></div>
<div class="info">
<?php
    if( !empty($form->i) ){
        
        if(!empty($this->val)){
            ?>
            <div style="border-bottom:solid 1px #ccc;margin-bottom:15px;">
                <img src="setup/img/valide.png" style="vertical-align:middle;margin-right:10px;" >
                <?php print $this->getWords("Votre connexion est établie"); ?>
            </div>
            <?php
        }else{
            ?>
            <div style="border-bottom:solid 1px #ccc;margin-bottom:15px;">
                <img src="setup/img/invalide.png" style="vertical-align:middle;margin-right:10px;" >
                <?php print $this->getWords("La connexion n'à pas pu etre établie"); ?>
            </div>
            <?php
        }
        
    }
        
    print $form->input($this->getWords("Hôte").'<br />','hote','text',$this->info['hote']);
    
    print $form->input($this->getWords("Nom de la base").'<br />','name','text',$this->info['name']);
    
    print $form->input($this->getWords("Login").'<br />','login','text',$this->info['login']);
    
    print $form->input($this->getWords("Mot de passe").'<br />','pwd','text',$this->info['pwd']);
    
    print $form->input($this->getWords("Prefix").'<br />','prefix','hidden',$this->info['prefix']);
?>    
</div>

<div class="footer right" ><?php 

    if(!$this->val){  
        
        print $form->submit($this->getWords('Tester la connexion'));
        
    }else{ 
        
        print $form->input('','step','hidden',5);
        print $form->submit($this->getWords('Suivant')); 
    }
    
?></div>

<?php print $form->close(); ?>

<div  class="previous_bt" ><?php

    print $formPrev->open('post','','');
    print $formPrev->input('','step','hidden',3);
    print $formPrev->submit($this->getWords('Précédent'));
    print $formPrev->close();
    
?></div>