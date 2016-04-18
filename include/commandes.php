<?php

function func_echo($params)
{
  $a = 0;
  $b = 1;

  while (isset($params[$a][$b]))
    {	
      $c = 0;
      while(isset($params[$a][$b][$c]))
	{
	  if (($params[$a][$b][$c] == '"') || ($params[$a][$b][$c] == "'"))
	    $params[$a][$b][$c] = NULL;
	  $c++;
	}
      echo $params[$a][$b];
      echo " ";
      $b++; 
   }
  echo "\n";
}

function func_ls($params)
{
  $a = 0;
  if(isset($params[0][1]) == NULL)
    $var = scandir(".", 1);
  else if (isset($params[0][1]) != NULL)
    $var = scandir($params[0][1]);
  while(isset($var[$a]))
    {
      echo $var[$a];
      echo "\n";
      $a++;
    }
}

function func_cat($params)
{
  if (($params[0][0] == "cat") && ($params[0][1] == NULL))
    echo "cat: Invalid arguments\n";
  $a = 1;
  while (isset($params[0][$a]))
    {
      if (is_dir($params[0][$a]))
        echo "cat: {$params[0][$i]}: Is a directory\n";
      if (!(file_exists($params[0][$a])))
        echo "cat: {$params[0][$i]}: No such file\n";
      else if (file_exists($params[0][$a]))
	{
	  if (is_readable($params[0][$a]))
	    {
	      $var = file_get_contents($params[0][$a]);
	      echo $var;
	    }
	    else
	      echo "Permission denied\n";
	}
      else
        echo "cat: {$params[0][$i]}: Cannot open file\n";
      $i++;
    }
}