<?php
/**
 * WPCal.io
 * Copyright (c) 2020 Revmakx LLC
 * revmakx.com
 */

if(!defined( 'ABSPATH' )){ exit;}

$mail_subject = sprintf(
  /* translators: %s: event type name */
  __("Event Rescheduled:  %s event has been rescheduled.", 'wpcal'), $mail_data['service_name']);
$hi_name = $mail_data['booking_admin_first_name'] ? ' '.$mail_data['booking_admin_first_name'] : '';


$wpcal_site_url = WPCAL_SITE_URL;

$mail_body = '

	<div
      style="
        background-color: #eff3fc;
        padding: 50px 0;
        font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto,
        Oxygen, Ubuntu, Cantarell, \'Open Sans\', \'Helvetica Neue\', sans-serif;
        font-size: 15px;
      "
    >
      <div
        style="
          width: 360px;
          margin: auto;
          padding: 20px;
          background-color: #fff;
          box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
          color: #131336;
          line-height: 1.2em;
          box-sizing: border-box;
        "
      >
        <div
          style="
            border-bottom: 1px solid #d8dbe7;
            padding-bottom: 10px;
            margin-bottom: 10px;
          "
        >
          <img alt="WPCal.io" src="'.$wpcal_site_url.'/emails/images/wpcal_logo.png" />
        </div>
        <table style="width:100%;">
          <tr>
            <td style="padding: 10px 0;">
              <span style="color: #7c7d9c;"
                >'.__('Hi', 'wpcal').''.$hi_name.', <br />'.__('An event has been rescheduled.', 'wpcal').'
              </span>
            </td>
          </tr>
          <tr>
            <td style="padding: 10px 0;">
              <strong style="font-size: 11px; text-transform: uppercase;"
                >'.__('Event Type', 'wpcal').'</strong
              ><br />
              <span style="color: #7c7d9c;">'.$mail_data['service_name'].'</span>
            </td>
          </tr>
          <tr>
            <td style="padding: 10px 0;">
              <strong style="font-size: 11px; text-transform: uppercase;"
                >'.__('Invitee', 'wpcal').'</strong
              ><br />
              <span style="color: #7c7d9c;">'.$mail_data['invitee_name'].'</span>
            </td>
          </tr>
          <tr>
            <td style="padding: 10px 0;">
              <strong style="font-size: 11px; text-transform: uppercase;"
                >'.__('Invitee email', 'wpcal').'</strong
              ><br />
              <span style="color: #7c7d9c;">'.$mail_data['invitee_email'].'</span>
            </td>
          </tr>
          '.$mail_data['location_html'].'
          <tr>
            <td style="padding: 10px 0;">
              <strong style="font-size: 11px; text-transform: uppercase;"
                >'.__('Former Date & Time', 'wpcal').'</strong
              ><br />
              <span style="color: #7c7d9c; text-decoration: line-through;"
                >'.$mail_data['old_booking_from_to_time_str_with_tz'].'</span
              >
            </td>
          </tr>
          <tr>
            <td style="padding: 10px 0;">
              <strong style="font-size: 11px; text-transform: uppercase;"
                >'.__('Rescheduled Date & Time', 'wpcal').'</strong
              ><br />
              <span style="color: #7c7d9c;"
                >'.$mail_data['booking_from_to_time_str_with_tz'].'</span
              >
            </td>
          </tr>
          <tr>
            <td style="padding: 10px 0;">
              <strong style="font-size: 11px; text-transform: uppercase;"
                >'.__('Invitee Time Zone', 'wpcal').'</strong
              ><br />
              <span style="color: #7c7d9c;">'.$mail_data['invitee_tz'].'</span>
            </td>
          </tr>
          <tr>
            <td style="padding: 10px 0;">
              <strong style="font-size: 11px; text-transform: uppercase;"
                >'.__('Reschedule reason', 'wpcal').'</strong
              ><br />
              <span style="color: #7c7d9c;">'.$mail_data['rescheduled_reason'].'</span>
            </td>
          </tr>
          <tr style="'.(!$mail_data['rescheduled_by'] ? 'display:none;' : '').'">
            <td style="padding: 10px 0;">
              <strong style="font-size: 11px; text-transform: uppercase;"
                >'.__('Rescheduled by', 'wpcal').'</strong
              ><br />
              <span style="color: #7c7d9c;">'.$mail_data['rescheduled_by'].'</span>
            </td>
          </tr>
          '.$mail_data['invitee_question_answers_html'].'
          <tr>
            <td>
              <br /><a style="color: #567bf3; text-decoration: underline;" href="'.$mail_data['admin_view_booking_url'].'"
                >'.__('View Booking &rarr;', 'wpcal').'</a
              >
            </td>
          </tr>
        </table>
      </div>
      <div
        style="
          color: #7c7d9c;
          font-size: 11px;
          text-align: center;
          padding: 10px 0;
        "
      >
        '.__('Sent by', 'wpcal').'
        <a
          style="color: #7c7d9c; text-decoration: underline;"
          href="'.$wpcal_site_url.'?utm_source=admin_mail&utm_medium=event"
          >WPCal.io</a
        >
      </div>
    </div>
';
