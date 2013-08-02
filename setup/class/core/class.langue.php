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

class Langue{
    
    public $GetLangue;
    
    private $w = array();
    
    private $wDefaut = array();
    
    public function __construct(){
        
        
        
    }
    
    public function setLangue($lg = 'en'){
        
        $this->GetLangue = $lg;
        
        $fileLangue = THM.'setup/langue/'.$this->GetLangue.'.php';
        $fileLanguePrincipale = THM.'setup/langue/fr.php';
        
        include $fileLanguePrincipale;
        
        $this->w = $w;
        $this->wDefaut = $w;
        
        if( $fileLanguePrincipale !== $fileLangue && is_file($fileLangue) ){
            
            include $fileLangue;
            $this->w = $w;
            
        }
        
    }
    
    public function GetLangue(){
        
        return $this->GetLangue;
        
    }
    
    
    public function getWords($word = ''){
        
        if(in_array($word,$this->wDefaut)){
            
            $key = array_search($word,$this->wDefaut);
            
            if(array_key_exists($key,$this->w)){
                return $this->w[$key];
            }
            
        }
        
        return $word;
        
    }
    
}