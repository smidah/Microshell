<?php

function decoupe($str)
{
  preg_match_all("/\S+/", $str, $tab);
  return $tab;
}