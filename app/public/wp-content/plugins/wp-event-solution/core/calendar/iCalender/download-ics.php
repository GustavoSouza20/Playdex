<?php
// download-ics.php

$start_date  = $_GET['date_start'] ?? '';
$end_date    = $_GET['date_end'] ?? '';
$summary     = $_GET['summary'] ?? '';
$location    = $_GET['location'] ?? '';
$description = $_GET['description'] ?? '';

// Send headers to download as .ics file
header('Content-Type: text/calendar; charset=utf-8');
header('Content-Disposition: attachment; filename=event.ics');

// Output ICS content
$ics  = "BEGIN:VCALENDAR\r\n";
$ics .= "VERSION:2.0\r\n";
$ics .= "CALSCALE:GREGORIAN\r\n";
$ics .= "METHOD:PUBLISH\r\n";
$ics .= "BEGIN:VEVENT\r\n";
$ics .= "SUMMARY:$summary\r\n";
$ics .= "DESCRIPTION:$description\r\n";
$ics .= "LOCATION:$location\r\n";
$ics .= "DTSTAMP:" . gmdate('Ymd\THis\Z') . "\r\n";

// Timed event using input date-time strings
$ics .= "DTSTART:" . $start_date . "\r\n";
$ics .= "DTEND:"   . $end_date . "\r\n";

$ics .= "END:VEVENT\r\n";
$ics .= "END:VCALENDAR\r\n";

echo $ics;
exit;
