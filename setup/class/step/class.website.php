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

class Website extends Langue{
    
    public $info = array();
    
    public function __construct(){
        
        $array['title'] = '';
        $array['slogan'] = '';
        $array['description'] = '';
        $array['copyright'] = '';
        $array['year'] = '';
        $array['keywords'] = '';
        
        $array['email'] = '';
        $array['pays'] = '';
        $array['ville'] = '';
        $array['adresse'] = '';
        $array['tel_fix'] = '';
        $array['tel_mobil'] = '';
        $array['tel_fax'] = '';
        $array['codepostal'] = '';
        
        $array['facebook'] = '';
        $array['youtube'] = '';
        $array['twitter'] = '';
        $array['google'] = '';
        
        $array['analytics'] = '';
        $array['theme'] = 'alpha';
        
        $this->info = $array;
        
        $fileTemp = THM.'setup/temp/website.php';
        if(is_file($fileTemp)){
            $cFile = file_get_contents($fileTemp);
            $cOutFile = unserialize($cFile);
            if( is_array($cOutFile) ){
                $this->info = array_merge($array,$cOutFile);
            }
            
        }
        
    }
    
    
    public function form(){
        
        $lg = $_SESSION['doorgetsLangue'];
        $this->setLangue($lg);
        
        $out = '';
        
        $form = new Formulaire('website');
        
        if(
           !empty($form->i) && empty($form->e)
        ){
            
            if( empty($form->i['title']) ){
                $form->e['website_title'] = 'ok';
            }
            if( empty($form->i['slogan']) ){
                $form->e['website_slogan'] = 'ok';
            }
            if( empty($form->i['description']) ){
                $form->e['website_description'] = 'ok';
            }
            if( empty($form->i['keywords']) ){
                $form->e['website_keywords'] = 'ok';
            }
            if( empty($form->i['copyright']) ){
                $form->e['website_copyright'] = 'ok';
            }
            if( empty($form->i['year']) ){
                $form->e['website_year'] = 'ok';
            }
            
            if(empty($form->e) ){
                
                $fileTemp = THM.'setup/temp/website.php';
                
                $_SESSION['doorgetsStep'] = $form->i['step'];
                unset($form->i['step']);
                
                $isDatabaseConnect = serialize($form->i);
                file_put_contents($fileTemp,$isDatabaseConnect);
                
                header("Location:".$_SERVER['REQUEST_URI']);
                exit();
            }
        }
        
        $formPrev = new Formulaire('previous');
        if(
            !empty($formPrev->i) && empty($formPrev->e)
        ){
            
            $_SESSION['doorgetsStep'] = $formPrev->i['step'];
            
            header("Location:".$_SERVER['REQUEST_URI']);
            exit();
            
        }
        
        $ViewFileWebsite = CLA.'template/step5.website.tpl.php';
        ob_start();
        include $ViewFileWebsite;
        $out = ob_get_clean();
        
        return $out;
    }
    
    
    
}