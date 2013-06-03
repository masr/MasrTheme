<?php
function compress_css($file)
{
    system("java -jar yuicompressor-2.4.2.jar --type css --charset utf-8 -v $file > $file.compress ");
    system("mv $file.compress $file");
}

function merge_style($dir, $arr, $output)
{
    $ret = '';
    foreach ($arr as $file) {
        $c = file_get_contents($dir . '/' . $file . '.css');
        $ret .= "/*****************$file****************/\n$c\n\n\n\n";
    }
    $output_path = $dir . '/' . $output . '.css';
    file_put_contents($output_path, $ret);
    compress_css($output_path);
}

$theme_home = dirname(dirname(__FILE__));
merge_style($theme_home . '/css/'
    , array('reset', 'global', 'layout', 'post', 'comment', 'sidebar', 'page', 'plugins'), 'mazr');
merge_style($theme_home . '/syntaxhighlighter2/styles/', array('shCore', 'shThemeEmacs', 'shAsmStyle'), 'syntaxhighlighter');

?>