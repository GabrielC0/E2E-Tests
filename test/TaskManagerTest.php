<?php
use PHPUnit\Framework\TestCase;
use Boumilmounir\TestUnitaire\TaskManager;

class TaskManagerTest extends TestCase
{
    private $taskManager;

    protected function setUp(): void
    {
        $this->taskManager = new TaskManager();
    }

    public function testAddTask()
    {
        $this->taskManager->addTask("Nouvelle tâche");
        $this->assertCount(1, $this->taskManager->getTasks(), "La tâche n'a pas été ajoutée correctement.");
    }

    public function testRemoveTask()
    {
        $this->taskManager->addTask("Tâche test");
        $this->taskManager->removeTask(0);
        $this->assertCount(0, $this->taskManager->getTasks(), "La tâche n'a pas été supprimée correctement.");
    }

    public function testGetTasks()
    {
        $this->taskManager->addTask("Tâche 1");
        $this->taskManager->addTask("Tâche 2");
        $tasks = $this->taskManager->getTasks();
        $this->assertCount(2, $tasks, "Le nombre de tâches récupérées est incorrect.");
    }

    public function testGetTask()
    {
        $this->taskManager->addTask("Tâche spécifique");
        $this->assertEquals("Tâche spécifique", $this->taskManager->getTask(0), "La tâche récupérée n'est pas correcte.");
    }

    public function testRemoveInvalidIndexThrowsException()
    {
        $this->expectException(\OutOfBoundsException::class);
        $this->taskManager->removeTask(99);
    }

    public function testGetInvalidIndexThrowsException()
    {
        $this->expectException(\OutOfBoundsException::class);
        $this->taskManager->getTask(99);
    }

    public function testTaskOrderAfterRemoval()
    {
        $this->taskManager->addTask("Tâche 1");
        $this->taskManager->addTask("Tâche 2");
        $this->taskManager->addTask("Tâche 3");
        $this->taskManager->removeTask(1);

        $tasks = $this->taskManager->getTasks();
        $this->assertEquals("Tâche 1", $tasks[0], "La première tâche n'est pas celle attendue.");
        $this->assertEquals("Tâche 3", $tasks[1], "La seconde tâche n'est pas celle attendue.");
    }
}
