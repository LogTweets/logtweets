<?php
namespace LogTweets\Component\DomainCommand;

class CommandInterface
{
    public function execute(InputArgumentBag $argument);

    public function rollback(InputArgumentBag $argument);
}