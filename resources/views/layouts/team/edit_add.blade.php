<div class="row">
    <div class="col-lg-6">
        <label for="name">Team Name <span class="text-danger">*</span></label>
        <input type="text" name="name" id="name" class="form-control" value="{{$team->name ?? old('name')}}"
            placeholder="Team Name" required>
    </div>
    <div class="col-lg-6">
        <label for="designation">Team Designation</label>
        <input type="text" name="designation" id="designation" class="form-control"
            value="{{$team->designation ?? old('designation')}}" placeholder="Team Designation">
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <label for="phone_no">Phone No.<span class="text-danger">*</span></label>
        <select name="phone_no[]" id="phone_no" class="form-control" multiple="multiple">
            @if (isset($team->phone_no))
            @foreach ($team->phone_no as $phone_no)
            <option value="{{$phone_no}}" selected>{{$phone_no}}</option>
            @endforeach
            @endif
        </select>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-{{isset($team) ? $team->image ? '11' : '12' : '12'}}">
        <input type="file" class="custom-file-input" id="image" name="image">
        <label class="custom-file-label" for="image">Choose file</label>
    </div>
    @if (isset($team->image))
    <div class="col-lg-1">
        <img src="{{url($team->thumbnail('image','small'))}}" alt="{{$team->name}}" class="img-fluid">
    </div>
    @endif
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary collapsed-card">
            <div class="card-header">
                <h3 class="card-title">Team Description</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                class="fas fa-expand"></i>
                        </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <textarea name="description" id="description" class="textarea" cols="30" rows="10">
                    @if (isset($team->description))
                        {!! $team->description !!}
                    @endif
                </textarea>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<br>
<button type="button" id="add_social_media" class="btn btn-primary">Add Social Media</button>
<hr>
<div id="social_media">
    @if (isset($team->social_media))
    @foreach ($team->social_media as $social_media)
    <div class="row social_media">
        <div class="col-lg-2">
            <input type="text" name="social_media[{{$social_media['id']}}][icon]" class="form-control"
                placeholder="Icon" value="{{$social_media['icon']}}">
        </div>
        <div class="col-lg-4">
            <input type="text" name="social_media[{{$social_media['id']}}][name]" class="form-control"
                placeholder="Social Media Name" value="{{ $social_media['name'] }}">
        </div>
        <div class="col-lg-5">
            <input type="text" name="social_media[{{$social_media['id']}}][url]" class="form-control"
                placeholder="Social Media Link" value="{{$social_media['url']}}">
        </div>
        <div class="col-lg-1">
            <button type="button" class="btn btn-danger" id="delete_social"> <i class="fa fa-trash"></i>
            </button>
        </div>
    </div>
    <br>
    <input type="hidden" value='{{$social_media['id']}}' name="social_media[{{$social_media['id']}}][id]">
    @if ($loop->last)
    <input type="hidden" value="{{$social_media['id']}}" name="count" id="count">
    @endif
    @endforeach
    @endif
</div>