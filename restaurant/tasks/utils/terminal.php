<?php

abstract class TerminalOutput {
  const YELLOW = '1;33';
  const CYAN = '0;36';
  const GRAY = '1;30';
  const WHITE = '1;37';
  const RED = '0;31';

  static private function colored($message, $color) {
    return "\033[{$color}m{$message}\033[0m";
  }

  static public function println($message = "") {
    $output = preg_replace_callback(
      "/\{\{(\w+)\|(.+?)\}\}/",
      function ($matches) {
        $color = "self::" . strtoupper($matches[1]);
        return self::colored($matches[2], constant($color));
      },
      $message
    );
    print($output . PHP_EOL);
  }

  static public function print_error($message = "General error") {
    $error_prefix = self::colored("ERROR:", self::RED);
    self::println("$error_prefix $message");
  }
}