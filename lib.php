<?php
defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir.'/adminlib.php');
has_capability('moodle/user:delete', context_system::instance());
function tool_obsolete_user_removal_cron() {
  global $DB, $CFG;
  mtrace("Obsolete user removal tool is running.");

  // Get all users that are not already 'deleted'
  $users = $DB->get_records('user', array('deleted' => '0'));

  // Go through list of users. if user is not the guest account,
  // and user has never logged in, and user was created before 2014, delete it
  // This may not catch all cases. If a user was created before 2014 but his
  // account was somehow modified after 2013, he won't be deleted by following code.
  foreach ($users as $user) {
    mtrace('Considering user: ' . $user->firstname . ' ' . $user->lastname);
    $year = getdate($user->timemodified)['year'];
    $is_not_guest = !isguestuser($user->id);
    $has_never_logged_in = $user->currentlogin == 0 && $user->lastlogin == 0;
    $created_or_last_modified_before_2014 = $year < 2014;

    if ($is_not_guest && $has_never_logged_in && $created_or_last_modified_before_2014) {
      mtrace('Deleting user: ' . $user->firstname . ' ' . $user->lastname . ' ' . 'whose id is: ' . $user->id);
      delete_user($user);
    }
  }
  return true;
}
