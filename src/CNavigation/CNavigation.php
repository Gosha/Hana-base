<?php

class CNavigation {
  public static function GenerateMenu($menu) {
    $ret = "<nav>";
    foreach($menu as $url => $item) {
      if(basename($_SERVER['SCRIPT_FILENAME']) == $url. ".php") {
        $selected = "selected";
      } else {
        $selected = null;
      }
      $ret .= "<a href=\"{$url}.php\" class=\"{$selected}\">$item</a>";
    }
    return $ret . "</nav>";
  }
}
