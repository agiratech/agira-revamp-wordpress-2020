<?php
/**
 * WPCal.io
 * Copyright (c) 2020 Revmakx LLC
 * revmakx.com
 */

if(!defined( 'ABSPATH' )){ exit;}

$mail_subject = sprintf(
  /* translators: %s: event type name */
  __("New Event Confirmed: New %s event has been booked.", 'wpcal'), $mail_data['service_name']);

$hi_name = $mail_data['booking_admin_first_name'] ? ' '.$mail_data['booking_admin_first_name'] : '';


$wpcal_site_url = WPCAL_SITE_URL;

$mail_body = '

  <div style="
    background-color: #eff3fc;
    padding: 30px 0;
    font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto,
          Oxygen, Ubuntu, Cantarell, \'Open Sans\', \'Helvetica Neue\', sans-serif;
    font-size: 15px;">
      <div style="width: 360px; margin: auto; padding: 20px; background-color: #fff; color: #131336; line-height: 1.2em; box-sizing: border-box;">
        <div style="border-bottom: 1px solid #d8dbe7; padding-bottom: 10px; margin-bottom: 10px;">
          <img alt="WPCal.io" src="'.$wpcal_site_url.'/emails/images/wpcal_logo.png" />
        </div>
        <table style="width:100%;">
          <tr>
            <td style="padding: 10px 0;">
              <span style="color: #7c7d9c;"
                >'.__('Hi', 'wpcal').$hi_name.', <br />'.__('A new event has been booked.', 'wpcal').'
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
              <span style="text-transform: capitalize; color: #7c7d9c;"
                >'.$mail_data['invitee_name'].'</span
              >
            </td>
          </tr>
          <tr>
            <td style="padding: 10px 0;">
              <strong style="font-size: 11px; text-transform: uppercase;"
                >'.__('Invitee Email', 'wpcal').'</strong
              ><br />
              <span style="color: #7c7d9c;"><a href="mailto:'.$mail_data['invitee_email'].'">'.$mail_data['invitee_email'].'</a></span>
            </td>
          </tr>
          <tr>
            <td style="padding: 10px 0;">
              <strong style="font-size: 11px; text-transform: uppercase;"
                >'.__('Event Date & Time', 'wpcal').'</strong
              ><br />
              <span style="color: #7c7d9c;">'.$mail_data['booking_from_to_time_str_with_tz'].'</span>
            </td>
          </tr>
          '.$mail_data['location_html'].'
          <tr>
            <td style="padding: 10px 0;">
              <strong style="font-size: 11px; text-transform: uppercase;"
                >'.__('Invitee Timezone', 'wpcal').'</strong
              ><br />
              <span style="color: #7c7d9c;">'.$mail_data['invitee_tz'].'</span>
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
          padding: 10px 0 50px;
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
