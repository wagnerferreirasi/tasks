<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Http\Request;

use function Livewire\Volt\rules;

class TaskComponent extends Component
{
    public $task;
    public $name;
    public $completed = false;
    public $tasks;

    public function mount()
    {
        $this->tasks = Task::orderBy('created_at', 'desc')->get();
    }
    public function render()
    {
        return view('livewire.task-component');
    }

    public function save()
    {
        $this->validate([
            'task' => 'required|max:255',
        ]);

        $task = new Task();
        $task->user_id = auth()->user()->id;
        $task->name = $this->task;
        $task->save();

        $this->tasks = Task::orderBy('created_at', 'desc')->get();
    }

    public function complete(int $id)
    {
        $task = Task::find($id);
        $task->completed = true;
        $task->completed_at = now();
        $task->save();

        $this->tasks = Task::orderBy('created_at', 'desc')->get();
    }

    public function delete(int $id)
    {
        $task = Task::find($id);
        $task->delete();
        $this->tasks = Task::orderBy('created_at', 'desc')->get();
    }

    public function edit(int $id)
    {
        $task = Task::find($id);
        $this->name = $task->name;
        $this->task = $task;

    }
}
