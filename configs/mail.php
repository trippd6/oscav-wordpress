<?php

                /**
                * Plugin Name: Configure SMTP
                * Description: Awesome way to configure SMTP
                * Author: Pierre Ozoux * Version: 0.1
                */
                add_filter( 'wp_mail_from', function( $email ) {
                        return get_bloginfo('admin_email');#"wordpress@test.com";
                });

                add_action( 'phpmailer_init', 'send_smtp_email' );
                function send_smtp_email( $phpmailer ) {
                        $phpmailer->isSMTP();
                        $phpmailer->SMTPAuth = false;
                        $phpmailer->Host = "relay";
                        $phpmailer->Port = "25";
                        $phpmailer->From = get_bloginfo('admin_email');
                        $phpmailer->FromName = "WordPress Admin";
                }
?>
