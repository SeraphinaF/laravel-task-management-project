<?php

namespace App\Http\Livewire;

use http\Env\Request;
use Livewire\Component;
use App\Models\Project;
use App\Models\Category;
class Wizard extends Component
{
    public $currentStep = 1;
    public $project_name, $category_id, $deadline, $task;
    public $successMessage = '';
    public $validatedData;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {
        $categories = Category::all();
        return view('livewire.wizard')->withCategories($categories);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function firstStepSubmit()
    {
//        dd($this);
        $validatedData = $this->validate([
            'project_name' => 'required',
            'category_id' => 'required',
            'deadline' => 'required',
        ]);

        $this->currentStep = 2;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'task' => 'required',
        ]);

        $this->currentStep = 3;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForm()
    {
        Project::create([
            'project_name' => $this->project_name,
            'category_id' => $this->category_id,
            'deadline' => $this->deadline,
            'task' => $this->task,
        ]);

        $this->successMessage = 'Product Created Successfully.';

        $this->clearForm();

        return redirect()->route('projects.index');

//        $this->currentStep = 1;

    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function back($step)
    {
        $this->currentStep = $step;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function clearForm()
    {
        $this->project_name = '';
        $this->category_id = '';
        $this->deadline = '';
        $this->task = '';
    }
}
