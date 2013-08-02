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
?><?php print $formAdmin->open(); ?>
<div class="titre"><?php

    print $this->getWords("Identifiants pour votre systeme d'aministration");
    
?></div>
<div class="info "><?php
    
    print $formAdmin->input($this->getWords("Adresse email").'<br />','email','text',$this->info['email']);
    print $formAdmin->input($this->getWords("Login").'<br />','login','text',$this->info['login']);
    print $formAdmin->input($this->getWords("Mot de passe").'<br />','password','text',$this->info['password']);
    
?></div>

<div class="footer right" ><?php

    print $formAdmin->input('','setup','hidden',7);
    print $formAdmin->submit($this->getWords('Suivant'));
    
?></div>
<?php print $formAdmin->close(); ?>

<div  class="previous_bt" ><?php

    print $formPrev->open('post','','');
    print $formPrev->input('','step','hidden',5);
    print $formPrev->submit($this->getWords('Précédent'));
    print $formPrev->close();
    
?></div>