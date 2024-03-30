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
    public $id;
    public $completed = false;
    public $tasks;

    public function mount()
    {
        $this->tasks = Task::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
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

        $this->tasks = Task::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        $this->reset('task');
    }

    public function complete(int $id)
    {
        $task = Task::find($id);
        $task->completed = true;
        $task->completed_at = now();
        $task->save();

        $this->tasks = Task::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
    }

    public function delete(int $id)
    {
        $task = Task::find($id);
        $task->delete();
        $this->tasks = Task::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
    }

    public function callModal(int $id)
    {

        $task = Task::find($id);
        $this->name = $task->name;
        $this->id = $task->id;

        $this->dispatch('open-modal','modal_edit');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|max:255',
        ]);

        $task = Task::find($this->id);
        $task->name = $this->name;
        $task->save();

        $this->tasks = Task::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();

        $this->dispatch('close-modal','modal_edit');
    }
}
