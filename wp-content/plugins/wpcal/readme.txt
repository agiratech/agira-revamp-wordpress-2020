=== WPCal.io - Easy Meeting Scheduler ===
Contributors: wpcal, amritanandh, midhubala, dark-prince, yuvarajsenthil
Tags: meeting, appointment, scheduling, booking, interview, calendly, google-calendar, google-meet, google-hangouts, gotomeeting, zoom, webinar, icloud-calendar, outlook-calendar, office365-calendar, microsoft-teams
Requires at least: 5.0
Tested up to: 5.6
Stable tag: 0.9.4.4
Requires PHP: 7.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Your clients can quickly view your real-time availability and self-book their own slots, and eliminate all back-and-forth emailing.

== Description ==

Schedule Meetings in under 30 seconds without searching through your calendar and all the back-and-forth emails.

Check the website - [https://wpcal.io/](https://wpcal.io/)

Try a demo - [https://demo.wpcal.io/](https://demo.wpcal.io/)

== HOW IT WORKS: == 
1. <strong>Set your availability (One-time setup)</strong> -<br>Let us know your availability by either setting it up yourself or by connecting your calendars.<br><br>
1. <strong>Send your clients a link to your booking page</strong> -<br>To schedule a meeting with someone, share the link to your personalized booking page via email.<br><br>
1. <strong>They choose a convenient slot</strong> -<br>Your clients can choose an available slot by selecting a preferred date and time.<br><br>
1. <strong>Voila! Your meeting is scheduled!</strong> - <br>Your meeting is scheduled in just a few clicks. No checking calendars or sending emails back and forth.

<strong><em>Never ask “what time works for you?” again.</em></strong><br>Your clients can quickly view your real-time availability and self-book their own appointments—reschedule with a click, and eliminate all back-and-forth emailing.

== WHAT YOU CAN USE IT FOR? ==
* Consultation
* Interviewing
* Customer Engagement
* Sales & Marketing

== YOUR TIME. YOUR RULES. ==
* Control the duration of meetings
* Add multiple types of locations like in-person meeting, over the phone, web conferencing apps or even ask the invitee to enter a location etc from which invitees can choose one
* Cap the number of bookings per day
* Completely flexible availability - Choose particular days of the week, hours of the day etc. to be available/unavailable
* Prevent last-minute bookings
* Set aside time before or after events
* Let invitees answer a question while booking an event

== CALENDAR APPS INTEGRATIONS ==
2-way sync for Calendars - New meetings booked via WPCal will be added to your Calendar app and when an event is directly added to your Calendar app, that timeslot will be blocked from your WPCal availability.

* Google Calendar
* Outlook Calendar (coming soon)
* Office 365 (coming soon)
* iCloud Calendar (coming soon)

== WEB CONFERENCING APPS INTEGRATIONS ==
* Google Meet/Hangouts
* GoToMeeting
* Zoom
* Microsoft Teams (coming soon)

== >> ALL PREMIUM FEATURES ARE 100% FREE DURING THIS TIME OF CRISIS ==
Install this plugin and we'll onboard you to use the Premium features for free.

== PREMIUM FEATURES (RELEASED) ==
* Unlimited admin users per site.
* Unlimited Event types.
* Unlimited calendar accounts per admin user.
* Brand customization of booking page - Customize the fonts and accent colors of the booking widget to match your brand’s look and feel.

== PREMIUM FEATURES (COMING SOON) ==
* Recurring events - Invitees can book an event that recurs periodically.
* Group events - Host multiple invitees at the same event for tours, webinars, trainings and more.
* Team events - Pooled availability options for teams (round robin, collective scheduling, multiple team members on one page).
* Make me look busy - If you have a lot of availability, you can appear a bit more booked up or busy to your clients.
* Avoid meetings scattered throughout your day - If you offer slots throughout the day, you can avoid meetings scattered through your day.
* Custom multi-type questions for invitees while booking (Answer type: Checkbox and Radio).
* Customizable email notifications and reminders.
* Stripe and PayPal integrations - Connect your payment accounts so invitees can submit credit card payments securely upon scheduling a meeting with you.
* Custom integrations with webhooks - Build your own integrations using the plugin's webhooks.
* Over 700 app integrations with Zapier - Easily trigger actions in other apps after an event is scheduled or canceled. Zapier supports 700+ apps including Slack, ActiveCampaign, MailChimp, join.me and much more.

<strong><em>Take back control of your time!</em></strong><br>If you regularly schedule meetings with others, you should really check out the plugin.

A simple and more native alternative to Calendly for WordPress.

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Use the Settings->Plugin Name screen to configure the plugin
1. (Make your instructions match the desired user flow for activating and installing your plugin. Include any steps that might be needed for explanatory purposes)

== Frequently Asked Questions ==

= Can my invitees book an event with me from their mobile devices? =

Yes, of course. Please check out the mobile mockup in the screenshots section.

= How can I avoid last-minute booking of events? =

You can set a Minimum Scheduling Notice when creating an event type. For eg. if you set the notice as 24 hours, invitees will only be able to book slots that are 24 hours or more into the future. You can also avoid new bookings after, say, 11pm of yesterday/2 days ago.

= How quickly can I expect replies to my support requests? =

We reply within 1-2 business days and always strive for first contact resolution. Get support at https://wpcal.io/support/.

== Screenshots ==

1. The booking widget in the booking page.
2. The booking widget in the mobile view.
3. Event Type setup page in admin end.
4. Event types location options.
5. The booking widget step 2 - collecting invitee details.
6. The booking widget confirmation page.
7. The booking widget confirmation page with reschedule and cancel options.
8. Reschedule booking widget with old booking details.

== Changelog ==

= v0.9.4.4 - Feb 5th 2021 =
* Improvement: PHP 8, some deprecated errors are made compatible.
* Improvement: When admin tries to book an appointment admin's name and email will not be prefilled.
* Fix: Reschedule/cancel reason is not coming in admin notification emails.
* Fix: When branding font option is enabled, after page loads with design, CSS breaks and again design loads issue occurs first time only.
* Fix: Branding font when enabled is not working in certain cases.
* Fix: Certain string not getting translated.
* Fix: Certain string showing unexpected translation due to double translation.
* Fix: Admin-end custom availability calendar's month and weekdays name are not displaying.

= v0.9.4.3 - Jan 11th 2021 =
* Improvement: Minor addition to translation strings.
* Fix: Third party libraries(Google API) conflict with other plugins.

= v0.9.4.2 - Dec 21st 2020 =
* Fix: Missing content(weekdays and months) added to tranlatable content.
* Fix: In a rare case booking widget is not triggering issue.

= v0.9.4.1 - Dec 11th 2020 =
* Fix: JS translation strings not recognizied by translate.wordpress.org.

= v0.9.4.0 - Dec 10th 2020 =
* Feature: i18n - Translation support for user end, all mails and calendar events. 
* Feature: Event type questions now support two new answer types, Single-line and Phone number along with Multi-line.
* Feature: Branding - Font & color options introduced. Settings choose an accent color and an option to inherit the website font.
* Feature: Send mails via WP Mailer instead of WPCal.io mail server.
* Feature: Onboarding is introduced to set up a calendar and meeting apps.

* Improvement: Default time format has been changed from 24 hours to 12 hours for new installs.
* Improvement: Default timezone setting introduced.
* Improvement: Event type questions order can be changed using drag and drop.
* Improvement: Event type question delete confirmation is added.
* Improvement: Event type edit-view page now will have a toggle button to enable or disable it and profile picture of the admin owner.
* Improvement: Advance settings options and show start time every option of an event type will be shown in the event type summary.
* Improvement: After adding a meeting app successfully now a popup will be shown asking the admin to set up locations in event type.
* Improvement: Adding "Help docs" to admin header links.
* Improvement: Minimum schedule notice third option time picker introduced instead of a textbox. For old installs the same value if it is 23:59:59 and days before value more than 0 changed to 00:00:00 and days before value one day less. Just one second is the difference.
* Improvement: If plugin requirements are not met a page with required versions and installed version will be displayed in the admin area.
* Improvement: Lots of UI & UX improvements.

* Fix: Booking widget not loading in Elementor plugin popup.
* Fix: Windows bold font rendering issue for some characters issue.
* Fix: While reordering using drag and drop incorrect order was showing.
* Fix: MySQL error  #1709 - Index column size too large while activating the plugin issue.
* Fix: Various bug fixes.

= v0.9.3.3 - Nov 12th 2020 =
* Improvement: Security enhancements.
* Improvement: Minor improvements.
* Fix: Google Calendar supports HTML event description, but when it is synced to non-Google apps like iOS calendar etc. it is showing HTML codes. Now only plain text description is used.
* Fix: Booking availability slots cache is not getting cleared when removing all conflict calendars in settings.
* Fix: When Zoom setting "User personal meeting ID(PMI)" for schedule meeting is enabled, meeting UUID is displaying instead of PMI ID.
* Fix: If the user input has single or double quotes, a backslash is displayed before the quote after saving it to DB.

= v0.9.3.2 - Nov 07th 2020 =
* Fix: Admin custom availability modal on clicking on the date in the calendar, the popup not coming issue.

= v0.9.3.2 - Oct 16th 2020 =
* Improvement: UI & UX improvements.
* Fix: Booking widget questions not appearing if any one of question is disabled except the last.
* Fix: In certain cases, while booking widget used in the popup, after popup loaded booking widget is in mobile view instead of the extended or wide view.
* Fix: Minor bug fixes.

= v0.9.3.1 - Oct 07th 2020 =
* Fix: Booking widget not loading in iOS below v13.4 in both Chrome & Safari browser issue.
* Fix: Theme css conflicts.

= v0.9.3.0 - Oct 01st 2020 =
* Feature: Admin end - New Profile Settings - Edit name, display name and upload profile picture options. Profile picture fall backs to Gravatar.
* Feature: Invitee Question & Answer - Now multiple open type questions & answers are supported.
* Feature: Booking widget - now adopts the size based on available space. Therefore it can be used along with the sidebar without any overlapping issues. 
* Feature: New Available days(working days) option per event type.
* Feature: New Timezone option per event type.
* Feature: Event Type custom availability - Setting not available for multiple days are now supported.
* Feature: Admin end my bookings have a new “Custom” tab to search the bookings.

* Improvement: No more "#/booking" in the URL for Booking Step1, total concept of # used in user-end URL is changed to query param to avoid conflict with some themes.
* Improvement: Form input which has character count limit will now show live input count/total count.
* Improvement: Google, GoToMeeting And Zoom Meeting ID or code will be displayed near the meeting URL in admin end, user emails and calendar description.
* Improvement: Event type Short code is now displayed in the event type view page.
* Improvement: Google Meet status is now displayed in Admin Settings => Inetgeration.
* Improvement: Question & Answer are now shown in admin new booking and reschedule booking email.
* Improvement: Admin new booking and reschedule emails will have a link to view booking details.
* Improvement: Force disconnect popup now comes in Admin Settings => Calendars, similar to Settings => Integration when normal disconnect fails.
* Improvement: Support email link changed to support link.
* Improvement: Other UI & UX Improvements.

* Fix: Booking widget is not loading because of # used in URL due to conflict with some themes.
* Fix: All textarea(multi-line) inputs(including Event Type description, question & answer) now supports line breaks.
* Fix: When a booking is done within 5 mins of scheduled time its emails and other API activities are not triggering.
* Fix: Admin end Event Type custom availability while using date range, old dates where editable.
* Fix: Reschedule booking validation not working for location selection.
* Fix: While rescheduling the booking for the same day, max booking per day limit issue.
* Fix: Other bug fixes.

= v0.9.2.0 - Jul 24th 2020 =
* Feature: Zoom is integrated and can be used as Event type location (new meeting URL will be generated for each new booking).
* Improvement: Number of calendar per admin user restriction is removed.
* Improvement: Minor code improvements.
* Fix: If a booking is rescheduled in admin end, new reschedule link in the email not redirecting.

= v0.9.1.5 - Jul 20th 2020 =
* Improvement: Premium plans related content changes and more features included in Free. See <a href="https://wpcal.io/#pricing" target="_blank">pricing</a>.
* Fix: 3 sample Event types which supposed to be created during first activation was stopped creating as of v0.9.1.0.
* Fix: Booking widget UI theme conflicts.

= v0.9.1.4 - Jul 17th 2020 =
* Fix: Minor code changes to avoid Vue library conflicts with other plugins.

= v0.9.1.3 - Jul 14th 2020 =
* Fix: Page unresponsive error (Freezing) in Chrome in WPCal admin pages(Settings, Add event type, etc) for users west of UTC.
* Fix: Page unresponsive while choosing availability date range in Event type settings for users west of UTC.

= v0.9.1.2 - Jul 6th 2020 =
* Fix: Time picker was not working in Safari browser.
* Fix: JS Date class related issue in Safari browser which was affecting date validations etc.
* Fix: Minor bugs.

= v0.9.1.1 - Jul 1st 2020 =
* Fix: Repo old and new files mixed up fixed - version bump.

= v0.9.1.0 - Jul 1st 2020 =
* Feature: GotoMeeting and Google Meet/Hangout integrated and can be used as Event type location (new meeting URL will be generated for each new booking) (Zoom integration is coming soon).
* Feature: Event type location now has options for phone, ask invitee, in-person, custom locations in addition to third-party web conference apps integration.
* Feature: In the event type location you can add more than one location, and the invitee can choose one from them.
* Improvement: Security enhancements.
* Improvement: Event type add/edit page - Will show alert when user tries to leave page without saving changes (We will bring auto-save in due course)
* Improvement: On Event type name change, admin is alerted if they want to make changes to WP Page title as well.
* Improvement: Booking Step 2 and Confirmation page load faster now.
* Improvement: If any API integration disconnection is not successful, now it will ask for force disconnect.
* Improvement: Title bar content changes while navigation in Admin end of WPCal.
* Improvement: Link to Support email added.
* Improvement: Loading indicator added for initial loading and also for component loading.
* Improvement: UI/UX improvements.
* Fix: Booking slots not regenerated for other event type of same admin while booking and rescheduling.
* Fix: Max booking per day for the event type was considering all bookings across admins and event types for the day issue fixed.
* Fix: If event type user end booking page's permalink changes not update issue.
* Fix: Unable to save event type with purple color selected.
* Fix: Error message not showing for certain error types.
* Fix: Font rendering in Windows and Linux system is improved.
* Fix: Overflow menu in Event Type occasionally not working.

= v0.9.0.1 - May 29th 2020 =
* Fix: Not able to book Today's slots.

= v0.9.0.0 - May 9th 2020 =
* Intial public beta launch.

== Upgrade Notice ==
