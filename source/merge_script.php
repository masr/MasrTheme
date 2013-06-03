<?php

function compress_js($file)
{
    system("java -jar yuicompressor-2.4.2.jar --type js --charset utf-8 -v $file > $file.compress ");
    system("mv $file.compress $file");
}

function merge_script($dir, $arr, $output)
{
    $ret = '';
    foreach ($arr as $file) {
        $c = file_get_contents($dir . '/' . $file . '.js');
        $ret .= "/*****************$file****************/\n$c\n\n\n\n";
    }
    $output_path = $dir . '/' . $output . '.js';
    file_put_contents($output_path, $ret);
    compress_js($output_path);
}

merge_script(dirname(dirname(__FILE__)) . '/js/'
    , array('jquery-easing-1.3.pack', 'jquery-easing-compatibility.1.2.pack', 'coda-slider.1.1.1.pack', 'gallery_slider')
    , 'gallery');
merge_script(dirname(dirname(__FILE__)) . '/syntaxhighlighter2/scripts/'
    , array('shBrushBash', 'shBrushCss', 'shBrushJava', 'shBrushJScript', 'shBrushPhp', 'shBrushPlain'
    , 'shBrushPython', 'shBrushRuby', 'shBrushSql', 'shBrushVimrc', 'shBrushXml', 'shBrushCpp', 'shBrushAsm', 'shBrushCoffee'), 'shBrushAll');

?>
