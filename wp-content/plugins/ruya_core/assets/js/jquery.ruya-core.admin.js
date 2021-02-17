/**
 * jquery.ruya_core.admin.js
 * Author: ruya
 * Author Uri: http://ruya.com
 * Email: ruya@gmail.com
 * Version: 1.0
 */

! ( function( $ ) {
	'use strict';

	var ruyaAPI = function() {
		this.init();
	}

	ruyaAPI.prototype = {
		init: function() {
			this.accordionHandle();
			this.backupdatabaseHandle();
		},
		accordionHandle: function() {
			$( '.ruya-block-accordion-wrap' ).each( function() {
				var $accordionWrap = $( this );

				$accordionWrap.find( '.ruya-block-accordion-body' ).slideUp( 0 );
				$accordionWrap.find( '.ruya-block-accordion' ).first().find( '.ruya-block-accordion-body' ).slideDown( 'slow' );

				$accordionWrap.on( 'click', '.ruya-block-accordion > .title', function() {
					var $accordionItem = $( this ).parent( '.ruya-block-accordion' );
					$accordionWrap.find( '.ruya-block-accordion-body' ).slideUp( 'slow' );
					$accordionItem.find( '.ruya-block-accordion-body' ).slideDown( 'slow' );
				} )
			} )
		},
		backupdatabaseHandle: function() {
			$( 'body' ).on( 'click', '#ruya-backupdatabase-handle', function( e ) {
				e.preventDefault();
				var $this = $( this ),
					path = $( this ).data( 'path' ),
					uri = $( this ).data( 'uri' );

				$this.addClass( 'ruya-ajax-loading' );

				$.ajax( {
					type: 'POST',
					url: ruya_object.ajax_url,
					data: { action: 'ruya_backupDatabase_handle', path: path, uri: uri },
					success: function( result ) {
						// console.log( result );
						$this.removeClass( 'ruya-ajax-loading' );
						$this.parents( '.ruya-block-accordion-body' ).append( $( result ).css( 'display', 'none' ).fadeIn( 'slow' ) );
					},
					error: function( e ) {
						alert( JSON.stringify( e ) );
						console.log( e )
					}
				} )
			} )

			/* Restore */
			$( 'body' ).on( 'click', 'a.ruya-restore-database', function( e ) {
				e.preventDefault();

				var $this = $( this ),
					$rowElem = $( this ).parents( '.table-row' ),
					file = $( this ).data( 'file' ),
					ask = confirm( 'Do you want RESTORE database?' );

				if( ask == true ) {
				    $rowElem.addClass( 'ruya-ajax-loading' );

				    $.ajax( {
						type: 'POST',
						url: ruya_object.ajax_url,
						data: { action: 'ruya_restoreDatabase_handle', file: file },
						success: function( result ) {
							alert( result );
							$rowElem.removeClass( 'ruya-ajax-loading' );
							console.log( result );
						},
						error: function( e ) {
							alert( JSON.stringify( e ) );
							console.log( e )
						}
					} )
				}
			} )

			/* Delete */
			$( 'body' ).on( 'click', 'a.ruya-delete-database', function( e ) {
				e.preventDefault();

				var $rowElem = $( this ).parents( '.table-row' ),
					file = $( this ).data( 'file' ),
					ask = confirm( 'Do you want DELETE this file?' );

				if( ask == true ) {
				    $rowElem.addClass( 'ruya-ajax-loading' );

				    $.ajax( {
						type: 'POST',
						url: ruya_object.ajax_url,
						data: { action: 'ruya_deleteDatabase_handle', file: file },
						success: function( result ) {
							alert( result );
							$rowElem.fadeOut( 'slow', function() { $( this ).remove() } );
							console.log( result );
						},
						error: function( e ) {
							alert( JSON.stringify( e ) );
							console.log( e )
						}
					} )
				}
			} )
		}
	}

	/* DOM Reaady */
	$( function() {

		/* use ruyaAPI */
		new ruyaAPI();
	} ) 
} )( jQuery )
