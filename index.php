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

session_start();

// declare all constants for works
define('URI','./'); define('THM','./');  define('CLA','setup/class/');


// function de chargement des classes
function __autoload($name){
    
    $name = 'class.'.strtolower($name).'.php';
    
    $rootFile = CLA.$name;
    $coreFile = CLA.'core/'.$name;
    $libFile = CLA.'lib/'.$name;
    $stepFile = CLA.'step/'.$name;
    
    if( is_file($rootFile) ){ require_once $rootFile; }
    elseif( is_file($coreFile) ){ require_once $coreFile; }
    elseif( is_file($libFile) ){ require_once $libFile; }
    elseif( is_file($stepFile) ){ require_once $stepFile; }
    else { die('La classe <b>class.'.$name.'.php</b> est introuvable.'); }
}

$Setup = new Setup();

$lgConv = new Langue();
$lgConv->setLangue($_SESSION['doorgetsLangue']);

// Menu des etapes
$stepMenu[1] = $lgConv->getWords("Bienvenue");
$stepMenu[2] = $lgConv->getWords("Licence & Conditions d'utilisation");
$stepMenu[3] = $lgConv->getWords("Vérification des droits d'écritures");
$stepMenu[4] = $lgConv->getWords("Configuration Base de données");
$stepMenu[5] = $lgConv->getWords("Configuration Site Web");
$stepMenu[6] = $lgConv->getWords("Configuration Administrateur");
$stepMenu[7] = $lgConv->getWords("Copie des données");


$stepTitle[1] = '1 / '.$lgConv->getWords("Bienvenue sur l'installateur doorGets CMS V4.1");
$stepTitle[2] = '2 / '.$lgConv->getWords("Licence & Conditions d'utilisation");
$stepTitle[3] = '3 / '.$lgConv->getWords("Vérification des droits d'écritures");
$stepTitle[4] = '4 / '.$lgConv->getWords("Configurer la connexion à la base de données");
$stepTitle[5] = '5 / '.$lgConv->getWords("Configurer votre site web");
$stepTitle[6] = '6 / '.$lgConv->getWords("Configurer votre Administrateur");
$stepTitle[7] = '7 / '.$lgConv->getWords("Copie des données sur votre espace web");

$stepPoucent[1] = '0';
$stepPoucent[2] = '0';
$stepPoucent[3] = '20';
$stepPoucent[4] = '40';
$stepPoucent[5] = '60';
$stepPoucent[6] = '80';
$stepPoucent[7] = '100';

$title = $stepTitle[$_SESSION['doorgetsStep']];
$step = $_SESSION['doorgetsStep'];
$niveau = $stepPoucent[$_SESSION['doorgetsStep']];

?><!DOCTYPE html >
<html> 
    <head>
        <title>doorGets CMS V4.1 by Mounir R'Quiba</title>
    <meta charset="utf-8">
        <style>
            
            label { font-weight: bold; }
            body{ font: 15px/1.35 Helvetica,Arial,sans-serif; margin: 0; padding: 0;background-color: #f1f1f1; }
            a{ text-decoration: none; color: #555; }
            a:hover, a:focus{  text-decoration: underline; }
            #_body{width:960px;margin:50px auto;padding: 0px;background-color: #fff;border: solid 3px #555555;border-radius: 10px;box-shadow: 1px 1px 8px #AAAAAA; }
            #_header{ background-color: #d1d1d1;height: 25px; padding: 5px; }
            #_header .logo{ background-color: #E9F2D3;height: 90px; padding: 10px 5px; }
            #_title{ padding: 7px 5px; background: url(setup/img/bg-contentTitle.png); font-size: 17pt;font-weight: bold;border-bottom:solid 2px #999999; }
            #_title span{ margin-left: 35px; }
            #_content{ padding: 5px 5px 35px 5px; }
            #_content_left{ padding: 5px; display: inline-block; width: 250px; top: 0px; float: left; }
            #_content_left li { list-style-type: none; margin: 16px 0px; color: #999; }
            #_content_left li.selected {list-style-image : url(setup/img/bg-li-tabs.png);font-weight: bold;color: #000; }
            #_content_right{ padding: 5px 10px; display: inline-block;width: 665px; }
            #_content_right h2{margin: 15px 0px;width: 675px; }
            #_footer{ padding: 5px;background-color: #E1E2E2; text-align: center;border-top:solid 2px #555555;}
            #_content_right input.button { padding:0 30px; height:31px; line-height:31px; font-weight:bold; color:#fff; text-shadow:0 1px 0 #0d7903; background:#039701 url(../img/bt.png) repeat-x 0 0; border:1px solid #ccc; -moz-border-radius: 5px; -webkit-border-radius:5px; border-radius: 5px; box-shadow:0 1px #666; }
            #_content_right input.button:hover {background:#039701 url(setup/img/bt-hover.png) repeat-x 0 0; cursor:pointer; }
            #licence_conditions{width:15px;}
            
            .middle{ margin-left: auto; margin-right: auto; }
            .titre {border-bottom: solid 1px #ccc;padding: 5px 5px 5px 0;font-size: 14pt;color:#333;}
            .footer {border-top: solid 1px #ccc;padding: 8px 0px;margin-bottom: 10px;border-radius: 0 0 5px 5px;}
            .previous_bt{ margin-top:-50px;margin-left:0px; }
            .info_ {border: solid 1px #ccc;padding: 8px 5px;background-color: #f1f1f1;}
            .theme_ {width:26px;height:50px;margin-left: 5px;float: left;text-align: center;}
            .info_ input[type=text]{width: 205px;border: solid 1px #ccc;padding: 5px;border-left:0px;margin-left: -3px;padding-left: 0px;}
            .info_ input[type=text]:hover{border: solid 1px #000;border-left:0px;}
            .info_langue {border: solid 1px #ccc;padding: 10px 5px;background-color: #f1f1f1;}
            .info_langue select{width: 205px;border: solid 1px #ccc;padding: 5px;}
            .info_langue select:hover{border: solid 1px #000;}
            .info {border: solid 1px #ccc;padding: 15px 5px;background-color: #f1f1f1;}
            .info input{width: 625px;border: solid 1px #ccc;padding: 5px;}
            .info input:hover{border: solid 1px #000;}
            .center { text-align: center; }
            .right { text-align: right; }
            .footer input[type=submit] { padding:3px 15px;height:31px;line-height:31px;font-weight:bold;color:#fff;text-shadow:0 1px 0 #0d7903;background:#039701 url(setup/img/bt.png) repeat-x 0 0;border:1px solid #ccc;-moz-border-radius: 5px;-webkit-border-radius:5px;border-radius: 5px;box-shadow:0 1px #666; }
            .previous_bt input[type=submit] { padding:3px 15px;height:31px;line-height:31px;font-weight:bold;color:#555555;text-shadow:0 1px 0 #0d7903;background:#c0c0c0;border:1px solid #ccc;-moz-border-radius: 5px;-webkit-border-radius:5px;border-radius: 5px;box-shadow:0 1px #666; }
            .finish input[type=submit] { padding:3px 15px;height:31px;line-height:31px;font-weight:bold;color:#555555;text-shadow:0 1px 0 #0d7903;background:#c0c0c0;border:1px solid #ccc;-moz-border-radius: 5px;-webkit-border-radius:5px;border-radius: 5px;box-shadow:0 1px #666; }
            .footer input[type=submit]:hover { background:#17720e url(setup/img/bt-hover.png) repeat-x 0 0; cursor:pointer; }
            .previous_bt input[type=submit]:hover{ background:#808080; cursor:pointer;color:#fff; }
            .finish input[type=submit]:hover{ background:#808080 ; cursor:pointer;color:#fff; }

        </style>
    </head>
    <body>
    <div id="_body">
        <div id="_title">
            <img src="setup/img/doorgets.png" style="height: 40px;vertical-align: middle;margin: 0 50px 0 20px;"  >
            <?php echo $title; ?>
        </div>
        <div id="_content">
            <div>
                <div style="width: 950px;background: #f1f1f1;text-align: left;padding: 0;">
                    <div style="width: <?php echo $niveau; ?>%;background: #009900;padding: 5px 0; margin: 0;font-size: 15pt;">
                        <span style="float:right;background: #009900;margin: -10px 0 0 0;padding: 5px 3px 5px 8px;font-size:12pt;color: #fff;border-radius:0 0 4px 4px;"><?php if( !empty($niveau) ){ echo $niveau.'%'; } ?> </span>
                    </div>
                </div>
            </div>
            <div  id="_content_left">
                <ul>
		    <?php foreach($stepMenu as $k=>$v){ ?>
			<li <?php if($k <= $step){ echo ' class="selected" '; } ?> ><?php echo $v; ?></li>
		    <?php } ?>
                </ul>
            </div>
            <div  id="_content_right">
	    
		<?php

                    print $Setup->get();
                    
                ?>

		<br /><br /><br /><br /><br /><br />
	    </div>
        </div>
        <div id="_footer">
            © 2012 - 2013 <?php echo $lgConv->getWords("Créer et offert par"); ?> Mounir R'Quiba :  <a target="blank" href="http://www.doorgets.com/?source_cms">doorGets</a>. <?php echo $lgConv->getWords("Tous droits réservés"); ?> 
        </div>
    </div>
    </body>
</html>