<?php

namespace Spike\core;

abstract class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;
}