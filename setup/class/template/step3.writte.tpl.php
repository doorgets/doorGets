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
<div class="titre">

    <?php print $this->getWords("Test de vos droits d'écriture"); ?>
    
</div>
<div class="info"><?php
    if( !empty($this->val) ){ 
        print '<img src="setup/img/valide.png" style="vertical-align:middle;margin-right:10px;" >';
        print $this->getWords("Votre dossier est bien en mode écriture.");
    }else{
        print '<img src="setup/img/invalide.png" style="vertical-align:middle;margin-right:10px;" >';
        print $this->getWords("Votre dossier n'a pas les droits d'écriture...");
    }
?></div>
<?php if( !empty($this->val) ){ ?>
    <div class="footer right" >
        <?php print $form->input('','step','hidden',4); ?>
        <?php print $form->submit($this->getWords('Suivant')); ?>
    </div>
<?php } ?>
<?php print $form->close(); ?>

<div class="previous_bt" >
    <?php
        if( empty($this->val) ){  print '<br /><br /><br />'; }
        print $formPrev->open('post','','');
        print $formPrev->input('','step','hidden',2);
        print $formPrev->submit($this->getWords('Précédent'));
        print $formPrev->close();
    ?>
</div>
