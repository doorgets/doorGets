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

class installDatabase extends UnzipFile{
    
    public function install($host,$db,$login,$password,$other=''){
        
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
        
        $sql_query = <<<Q

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

DROP TABLE IF EXISTS `candidature`;

CREATE TABLE IF NOT EXISTS `candidature` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri_module` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `description` text,
  `date_naissance` varchar(255) DEFAULT NULL,
  `sexe` varchar(255) DEFAULT NULL,
  `pays` varchar(255) DEFAULT NULL,
  `ethnie` varchar(255) DEFAULT NULL,
  `photo_visage` varchar(255) DEFAULT NULL,
  `photo_face` varchar(255) DEFAULT NULL,
  `photo_profil` varchar(255) DEFAULT NULL,
  `photo_autre` varchar(255) DEFAULT NULL,
  `date_creation` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `contactezmoi`;

CREATE TABLE IF NOT EXISTS `contactezmoi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri_module` varchar(255) DEFAULT NULL,
  `sujet` varchar(255) NOT NULL DEFAULT 'aucun sujet',
  `nom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `description` text,
  `message` text,
  `telephone` varchar(255) DEFAULT NULL,
  `lu` int(11) NOT NULL DEFAULT '0',
  `archive` int(11) NOT NULL DEFAULT '0',
  `date_creation` int(11) NOT NULL DEFAULT '0',
  `date_archive` int(11) NOT NULL DEFAULT '0',
  `date_lu` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `linkinfo`;

CREATE TABLE IF NOT EXISTS `linkinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `langue` varchar(255) DEFAULT NULL,
  `page` varchar(255) DEFAULT NULL,
  `content` text,
  `date_modification` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `newsletter`;

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '1',
  `nom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `description` text,
  `date_creation` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `page`;

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `langue` varchar(255) DEFAULT NULL,
  `page` varchar(255) DEFAULT NULL,
  `content` text,
  `sharethis` int(11) NOT NULL DEFAULT '0',
  `date_modification` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `uploader`;

CREATE TABLE IF NOT EXISTS `uploader` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `description` text,
  `fichier` varchar(255) DEFAULT NULL,
  `poid` varchar(255) DEFAULT NULL,
  `date_creation` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `_categories`;

CREATE TABLE IF NOT EXISTS `_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri_module` varchar(255) DEFAULT NULL,
  `groupe_traduction` text,
  `ordre` int(11) DEFAULT NULL,
  `date_creation` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `_categories_traduction`;

CREATE TABLE IF NOT EXISTS `_categories_traduction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cat` int(11) NOT NULL DEFAULT '0',
  `langue` varchar(10) NOT NULL DEFAULT 'fr',
  `nom` varchar(255) DEFAULT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `description` text,
  `uri` varchar(255) DEFAULT NULL,
  `meta_titre` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keys` varchar(255) DEFAULT NULL,
  `date_creation` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `_comments`;

CREATE TABLE IF NOT EXISTS `_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri_module` varchar(255) DEFAULT NULL,
  `uri_content` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `comment` text,
  `lu` int(11) NOT NULL DEFAULT '0',
  `archive` int(11) NOT NULL DEFAULT '0',
  `date_creation` int(11) DEFAULT NULL,
  `validation` int(11) DEFAULT '0',
  `date_validation` int(11) DEFAULT '0',
  `date_archive` int(11) NOT NULL DEFAULT '0',
  `adress_ip` varchar(255) DEFAULT NULL,
  `langue` varchar(255) DEFAULT 'en',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `_modules`;

CREATE TABLE IF NOT EXISTS `_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `uri` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  `is_first` int(11) DEFAULT '0',
  `plugins` text,
  `groupe_traduction` text,
  `bynum` int(11) DEFAULT '10',
  `avoiraussi` int(11) NOT NULL DEFAULT '3',
  `image` varchar(255) DEFAULT NULL,
  `notification_mail` int(11) NOT NULL DEFAULT '1',
  `date_creation` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `_modules_traduction`;

CREATE TABLE IF NOT EXISTS `_modules_traduction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_module` int(11) DEFAULT NULL,
  `langue` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `description` text,
  `article_tinymce` text,
  `meta_titre` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keys` varchar(255) DEFAULT NULL,
  `date_modification` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `_rubrique`;

CREATE TABLE IF NOT EXISTS `_rubrique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(220) DEFAULT NULL,
  `ordre` int(11) DEFAULT NULL,
  `idModule` int(11) NOT NULL DEFAULT '0',
  `idParent` int(11) DEFAULT '0',
  `date_creation` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `_website`;

CREATE TABLE IF NOT EXISTS `_website` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domaine` varchar(220) NOT NULL,
  `title` varchar(220) NOT NULL,
  `slogan` varchar(180) DEFAULT NULL,
  `copyright` varchar(100) NOT NULL,
  `year` varchar(10) NOT NULL,
  `description` varchar(220) NOT NULL,
  `keywords` varchar(220) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `pays` varchar(180) DEFAULT NULL,
  `ville` varchar(180) DEFAULT NULL,
  `adresse` varchar(220) DEFAULT NULL,
  `codepostal` varchar(25) DEFAULT NULL,
  `tel_fix` varchar(30) DEFAULT NULL,
  `tel_mobil` varchar(30) DEFAULT NULL,
  `tel_fax` varchar(30) DEFAULT NULL,
  `facebook` varchar(120) DEFAULT NULL,
  `twitter` varchar(120) DEFAULT NULL,
  `youtube` varchar(120) DEFAULT NULL,
  `google` varchar(250) DEFAULT NULL,
  `analytics` varchar(50) DEFAULT NULL,
  `langue` varchar(255) DEFAULT 'fr',
  `langue_front` varchar(255) DEFAULT 'fr',
  `langue_groupe` text,
  `horaire` varchar(255) DEFAULT '315',
  `mentions` int(11) DEFAULT '1',
  `cgu` int(11) DEFAULT '1',
  `m_newsletter` int(1) DEFAULT '1',
  `m_terms` int(11) NOT NULL DEFAULT '1',
  `m_legacy` int(11) NOT NULL DEFAULT '1',
  `m_sitemap` int(11) DEFAULT '1',
  `m_contact` int(11) DEFAULT '1',
  `id_facebook` varchar(255) DEFAULT NULL,
  `id_disqus` varchar(255) DEFAULT NULL,
  `theme` varchar(255) NOT NULL DEFAULT 'doorgets-home',
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `_website_traduction`;

CREATE TABLE IF NOT EXISTS `_website_traduction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `langue` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slogan` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `copyright` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `date_modification` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


INSERT INTO `_website` ( `title`,`langue_groupe` ) VALUES (  'Professeur-php.com','a:0:{}' );

$other

Q;

        
        $dsn_connexion = "mysql:host=$host;dbname=$db";
        
        $pdo = new PDO($dsn_connexion,$login,$password);
        $pdo-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $pdo->beginTransaction();
        $pdo->query($sql_query);
        $pdo->commit();
        
        return $sql_query;
    
    }
    
    public function createSqlQuery($table,$data){
        
        $arrLangue['en'] = 'English';
        $arrLangue['fr'] = 'Français';
        $arrLangue['de'] = 'Deutsch';
        $arrLangue['es'] = 'Español';
        $arrLangue['pl'] = 'Polski';
        $arrLangue['ru'] = 'Pусский';
        $arrLangue['tu'] = 'Türk';
        $arrLangue['po'] = 'Português';
        $arrLangue['su'] = 'Svenska';
        $arrLangue['it'] = 'Italiano';
        
        $data['langue_groupe'] = serialize($arrLangue);
        
        $d = "UPDATE ".$table." SET ";
        foreach($data as $k=>$v){
            $d .= $k." = '".$v."',";
        }
        $d = substr($d,0,-1);
        $d .= " WHERE id = 1 ;";
        
        $dTrad = '';
        
        
        
        $dataTrad['langue'] = 'fr';
        
        $dataTrad['title'] = $data['title'];
        $dataTrad['slogan'] = $data['slogan'];
        $dataTrad['description'] = $data['description'];
        $dataTrad['copyright'] = $data['copyright'];
        $dataTrad['year'] = $data['year'];
        $dataTrad['keywords'] = $data['keywords'];
        $dataTrad['date_modification'] = time();
        
        $dTrad .= "INSERT INTO ".$table."_traduction (";
        foreach($dataTrad as $k=>$v){ $dTrad .= $k.','; }
        $dTrad = substr($dTrad,0,-1);
        $dTrad .= ") VALUES (";
        foreach($dataTrad as $k=>$v){ $dTrad .= '\''.$v.'\','; }
        $dTrad = substr($dTrad,0,-1);
        $dTrad .= "); ";
        
        $dataTrad['langue'] = 'en';
        
        $dTrad .= "INSERT INTO ".$table."_traduction (";
        foreach($dataTrad as $k=>$v){ $dTrad .= $k.','; }
        $dTrad = substr($dTrad,0,-1);
        $dTrad .= ") VALUES (";
        foreach($dataTrad as $k=>$v){ $dTrad .= '\''.$v.'\','; }
        $dTrad = substr($dTrad,0,-1);
        $dTrad .= "); ";
        
        $dataTrad['langue'] = 'de';
        
        $dTrad .= "INSERT INTO ".$table."_traduction (";
        foreach($dataTrad as $k=>$v){ $dTrad .= $k.','; }
        $dTrad = substr($dTrad,0,-1);
        $dTrad .= ") VALUES (";
        foreach($dataTrad as $k=>$v){ $dTrad .= '\''.$v.'\','; }
        $dTrad = substr($dTrad,0,-1);
        $dTrad .= "); ";
        
        $dataTrad['langue'] = 'es';
        
        $dTrad .= "INSERT INTO ".$table."_traduction (";
        foreach($dataTrad as $k=>$v){ $dTrad .= $k.','; }
        $dTrad = substr($dTrad,0,-1);
        $dTrad .= ") VALUES (";
        foreach($dataTrad as $k=>$v){ $dTrad .= '\''.$v.'\','; }
        $dTrad = substr($dTrad,0,-1);
        $dTrad .= "); ";
        
        $dataTrad['langue'] = 'pl';
        
        $dTrad .= "INSERT INTO ".$table."_traduction (";
        foreach($dataTrad as $k=>$v){ $dTrad .= $k.','; }
        $dTrad = substr($dTrad,0,-1);
        $dTrad .= ") VALUES (";
        foreach($dataTrad as $k=>$v){ $dTrad .= '\''.$v.'\','; }
        $dTrad = substr($dTrad,0,-1);
        $dTrad .= "); ";
        
        $dataTrad['langue'] = 'ru';
        
        $dTrad .= "INSERT INTO ".$table."_traduction (";
        foreach($dataTrad as $k=>$v){ $dTrad .= $k.','; }
        $dTrad = substr($dTrad,0,-1);
        $dTrad .= ") VALUES (";
        foreach($dataTrad as $k=>$v){ $dTrad .= '\''.$v.'\','; }
        $dTrad = substr($dTrad,0,-1);
        $dTrad .= "); ";
        
        $dataTrad['langue'] = 'tu';
        
        $dTrad .= "INSERT INTO ".$table."_traduction (";
        foreach($dataTrad as $k=>$v){ $dTrad .= $k.','; }
        $dTrad = substr($dTrad,0,-1);
        $dTrad .= ") VALUES (";
        foreach($dataTrad as $k=>$v){ $dTrad .= '\''.$v.'\','; }
        $dTrad = substr($dTrad,0,-1);
        $dTrad .= "); ";
        
        $dataTrad['langue'] = 'po';
        
        $dTrad .= "INSERT INTO ".$table."_traduction (";
        foreach($dataTrad as $k=>$v){ $dTrad .= $k.','; }
        $dTrad = substr($dTrad,0,-1);
        $dTrad .= ") VALUES (";
        foreach($dataTrad as $k=>$v){ $dTrad .= '\''.$v.'\','; }
        $dTrad = substr($dTrad,0,-1);
        $dTrad .= "); ";
        
        $dataTrad['langue'] = 'su';
        
        $dTrad .= "INSERT INTO ".$table."_traduction (";
        foreach($dataTrad as $k=>$v){ $dTrad .= $k.','; }
        $dTrad = substr($dTrad,0,-1);
        $dTrad .= ") VALUES (";
        foreach($dataTrad as $k=>$v){ $dTrad .= '\''.$v.'\','; }
        $dTrad = substr($dTrad,0,-1);
        $dTrad .= "); ";
        
        $dataTrad['langue'] = 'it';
        
        $dTrad .= "INSERT INTO ".$table."_traduction (";
        foreach($dataTrad as $k=>$v){ $dTrad .= $k.','; }
        $dTrad = substr($dTrad,0,-1);
        $dTrad .= ") VALUES (";
        foreach($dataTrad as $k=>$v){ $dTrad .= '\''.$v.'\','; }
        $dTrad = substr($dTrad,0,-1);
        $dTrad .= "); ";
        
        return $d.' '.$dTrad;
        
    }
    
    public function destroy_dir($dir) {
        
        if (!is_dir($dir) || is_link($dir)) return unlink($dir); 
        foreach (scandir($dir) as $file) { 
            if ($file == '.' || $file == '..') continue; 
            if (!$this->destroy_dir($dir . DIRECTORY_SEPARATOR . $file)) { 
                chmod($dir . DIRECTORY_SEPARATOR . $file, 0777); 
                if (!$this->destroy_dir($dir . DIRECTORY_SEPARATOR . $file)) return false; 
            }; 
        } 
        return rmdir($dir);
    
    } 
}