<?php

function func_env($params)
{
  global $key;
  global $val;

  $i = 0;
  if (file_exists($params[0][1]))
  {
    if (is_dir($params[0][1]))
      echo "env :{$params[0][1]}: Permission dinied\n";
    else if (!(is_dir($params[0][1])))
      "env: {$params[0][1]}: No such file or directory\n";
  }
  else if ($params[0][1] == NULL)  
    {
      while (isset($key[$i]))
	{
	  echo $key[$i] . "=" . $key[$i];
	  echo "\n";
	  $i++;
	}
    }
      else
	echo "env: {$params[0][1]}: No such file or directory\n";
}

function func_setenv($params)
{
  global $key;
  global $val;

  if (!(isset($params[0][2])))
    {
      echo "setenv: Invalid arguments\n";
      return ;
    }
  if (!(isset($params[0][3])))
    {
      if ((!(isset($params[0][1]))) && (!(isset($params[0][2]))))
	{
	  $i = 0;
	  while (isset($key[$i]))
	    {
	      if ($params[0][1] == $key[$i])
		{
		  $val[$i] = $params[0][2];
		  return ;
		}
	      $i++;
	    }
	  $key[$i] = $params[0][1];
	  $val[$i] = $params[0][2];
	}
    }
  else
    echo "setenv: Invalid arguments\n";
}

function func_unsetenv($params)
{
  global $key;
  global $val;

  $i = 0;
  while (isset($key[$i]))
    {
      if ($params[0][1] == $key[$i])
	unset($key[$i]);
      $i++;
    } 
}