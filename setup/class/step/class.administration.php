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

class Administration extends Langue{
    
    private $info;
    
    public function __construct(){
        
        $array['email'] = '';
        $array['login'] = '';
        $array['password'] = '';
        
        $this->info = $array;
        
        $fileTemp = THM.'setup/temp/admin.php';
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
        
        $formAdmin = new Formulaire('admin');
        
        if(
           !empty($formAdmin->i) && empty($formAdmin->e)
        ){
            
            if( empty($formAdmin->i['email']) ){
                $formAdmin->e['admin_email'] = 'ok';
            }
            if( empty($formAdmin->i['login']) ){
                $formAdmin->e['admin_login'] = 'ok';
            }
            if( empty($formAdmin->i['password']) ){
                $formAdmin->e['admin_password'] = 'ok';
            }
            $var = $formAdmin->i['email'];
            $isEmail = filter_var($var, FILTER_VALIDATE_EMAIL);
            if( empty($isEmail) ){
                
                $formAdmin->e['admin_email'] = 'ok';
                
            }
            
            if( empty($formAdmin->e) ){
                
                $fileTemp = THM.'setup/temp/admin.php';
                
                
                $isDatabaseConnect = serialize($formAdmin->i);
                file_put_contents($fileTemp,$isDatabaseConnect);
                
                $_SESSION['doorgetsStep'] = 7;
                
                $this->getConfigFile();
                
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
        
        $langue = $_SESSION['doorgetsLangue'];
        
        $ViewFileAdmin = CLA.'template/step6.administration.tpl.php';
        ob_start();
        include $ViewFileAdmin;
        $out = ob_get_clean();
        
        
        return $out;
        
    }
    
    private function getConfigFile(){
        
        
        $url = $sql_host = $sql_db = $sql_login = $sql_pwd = $sql_prefix = $adm_name = $adm_login = $adm_pwd = "";
        
        $fileTemp = THM.'setup/temp/admin.php';
        if(is_file($fileTemp)){
            
            $cFile = file_get_contents($fileTemp);
            $cOutFile = unserialize($cFile);
            
            $adm_login = $cOutFile['login'];
            $adm_pwd = $cOutFile['password'];
            
        }
        $fileTemp = THM.'setup/temp/host.php';
        if(is_file($fileTemp)){
            
            $cFile = file_get_contents($fileTemp);
            $cOutFile = unserialize($cFile);
            
            $sql_host = $cOutFile['hote'];
            $sql_db = $cOutFile['name'];
            $sql_login = $cOutFile['login'];
            $sql_pwd = $cOutFile['pwd'];
            $sql_prefix = $cOutFile['prefix'];
            
        }
        
        $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url = str_replace('index.php','',$url);
        
        $out = '<?php'."\r\n";
            $out .= "define('URL','$url');"."\r\n";
            $out .= "define('SQL_HOST','$sql_host');"."\r\n";
            $out .= "define('SQL_LOGIN','$sql_login');"."\r\n";
            $out .= "define('SQL_PWD','$sql_pwd');"."\r\n";
            $out .= "define('SQL_DB','$sql_db');"."\r\n";
            $out .= "define('SQL_PREFIX','$sql_prefix');"."\r\n";
            $out .= "define('USR_NAME','doorgets.com');"."\r\n";
            $out .= "define('USR_LOGIN','$adm_login');"."\r\n";
            $out .= "define('USR_PWD','$adm_pwd');"."\r\n";
        
        
        file_put_contents('setup/temp/setting.conf.php',$out);
        
        $zip = new ZipArchive;
        if ($zip->open('setup/data/doorgets.zip') === TRUE) {
            $zip->addFile('setup/temp/setting.conf.php','config/setting.conf.php');
            $zip->close();
        }
        
    }
    
}