<?php

include_once 'utils/terminal.php';

if ($argc == 1) {
  TerminalOutput::print_error("Application name not provided.");
} else {
  $app_name = $argv[1];
  TerminalOutput::println("{{yellow|RESTaurant}} creates {{cyan|$app_name}} scaffolding:\n");
  TerminalOutput::println("{{gray|  > Creating directory structure...}}");
  mkdir("app");
  mkdir("app/assets");
  mkdir("app/assets/stylesheets");
  mkdir("app/models");
  mkdir("app/views");
  mkdir("app/views/home");
  mkdir("app/controllers");

  TerminalOutput::println("{{gray|  > Copying application root file...}}");
  copy('restaurant/templates/index.php', 'index.php');

  TerminalOutput::println("{{gray|  > Copying base stylesheet...}}");
  copy('restaurant/templates/styles.css', 'app/assets/stylesheets/styles.css');

  TerminalOutput::println("{{gray|  > Generating landing page...}}");
  $html = strtr(
    file_get_contents('restaurant/templates/index.html'), 
    array('{{application}}' => $app_name)
  );
  file_put_contents('app/views/home/index.php', $html);

  TerminalOutput::println("\n{{cyan|$app_name}}'s scaffolding has been created. Thanks for using {{yellow|RESTaurant!}}");
}