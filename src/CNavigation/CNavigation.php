<?php

class CNavigation {
  public static function GenerateMenu($menu) {
    $ret = "<nav class=\"{$menu['class']}\">\n";
    foreach($menu['items'] as $url => $item) {
      $selected = $menu['callback_selected']($url) ? "selected" : "";
      $ret .= "<a href=\"{$url}.php\" class=\"{$selected}\">$item</a>";
    }
    return $ret . "</nav>";
  }
}
