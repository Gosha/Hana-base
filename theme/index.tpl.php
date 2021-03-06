<!doctype html>
<html lang='<?=$lang?>'>
  <head>
    <meta charset='utf-8'/>
    <meta
       name="viewport"
       content=" width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <title><?=get_title($title)?></title>
    <?php if(isset($favicon)): ?><link rel='shortcut icon' href='<?=$favicon?>'/><?php endif; ?>
    <?php if(isset($modernizr)):?><script src='<?=$modernizr?>'></script><?php endif; ?>
    <?php foreach($stylesheets as $stylesheet): ?>
      <link rel='stylesheet' type='text/css' href='<?=$stylesheet?>'/>
    <?php endforeach; ?>
  </head>
  <body>
    <div id="header-container">
      <div id='header' class="grid-100"><?=$header?></div>
      <?php echo CNavigation::GenerateMenu($menu); ?>
    </div>
    <div id='wrapper' class="grid-container">
      <div id='main' class="grid-100"><?=$main?></div>
      <div id='footer' class="grid-100"><?=$footer?></div>
    </div>
    <?php if(isset($jquery)):?><script src='<?=$jquery?>'></script><?php endif; ?>
    <?php if(isset($javascripts)): foreach($javascripts as $val): ?>
      <script src='<?=$val?>'></script>
    <?php endforeach; endif; ?>
  </body>
</html>
