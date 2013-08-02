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
?><div class="titre"><?php

    print $this->getWords("Générer mon site maintenant");
    
?></div>
<div class="info center"><?php
    $img = '<img src="'.THM.'setup/img/gen.png" style="vertical-align:middle;margin-right:-35px;">';
    print $formGen->open('post','','');
        print $formGen->input('','step','hidden',6);
        print $img;
        print $formGen->submit($this->getWords('Générer mon site maintenant'),'width:auto;padding:5px 15px;cursor:pointer;border-radius:5px;font-size:13pt;font-weight:bold;background:#f1f1f1;');
    print $formGen->close();
    
    
?></div>

<div class="footer finish" ><?php

    print $formPrev->open('post','','');
        print $formPrev->input('','step','hidden',6);
        print $formPrev->submit($this->getWords('Précédent'));
    print $formPrev->close();
    
?></div>