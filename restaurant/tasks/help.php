<?php

include_once 'utils/terminal.php';

$script = (PHP_OS_FAMILY == 'Windows') ? '.\restaurant.ps1' : 'restaurant';

TerminalOutput::print_error("Incorrect syntax. Use:");
TerminalOutput::println("\n    {{yellow|$script}} {{white|<command>}} {{cyan|[options]}}");
TerminalOutput::println("\nwhere {{white|<command>}} can be one of:");
TerminalOutput::println("  * {{white|new}}");
TerminalOutput::println("  * {{white|help}}");