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

class SetupFinish  extends Langue{
    
    public function form(){
        
        $lg = $_SESSION['doorgetsLangue'];
        $this->setLangue($lg);
        
        $out = '';
        $formGen = new Formulaire('generate');
        if(
            !empty($formGen->i) && empty($formGen->e)
        ){
            
            $fileTemp = THM.'setup/temp/host.php';
            if(is_file($fileTemp)){
                
                $cFile = file_get_contents($fileTemp);
                $DBinfo = unserialize($cFile);
                
                $queryUpdate = '';
                $fileTempWebsite = THM.'setup/temp/website.php';
                if(is_file($fileTemp)){
                    
                    // Initialisation de l'objet traitement
                    $Traitement = new installDatabase();
                    
                    $cFileWS = file_get_contents($fileTempWebsite);
                    $WSinfo = unserialize($cFileWS);
                    
                    $fileTempAdm = THM.'setup/temp/admin.php';
                    if(is_file($fileTempAdm)){
                        
                        $cFileAdm = file_get_contents($fileTempAdm);
                        $cOutFileAdm = unserialize($cFileAdm);
                        
                        $WSinfo['email'] = $cOutFileAdm['email'];
                        $WSinfo['langue'] = $_SESSION['doorgetsLangue'];
                        $WSinfo['langue_front'] = $_SESSION['doorgetsLangue'];
                        
                        $queryUpdate = $Traitement->createSqlQuery('_website',$WSinfo);
                        
                        // Installation de la base de données
                        $Traitement->install($DBinfo['hote'],$DBinfo['name'],$DBinfo['login'],$DBinfo['pwd'],$queryUpdate);
                        
                        // Décompresssion du zip
                        $Traitement->Unzip();
                        
                        // Suppression de la session
                        $_SESSION = array();
                        
                        // Suppression de l'installeur
                        $Traitement->destroy_dir('./setup');
                        $urlRedic = $_SERVER['REQUEST_URI'];
                        $urlRedic = str_replace('index.php','',$urlRedic);
                        // redirection vers l'administrateur
                        header("Location:".$urlRedic.'admin/');
                        exit();
                        
                    }
                    
                }
                
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
        
        $ViewFileFinish = CLA.'template/step7.finish.tpl.php';
        ob_start();
        include $ViewFileFinish;
        $out = ob_get_clean();
        
        
        return $out;
        
    }
    
}