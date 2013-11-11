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
    <div class="doorGets-top-title-content">
            doorGets 5.1
        </div>
    <div class="doorGets-title-content">
        2/5 - {{!$doorgets->l("Vérification de vos droits d'écriture")!}}
    </div>
    {{?($this->isChmod777()):}}
        <div class="info-ok">
            {{!$doorgets->l("Vous avez bien les droits d'écriture !")!}}
        </div>
        {{!$doorgets->form['doorgets_chmod']->open('post','','')!}}
            {{!$doorgets->form['doorgets_chmod']->input('','hidden','hidden','1')!}}
            <div class="separateur-tb"></div>
            <div class="separateur-tb"></div>
            {{!$doorgets->form['doorgets_chmod']->submit($doorgets->l('Etape suivante'),'','submit-next')!}}
        {{!$doorgets->form['doorgets_chmod']->close()!}}
    {??}
        <div class="info-no-ok">
            {{!$doorgets->l("Votre dossier n'a pas les droits d'écriture...")!}}
        </div>
        <div class="separateur-tb"></div>
    {?}
    {{!$doorgets->getHtmlGoBack()!}}
</div>