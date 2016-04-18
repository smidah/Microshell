<?php

require_once('include/affichage.php');
require_once('include/decoupage.php');
require_once('include/commandes.php');
require_once('include/env.php');

$key = array_keys($_SERVER);
$val = array_values($_SERVER);
$fo = fopen('php://stdin', 'r');
if ($fo != false)
  {
    aff_prompt();
    while (($str = fgets($fo)) != false)
      {
        $params = decoupe($str);
        if (isset($params[0][0]))
          {
            $var = 'func_' . $params[0][0];
            if(function_exists($var))
              {
                $var($params);
              }
	    if (isset($params[0][0]))
	      if ($params[0][0] == "exit")
		return ;
	      else if(!(function_exists($var)))
		{
		  $str = substr($str, 0, -1);
		  echo "{$str}: Command not found\n";
		}
	  }
	aff_prompt();
      }
    fclose($fo);
  }