<div>

    @if(!empty($successMessage))
        <div class="alert alert-success">
            {{ $successMessage }}
        </div>
    @endif

    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-primary' }}">1</a>
                <p>Step 1</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}">2</a>
                <p>Step 2</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }}" disabled="disabled">3</a>
                <p>Step 3</p>
            </div>
        </div>
    </div>

    <div class="row setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 1</h3>

                <div class="form-group">
                    <label for="title">Project Name:</label>
                    <input type="text" name="project_name" wire:model="project_name" class="form-control" id="taskTitle">
{{--                    @error('project_name') <span class="error">{{ $message }}</span> @enderror--}}
                </div>
                <div class="form-group">
                    <label for="description">Category:</label>
                    <select name="category_id" wire:model="category_id"  class="input-field">
                        <option value=""></option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
{{--                    <input  name="category_id" wire:model="category_id" class="form-control" id="productAmount"/>--}}
{{--                    @error('category') <span class="error">{{ $message }}</span> @enderror--}}
                </div>
{{--                <div class="form-group">--}}
{{--                    <label for="description">Deadline:</label>--}}
{{--                    <textarea type="datetime-local" name="deadline" wire:model="deadline" class="form-control"  id="taskDescription">{{{ $description ?? '' }}}</textarea>--}}
{{--                    @error('deadline') <span class="error">{{ $message }}</span> @enderror--}}
{{--                </div>--}}
                <div class="form-group">
                    <label class="input-label">Deadline:</label>
                    <input type="datetime-local" name="deadline"  wire:model="deadline" class="form-control"  id="taskDescription">
                </div>

                <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="firstStepSubmit" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 2</h3>
                <div class="form-group">
                    <label for="description">Task:</label>
                    <textarea type="text" name="task" wire:model="task" class="form-control" id="taskDescription">{{{ $description ?? '' }}}</textarea>
{{--                    @error('task') <span class="error">{{ $message }}</span> @enderror--}}
                </div>
{{--                <div class="form">--}}
{{--                    <label for="description">Task:</label>--}}
{{--                    <input type="text" class="input" />--}}
{{--                    <input type="submit" class="add" value="Add Task" />--}}
{{--                </div>--}}

                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="secondStepSubmit">Next</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(1)">Back</button>
            </div>
        </div>
    </div>
    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 3</h3>

                <table class="table">
                    <tr>
                        <td>Project Name:</td>
                        <td><strong>{{$project_name}}</strong></td>
                    </tr>
                    <tr>
                        <td>Category:</td>
                        <td><strong>{{$category->name}}</strong></td>
                    </tr>
                    <tr>
                        <td>Deadline:</td>
                        <td><strong>{{$deadline}}</strong></td>
                    </tr>
                    <tr>
                        <td>Task:</td>
                        <td><strong>{{$task}}</strong></td>
                    </tr>
                </table>

                <button class="btn btn-success btn-lg pull-right" wire:click="submitForm" type="button">Finish!</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(2)">Back</button>
            </div>
        </div>
    </div>
</div>
