<?php

  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
  }

  if (!function_exists('body_classes')) {
    function body_classes($controller, $action) {
      return $controller . ' ' . $action;
    }
  }

// End of file application_helper.php
// Location: ./application/helpers/application_helper.php