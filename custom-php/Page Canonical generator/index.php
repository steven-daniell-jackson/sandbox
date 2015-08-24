<?php 

/* 
**Start: 

Steven Jackson - Custom

Platform: CONCRETE CMS
Date: 4 June 2015
Client:  www.tyresandmore.com
Location: /themes/TyresMore/elements/header.php

Issue: Used resolve page duplication issues.
Note: Using redirects would cause internal redirect errors

Canonical Page URL generator 
*/

 $cPath = $c->getCollectionPath(); 
            $canonicalURL = BASE_URL;
            $canonicalURL.= DIR_REL;
       		$canonicalURL.= URL_REWRITING?"":"/index.php";
            $canonicalURL.= $cPath; 
            if(!(substr($cPath, strlen($cPath)-1, 1)=="/")) $canonicalURL .= "/";
            $pageIndentifierVars = array('keywords','fID','tag','productID'); 
            $canonicalVars = array(); 
            foreach($pageIndentifierVars as $var) 
            if($_REQUEST[$var]) $canonicalVars[]= $var.'='.$_REQUEST[$var]; 
            if( count($canonicalVars) ) $canonicalURL.= '?' . join(',',$canonicalVars); 



/* 




Conditional: Determines if page is the store locator ID.
If it is not the store locator page.
**** Inserts canonical **** 
*/

if($c->getCollectionID() != 150)
{
?>

<link rel="canonical" href="<?= $canonicalURL ?>">

<?php
}//End if