<?php
namespace LogTweets\Component\DomainCommand;

interface CommandInterface
{
    public function execute(InputArgumentBag $argument);

    public function rollback(InputArgumentBag $argument);
}
