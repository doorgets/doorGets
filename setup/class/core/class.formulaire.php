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

class Formulaire{
    
    public $name;
    public $i = array();
    public $e = array();
    public $info = array();
    
    public function __construct($name){
        
        $this->name = $name;
        $this->view($name);
    }
    
    public function open($method="post",$action="",$enctype = 'enctype="multipart/form-data"'){
        
        $name = $this->name;
        return '<form '.$enctype.' id="'.$name.'" name="'.$name.'" method="'.$method.'" action="'.$action.'">';
    }
    
    public function close(){
        
        return '</form>';
    
    }
    
    public function submit($value,$style=""){
        
        $name = $this->name.'_submit';
        return '<input type="submit" id="'.$name.'" name="'.$name.'" value="'.$value.'" style="'.$style.'" >';
    }
    
    public function input($label,$name,$type="text",$value="",$class=""){
        
        $input = '';
        $valueTemp = $value;
        $name = $this->name.'_'.$name;
        $style = '';
        $styleLabel = '';
        if(isset($_POST[$name])){
            $value = $_POST[$name];
            if(!empty($this->e[$name])){
                $styleLabel = 'style="color:#ff0000;"';
                $style = 'style="border:solid 2px #ff0000;"';
                $value = $valueTemp;
            }
        }
        
        if($type !== 'hidden'){
            $input .= "\r\n\t\t<label $styleLabel >$label</label>";
        }
        
        $input .= '<input type="'.$type.'" id="'.$name.'" name="'.$name.'" value="'.$value.'" class="'.$class.'" '.$style.' >';
        return $input;
        
    }
    
    public function file($label,$name){
        
        $name = $this->name.'_'.$name;
        $style = '';
        $styleLabel = '';
        if(isset($_FILES[$name])){
            
            if(!empty($this->e[$name])){
                $styleLabel = ' style="color:#ff0000;" ';
                $style= ' style="border: solid 2px #ff0000;" ';
                
            }
        }
        
        $input = "<label $styleLabel >$label</label>";
        $input .= '<input type="file" id="'.$name.'" name="'.$name.'" '.$style.' >';
        
        return $input;
        
    }
    
    public function textarea($label,$name,$value="",$class="",$style=''){
        
        $rest = substr($name, -8); 
        if($rest === '_tinymce' && !empty($this->i)){
            
            $value = $value ;
            
        }
        if($rest !== '_tinymce'){
            $value = Convertag::in($value);
        }
        
        $valueTemp = $value;
        $name = $this->name.'_'.$name;
        $style = '';
        $styleLabel = '';
        
        if(isset($_POST[$name])){
            $value = $_POST[$name];
            if(!empty($this->e[$name])){
                $styleLabel = 'style="color:#ff0000;"';
                $style = 'style=" border:solid 2px #ff0000; "';
                $value = $valueTemp;
            }
        }
        
        
        $textarea = '';
        if(!empty($label)){
            $textarea = '<label '.$styleLabel.' >'.$label.'</label>';
        }
        $textarea .= '<textarea id="'.$name.'" name="'.$name.'" class="'.$class.'" '.$style.' >'.$value.'</textarea>';
        
        
        return $textarea;
    }
    
    public function select($label,$name,$option = array(),$value=""){
        
        
        $valueTemp = $value;
        $name = $this->name.'_'.$name;
        $style = '';
        $styleLabel = '';
        $obli = '';
        
        $formName = $this->name;
        
        if(isset($_POST[$name])){
            $value = trim(htmlentities($_POST[$name],ENT_NOQUOTES));
            if(!empty($this->e[$name])){
                $styleLabel = 'style="color:#ff0000;"';
                $style = 'style="border:solid 2px #ff0000;"';
                $value = $valueTemp;
            }
        }
        
        
        $select = "<label $styleLabel >$label</label>";
        
        $select .= "\n\r";
        $select .= '<select name="'.$name.'" '.$style.' >';
        $select .= "\n\r";
            
            foreach($option as $k=>$v){
                
                
                $select .="\t".'<option ';
                
                if(!empty($value)){
                    
                    if(strtolower($value) === strtolower($k)){ 
                        $select .=" selected=\"selected\" "; 
                    }
                }
                $select .=" value=\"$k\" >$v</option>";
               
            }
           
        $select .='</select>';
        
        
        return $select;
        
    }
    
    public function checkbox($label,$name,$value,$checked=""){
        
        $name = $this->name.'_'.$name;
        
        if(
           !empty($checked) || isset($_POST[$name])
        ){ $checked = ' checked="checked" ';}
        
        $style = '';
        $styleLabel = '';
        $obli = '';
        $formName = $this->name;
        
        
        if(!empty($this->e[$name])){
            $styleLabel = 'style="color:#ff0000;"';
            $style = 'style="border:solid 1px #ff0000;padding:2px;text-align:left;"';
        }
        
        
        $checkbox = '<input type="checkbox" name="'.$name.'" id="'.$name.'" value="'.$value.'" '.$checked.' >';
        $checkbox .= '<label '.$styleLabel.' for="'.$name.'" >'.$label.'</label>';
        return $checkbox;
        
    }
    
    public function radio($label,$name,$value,$checked=""){
        
        $name = $this->name.'_'.$name;
        
        if(
           (isset($_POST[$name]) && $_POST[$name] === $value)
           || (!empty($checked) && $checked === $value)
        ){
            $checked = ' checked="checked" ';
        }
        
        $style = '';
        $styleLabel = '';
        $obli = '';
        $formName = $this->name;
        
        
        if(!empty($this->e[$name])){
            $styleLabel = 'style="color:#ff0000;"';
            $style = 'style="border:solid 1px #ff0000;padding:2px;text-align:left;"';
        }
        
        
        $checkbox = '<input type="radio" name="'.$name.'"  id="'.$name.'_'.$value.'"  value="'.$value.'" '.$checked.' >';
        $checkbox .= '<label '.$styleLabel.' for="'.$name.'_'.$value.'" >'.$label.'</label>';
        return $checkbox;
        
    }
    
    public function view($nameForm){
        
        $name = $nameForm;
        $isView = null;
        if(!empty($_POST)){
            
            foreach($_POST as $k=>$v){
                
                $rest = substr($k, -8); 
                if($rest !== '_tinymce'){
                    
                    $_POST[$k] = filter_input(INPUT_POST, $k, FILTER_SANITIZE_STRING) ;
                    
                }
            }
            
            if(isset($_POST[$nameForm.'_submit'])){
                
                unset($_POST[$nameForm.'_submit']);
                
                foreach($_POST as $k=>$v){
                    
                    $rest = substr($k, -8); 
                    if($rest !== '_tinymce'){
                        
                        
                        $k = str_replace($nameForm.'_','',$k);
                        $this->i[$k] = $v;
                        
                    }else{
                        
                        if( !empty($this->i) && empty($this->e) ){
                            
                            $k = str_replace($nameForm.'_','',$k);
                            //$_POST[$k] = stripcslashes($_POST[$k]);
                            $this->i[$k] = htmlentities($v,ENT_QUOTES);
                            
                        }
                        
                    }
                    
                    
                }
            }
        }
    }
    

}
