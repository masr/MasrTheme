<?php

//The function take effect when loading template file rather than execute functions.php.
//This file should be executed at the top of  header.php

define('MZ_IS_HOME_PAGE', is_home());
define('MZ_IS_CAT_PAGE', is_category());
define('MZ_IS_TAG_PAGE', is_tag());
define('MZ_CUR_PAGED', empty($_GET['page']) ? '1' : $_GET['page']);
define('MZ_MAX_NUM_PAGES', mz_get_max_num_pages());
define('MZ_TAG', single_tag_title('', false));
define('MZ_CATEGORY', mz_get_category_slug());
define('MZ_PAGE_TITLE', mz_get_page_title());
define('MZ_PAGE_DESC', mz_get_page_description());


?>
