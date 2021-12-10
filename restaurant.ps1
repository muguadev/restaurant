$command, $params = $args
$command =  $(if ($null -eq $command) { 'help' } else { $command })
& php -f ./restaurant/tasks/$command.php $params