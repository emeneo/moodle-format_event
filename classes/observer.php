<?php
defined('MOODLE_INTERNAL') || die();
/**
 * Event observer for mod_forum.
 */
class format_event_observer {
    /**
     * Observer for \core\event\course_updated event.
     *
     * @param \core\event\course_updated $event
     * @return void
     */
    public static function course_updated(\core\event\calendar_event_updated $event) {
        global $CFG,$DB;
        
        require_once($CFG->dirroot.'/course/lib.php');
        require_once($CFG->dirroot.'/calendar/lib.php');

        $cur_event = $DB->get_record('event',array('id'=>$event->objectid));

        $event_timestart = $cur_event->timestart;
        $event_timeend = $event_timestart + $cur_event->timeduration;

        $course = $DB->get_record('course',array('id'=>$event->courseid));

        $course->startdate = $event_timestart;
        $course->enddate = $event_timeend;
        $course->summary = $cur_event->description;

        //echo "<pre>";print_r($course);exit;

        $DB->update_record('course', $course);
    }

    public static function course_deleted(\core\event\calendar_event_deleted $event) {
        /*
        global $CFG,$DB;
        
        require_once($CFG->dirroot.'/course/lib.php');
        require_once($CFG->dirroot.'/calendar/lib.php');
        */
        //echo "<pre>";print_r($event);exit;

        
    }
}