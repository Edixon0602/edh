<?php

if ( ! function_exists( 'write_log' ) ) :

  /**
   * Custom helper to handle error logs
   */
  function write_log( $log ) {
    if ( is_array( $log ) || is_object( $log ) ) {
      error_log( print_r( $log, true ) );
    } else {
      error_log( $log );
    }
  }
endif;


if ( ! function_exists( 'random_string' ) ) :

  /**
   * Generate a random string
   */
  function random_string( $length = 8 ) : String
  {
    $string = '';

    while ( ( $len = strlen( $string ) ) < $length ) {
      $size   = $length - $len;
      $bytes  = random_bytes($size);
      $string .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
    }

    return $string;
  }
endif;
