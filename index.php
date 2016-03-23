<?php

require_once('../../../config.php');

require_once($CFG->libdir.'/adminlib.php');

require_login();

admin_externalpage_setup('toolobsolete_user_removal');



echo $OUTPUT->header();

$configdata = get_config('tool_obsolete_user_removal');

echo $OUTPUT->footer();
