<!doctype html>
<html lang='<?=$lang?>'>
  <head>
    <meta charset='utf-8'/>
    <title><?=get_title($title)?></title>
    <?php if(isset($favicon)): ?><link rel='shortcut icon' href='<?=$favicon?>'/><?php endif; ?>
    <?php if(isset($modernizr)):?><script src='<?=$modernizr?>'></script><?php endif; ?>
    <link rel='stylesheet' type='text/css' href='<?=$stylesheet?>'/>
  </head>
  <body>
    <div id='wrapper'>
      <div id='header'><?=$header?></div>
      <div id='main'><?=$main?></div>
      <div id='footer'><?=$footer?></div>
    </div>
    <?php if(isset($jquery)):?><script src='<?=$jquery?>'></script><?php endif; ?>
    <?php if(isset($javascript_include)): foreach($javascript_include as $val): ?>
      <script src='<?=$val?>'></script>
    <?php endforeach; endif; ?>
  </body>
</html>
