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


class Setup{
    
    private $step;
    
    private $lg;
    
    private $get;
    
    public function __construct(){
        
        $this->loadLg();
        $this->loadStep();
        $this->get = $this->getContent();
        
    }
    
    public function step(){
        
        return $this->step;
    
    }
    
    public function lg(){
        
        return $this->lg;
    
    }
    
    public function get(){
        
        return $this->get;
    
    }
    
    private function loadStep(){
        
        if( !array_key_exists('doorgetsStep',$_SESSION) ){
            
            $_SESSION['doorgetsStep'] = 1;
            
        }
        
        $this->step = $_SESSION['doorgetsStep'];
        
    }
    
    private function loadLg(){
        
        if( !array_key_exists('doorgetsLangue',$_SESSION) ){
            
            $_SESSION['doorgetsLangue'] = 'en';
            
        }
        
        $this->lf = $_SESSION['doorgetsLangue'];
        
    }
    
    private function getContent(){
        
        $out = '';
        $step = $this->step();
        
        switch($step){
            
            case 1:
                $chooseLangue = new ChooseLangue();
                $out .= $chooseLangue->form();
                break;
            
            case 2:
                $isLicence = new Licence();
                $out .= $isLicence->form();
                break;
            
            case 3:
                $isWritten = new TestWritte();
                $out .= $isWritten->form();
                break;
            
            case 4:
                $isDatabase = new TestDatabase();
                $out .= $isDatabase->form();
                break;
            
            case 5:
                $isWebsite = new Website();
                $out .= $isWebsite->form();
                break;
            
            case 6:
                $isAdmin = new Administration();
                $out .= $isAdmin->form();
                break;
            
            case 7:
                $isSetupFinish = new SetupFinish();
                $out .= $isSetupFinish->form();
                break;
            
        }
        
        return $out;
        
    }
    
}