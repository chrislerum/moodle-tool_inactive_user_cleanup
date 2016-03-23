<?php
defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir.'/adminlib.php');
has_capability('moodle/user:delete', context_system::instance());
function tool_obsolete_user_removal_cron() {
    global $DB, $CFG;
    mtrace("Obsolete user removal tool is running.");
    $users = $DB->get_records('user', array('deleted' => '0'));
    $mainadminuser = get_admin();

      mtrace('HELLO BBBBBBBBBBBBBBBBBBBBB');
    foreach ($users as $usersdetails) {
      mtrace('HELLO AAAAAAAAAAAAAAAAAAAAAAAAAAAA');
        $remove_it = round((time() - $usersdetails->lastaccess)/60/60/24);
        /*
        if ($remove_it > 100) {
            if (!isguestuser($usersdetails->id)) {
                mtrace('deleting user' . $usersdetails->id);
                delete_user($usersdetails);
                mtrace('deleted user' . $usersdetails->id);
            }
        }
         */
    }
    return true;
}
