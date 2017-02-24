<?php


class Tools {
  /**
  *
  */
  static function dump($mixed = null) {
      echo '<pre>';
      var_dump($mixed);
      echo '</pre>';
  }


  /**
  *
  */
  static function sanitize($mixed = null) {

      if(!is_array($mixed)) {
          return htmlentities($mixed, ENT_QUOTES, "UTF-8");
      }

      else {
          return sanitize(array_shift($mixed));
      }

      return $mixed;

    }

}
