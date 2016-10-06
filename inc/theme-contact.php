<?php

/* ---------------------------------------------------------------------------
 * THEME CONTACT
 * --------------------------------------------------------------------------- */
if( defined( 'DOING_AJAX' ) && DOING_AJAX ){

	if( ! function_exists( 'contact_SendForm' ) )
	{
		function contact_SendForm()
		{
			if ( isset( $_POST['contact-data'] ) ) 
			{
				$data  = $_POST['contact-data'];
				parse_str( $data, $data );

				$Name 	 = sanitize_text_field( $data['Name'] );
				$Email 	 = sanitize_email(  $data['Email'] );
				$Message = sanitize_text_field( $data['Message'] );
				$IP      = sanitize_text_field( $_SERVER['REMOTE_ADDR'] );
				$nonce   = $_POST['nonce'];
				echo $none;
				
				/*if( !check_ajax_referer( 'AjaxNonce', 'nonce' ) ){
					die( 'STOP' );
				}*/

				if( !isset( $_POST['nonce'] ) || !wp_verify_nonce( $_POST['nonce'], 'AjaxNonce' ) )
					die( 'STOP' );

				if( !empty( $Name ) && !empty( $Email ) && !empty( $Message ) && !empty( $IP ) )
				{
					if( is_email( $Email ) )
					{

						$FILE = $_FILES['Image'];

						if ( isset( $FILE ) ) {

							$upload = wp_upload_bits( $FILE['name'], null, file_get_contents( $FILE['tmp_name'] ) );

							$wp_filetype = wp_check_filetype( basename( $upload['file'] ) );

							$wp_upload_dir = wp_upload_dir();

							$file_url = $wp_upload_dir['baseurl'] . '/' . _wp_relative_upload_path( $upload['file'] );

							$attachments = array(
								'guid' 			 => $file_url,
								'post_mime_type' => $wp_filetype['type'],
								'post_title' 	 => preg_replace( '/\.[^.]+$/', '', basename( $upload['file'] ) ),
								'post_content'   => '',
								'post_status' 	 => 'inherit'
							);

						}

						$post = array(
							'post_title'    => $Name,
							'post_status'   => 'publish',
							'post_type' 	=> 'contact',
							'meta_input'    => array( 
												'name'    => $Name,
												'email'   => $Email, 
												'message' => $Message, 
												'ip'      => $IP,
												'file'    => $file_url
											),
						);

						$post_ID = wp_insert_post( $post );

						if ( isset( $FILE ) && isset( $post_ID ) ) {

							$attach_id = wp_insert_attachment( $attachments, $upload['file'], $post_ID );

							require_once( ABSPATH . 'wp-admin/includes/image.php' );

							$attach_data = wp_generate_attachment_metadata( $attach_id, $upload['file'] );
							wp_update_attachment_metadata( $attach_id, $attach_data );
							update_post_meta( $post_ID, '_thumbnail_id', $attach_id );

						}
						
						//$attachments[] = WP_CONTENT_DIR . '/uploads/file_1.zip';
						//$attachments[] = WP_CONTENT_DIR . '/uploads/file_2.zip';

						/*$to = "development@bordoni.me";
						$subject = "Learning how to send an Email in WordPress";
						$content = "WordPress knowledge";
						$headers[] = 'From: Me Myself <me@example.net>';
						$headers[] = 'Content-Type: text/html; charset=utf-8';

						/*if( wp_mail( $to, $subject, $content, $headers/*, $attachments*/ //) ) {
				        /*	wp_send_json( 'complete' );
				        } else {
				            wp_send_json( 'error_mail' );
				    	}*/

					} else {

						wp_send_json( 'error_email' );

					}

				} else {

					wp_send_json( 'error_empty' );

				}

			}

			exit;
			
		}

	}

	add_action( 'wp_ajax_contact_SendForm', 'contact_SendForm' );
	add_action( 'wp_ajax_nopriv_contact_SendForm', 'contact_SendForm' );

}
	
?>