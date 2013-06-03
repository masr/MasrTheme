</div><?//End of div id=content?>
<div id="sidebar">
    <ul>
        <? require MZ_THEME_PATH . '/sidebar_subscription_panel.php'?>
        <? dynamic_sidebar(1) ?>
        <? require MZ_THEME_PATH . '/sidebar_recent_comments.php'?>
        <? dynamic_sidebar(2) ?>
    </ul>
</div>



