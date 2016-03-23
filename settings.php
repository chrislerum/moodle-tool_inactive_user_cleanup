<?php

defined('MOODLE_INTERNAL') || die;
if ($hassiteconfig) {
    $ADMIN->add('reports',
        new admin_externalpage('toolinactive_user_cleanup', get_string('pluginname', 'tool_inactive_user_cleanup'),
        "$CFG->wwwroot/$CFG->admin/tool/inactive_user_cleanup/index.php", 'moodle/site:config'));
}



