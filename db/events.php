<?php
// List of observers.
$observers = array(
    array(
        'eventname' => '\core\event\calendar_event_updated',
        'callback'  => 'format_event_observer::course_updated',
    ),

    array(
        'eventname' => '\core\event\calendar_event_deleted',
        'callback'  => 'format_event_observer::course_deleted',
    ),
);