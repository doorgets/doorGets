<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 5.1 - 27 October, 2013
    doorGets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2013 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : moonair@doorgets.com
    
/*******************************************************************************
    -= One life, One code =-
/*******************************************************************************
    
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
    
******************************************************************************
******************************************************************************/
?>
<div class="doorGets-content-wrapper">
    <?php echo $doorgets->form['doorgets_root']->open('post','',''); ?>
        <div class="doorGets-top-title-content">
            doorGets 5.1
        </div>
        <div class="separateur-tb"></div>
        <?php echo $doorgets->form['doorgets_root']->select($doorgets->l('Choisir votre langue').'<br >','language',$doorgets->getAllLanguages(),$doorgets->getLanguage()); ?>
        <div class="separateur-tb"></div>
        <?php echo $doorgets->form['doorgets_root']->select($doorgets->l('Choisir votre fuseau horaire').'<br >','time_zone',$this->getArrayZones(),$doorgets->getTimeZone()); ?>
        <div class="separateur-tb"></div>
        <div class="separateur-tb"></div>
        <?php echo $doorgets->form['doorgets_root']->submit($doorgets->l('Etape suivante'),'','submit-next');  echo $doorgets->form['doorgets_root']->close(); ?>
</div>