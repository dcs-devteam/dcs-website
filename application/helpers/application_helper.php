<?php

  if (!function_exists('body_classes')) {
    function body_classes($controller, $action) {
      return $controller . ' ' . $action;
    }
  }

?>