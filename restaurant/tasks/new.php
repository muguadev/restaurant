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
  mkdir("app/public");
  mkdir("app/assets/stylesheets");
  mkdir("app/models");
  mkdir("app/views");
  mkdir("app/controllers");

  TerminalOutput::println("{{gray|  > Generating sample static pages...}}");
  copy('restaurant/templates/styles.css', 'app/assets/stylesheets/styles.css');
  $html = strtr(
    file_get_contents('restaurant/templates/index.html'), 
    array('{{application}}' => $app_name)
  );
  file_put_contents('app/public/index.html', $html);
  copy('restaurant/templates/about.html', 'app/public/about.html');

  TerminalOutput::println("{{gray|  > Generating sample 404 page...}}");
  copy('restaurant/templates/404.html', 'app/public/404.html');

  TerminalOutput::println("\n{{cyan|$app_name}}'s scaffolding has been created. Thanks for using {{yellow|RESTaurant!}}");
}