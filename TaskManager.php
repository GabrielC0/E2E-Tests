<?php

namespace Boumilmounir\TestUnitaire;

class TaskManager
{
    private $tasks = [];

    public function __construct()
    {
        $this->tasks = [];
    }

    public function addTask(string $task): void
    {
        $this->tasks[] = $task;
    }

    public function removeTask(int $index): void
    {
        if (!isset($this->tasks[$index])) {
            throw new \OutOfBoundsException("Index de tâche invalide: $index");
        }

        unset($this->tasks[$index]);
        $this->tasks = array_values($this->tasks);
    }

    public function getTasks(): array
    {
        return $this->tasks;
    }

    public function getTask(int $index): string
    {
        if (!isset($this->tasks[$index])) {
            throw new \OutOfBoundsException("Index de tâche invalide: $index");
        }

        return $this->tasks[$index];
    }
}
