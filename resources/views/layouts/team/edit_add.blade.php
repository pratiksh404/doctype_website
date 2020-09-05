<div class="row">
    <div class="col-lg-6">
        <label for="name">Team Name <span class="text-danger">*</span></label>
        <input type="text" name="name" id="name" class="form-control" value="{{$counter->name ?? old('name')}}"
            placeholder="Team Name" required>
    </div>
    <div class="col-lg-6">
        <label for="designation">Team Designation</label>
        <input type="text" name="designation" id="designation" class="form-control"
            value="{{$counter->designation ?? old('designation')}}" placeholder="Team Designation">
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <label for="phone_no">Phone No.</label>
        <select name="phone_no[]" id="phone_no" class="form-control" multiple="multiple">
            @if (isset($team->phone_no))
            @foreach ($phone_no as $no)
            <option value="{{$no}}" selected="selected">{{$no}}</option>
            @endforeach
            @endif
        </select>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <input type="file" class="custom-file-input" id="image" name="image">
        <label class="custom-file-label" for="image">Choose file</label>
    </div>
</div>
<br>
<button type="button" id="add_social_media" class="btn btn-primary">Add Social Media</button>
<hr>
<div id="social_media">

</div>