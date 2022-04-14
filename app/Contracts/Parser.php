<?php

namespace App\Contracts;

interface Parser
{
    public function setUrl(string $url): self;
    public function saveData(): void;
}
