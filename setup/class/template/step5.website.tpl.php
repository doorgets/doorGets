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
    <?php print $this->getWords('Site Web'); ?>
</div>
<div class="info">
    
    <?php print $form->input($this->getWords("Titre").'<br />','title','text',$this->info['title']); ?>
    <br />
    <?php print $form->input($this->getWords("Slogan").'<br />','slogan','text',$this->info['slogan']); ?>
    <br />
    <?php print $form->input($this->getWords("Description").'<br />','description','text',$this->info['description']); ?>
    <br />
    <?php print $form->input($this->getWords("Copyright").'<br />','copyright','text',$this->info['copyright']); ?>
    <br />
    <?php print $form->input($this->getWords("Année de création").'<br />','year','text',$this->info['year']); ?>
    <br />
    <?php print $form->input($this->getWords("Mots clés").'<br />','keywords','text',$this->info['keywords']); ?>
        
</div>

<div class="titre">
    <?php print $this->getWords('Localisation'); ?>
</div>
<div class="info">

    <?php print $form->input($this->getWords('Pays').' <br />','pays','text',$this->info['pays']); ?>
    <br />
    <?php print $form->input($this->getWords('Ville').' <br />','ville','text',$this->info['ville']); ?>
    <br />
    <?php print $form->input($this->getWords('Code Postal').' <br />','codepostal','text',$this->info['codepostal']); ?>
    <br />
    <?php print $form->input($this->getWords('Adresse').' <br />','adresse','text',$this->info['adresse']); ?>
    <br />
    <?php print $form->input($this->getWords('Telephone fixe').' <br />','tel_fix','text',$this->info['tel_fix']); ?>
    <br />
    <?php print $form->input($this->getWords('Telephone mobile').' <br />','tel_mobil','text',$this->info['tel_mobil']); ?>
    <br />
    <?php print $form->input($this->getWords('Telephone fax').' <br />','tel_fax','text',$this->info['tel_fax']); ?>
    
</div>

<div class="titre">
    <?php print $this->getWords('Réseaux Sociaux'); ?>
</div>
<div class="info_" >

    <?php print $form->input('http://www.facebook.com/','facebook','text',$this->info['facebook']); ?>
    <br /><br />
    <?php print $form->input('http://www.twitter.com/','twitter','text',$this->info['twitter']); ?>
    <br /><br />
    <?php print $form->input('http://www.youtube.com/user/','youtube','text',$this->info['youtube']); ?>
    <br /><br />
    <?php print $form->input('https://plus.google.com/u/0/','google','text',$this->info['google']); ?>

</div>

<div class="titre">
    <?php print $this->getWords('Statistiques'); ?>
</div>
<div class="info_" ><?php 

    print $form->input($this->getWords('Votre code Google Analytics').' : ','analytics','text',$this->info['analytics']);
    print "<p>".$this->getWords("Google Analytics est un service d'analyse de sites web gratuit proposé par Google")."</p>";
    print "<p>".$this->getWords("Créer votre compte gratuitement sur :").' <a target="blank" href="http://www.google.com/analytics/">http://www.google.com/analytics/</a></p>'; 

?></div>


<div class="footer right" ><?php 

    print $form->input('','step','hidden',6);
    print $form->submit($this->getWords('Suivant')); 
    
?></div>

<?php print $form->close(); ?>

<div  class="previous_bt" ><?php

    print $formPrev->open('post','','');
    print $formPrev->input('','step','hidden',4);
    print $formPrev->submit($this->getWords('Précédent'));
    print $formPrev->close();
    
?></div>