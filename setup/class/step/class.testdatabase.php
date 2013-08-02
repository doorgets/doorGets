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

class TestDatabase extends Langue{
    
    public $val = 0;
    
    private $host;
    
    private $login;
    
    private $pwd;
    
    private $info;
    
    public function __construct(){
        
        $lg = $_SESSION['doorgetsLangue'];
        $this->setLangue($lg);
        
        $array['hote'] = '';
        $array['name'] = '';
        $array['login'] = '';
        $array['pwd'] = '';
        $array['prefix'] = '';
        
        $this->info = $array;
        
        $fileTemp = THM.'setup/temp/host.php';
        if(is_file($fileTemp)){
            $cFile = file_get_contents($fileTemp);
            $cOutFile = unserialize($cFile);
            if( is_array($cOutFile) ){
                $this->info = array_merge($array,$cOutFile);
            }
            
        }
        
        
    }
    
    public function test($host="localhost",$database="",$login="root",$pwd=""){
        
        try{
            
            $con = @mysql_connect($host,$login,$pwd);
            if(!empty($con)){
                
                $db_selected = mysql_select_db($database, $con);
                if ($db_selected) {
                   $this->val = 1;
                }
                
            }
            
        }catch(Exception $e){  }
        
    }
    
    public function form(){
        
        $out = '';
        
        $form = new Formulaire('database');
        
        if( !empty($form->i) ){
                
            if( empty($form->i['hote']) ){
                $form->e['database_hote'] = "ok";
            }
            if( empty($form->i['login']) ){
                $form->e['database_login'] = "ok";
            }
            if( empty($form->i['name']) ){
                $form->e['database_name'] = "ok";
            }
            
            if( empty($form->e) ){
                
                $this->test($form->i['hote'],$form->i['name'],$form->i['login'],$form->i['pwd']);
                
            }
            if(!empty($this->val)){
                
                if(array_key_exists('step',$form->i)){
                    
                    $fileTemp = THM.'setup/temp/host.php';
                    
                    $_SESSION['doorgetsStep'] = $form->i['step'];
                    unset($form->i['step']);
                    
                    $isDatabaseConnect = serialize($form->i);
                    file_put_contents($fileTemp,$isDatabaseConnect);
                    
                    header("Location:".$_SERVER['REQUEST_URI']);
                    exit();
                    
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
        
        $ViewFileDatabase = CLA.'template/step4.database.tpl.php';
        ob_start();
        include $ViewFileDatabase;
        $out = ob_get_clean();
        
        return $out;
        
    }
    
}