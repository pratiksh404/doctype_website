<div class="row">
    <div class="col-lg-6">
        <label for="">Project Name</label>
        <input type="text" name="name" class="form-control" id="name" value="{{$project->name ?? old('name')}}"
            placeholder="Project Name">
    </div>
    <div class="col-lg-6">
        <label for="image">Project Image</label>
        <input type="file" name="image" id="image" class="form-control">
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <label for="excerpt">Project Excerpt</label>
        <textarea name="excerpt" class="textarea form-control">
                            @if (isset($project->excerpt))
                                {!! $project->excerpt !!}
                            @endif
        </textarea>
    </div>
    <div class="col-lg-12">
        <label for="description">Project Description</label>
        <textarea name="description" class="textarea form-control">
                                            @if (isset($project->description))
                                                {!! $project->description !!}
                                            @endif
        </textarea>
    </div>
</div>
<br>
<input type="submit" value="{{isset($project) ? "Edit" : "Create"}}" class="btn btn-primary">