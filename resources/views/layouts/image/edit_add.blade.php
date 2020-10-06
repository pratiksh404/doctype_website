<div class="row">
    <div class="col-lg-12">
        <label for="image_name">Image Name</label>
        <input type="text" name="name" class="form-control" id="image_name" value="{{$image->name ?? old('name')}}"
            placeholder="Image Name">
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-4">
        <input type="file" class="custom-file-input" id="image" name="image">
        <label class="custom-file-label" for="image">Choose Image</label>
    </div>
    <div class="col-lg-4">
        <select name="portfolio_id" id="image_type" class="select2 form-control">
            <option value="null">Image Portfolio ..</option>
            @foreach ($portfolios as $portfolio)
            <option value="{{$portfolio->id}}"
                {{isset($image->portfolio_id) ? $image->portfolio_id == $portfolio->id ? 'selected' : '' : ''}}>
                {{$portfolio->portfolio}}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-4">
        <select name="image_type" id="image_type" class="select2 form-control">
            <option>Image Type..</option>
            <option value="1" {{isset($image->image_type) ?  $image->image_type == 'Normal' ? 'selected' : '' : ''}}>
                Normal
            </option>
            <option value="2" {{isset($image->image_type) ?  $image->image_type == 'Vertical' ? 'selected' : '' : ''}}>
                Vertical
                Image
            </option>
            <option value="3"
                {{isset($image->image_type) ?  $image->image_type == 'Horizontal' ? 'selected' : '' : ''}}>Horizontal
                Image</option>
            <option value="4" {{isset($image->image_type) ?  $image->image_type == 'Video' ? 'selected' : '' : ''}}>
                Video
            </option>
            <option value="5" {{isset($image->image_type) ?  $image->image_type == 'Slider' ? 'selected' : '' : ''}}>
                Slider
            </option>
        </select>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-6">
        <label for="youtube_link">Video Link</label>
        <input type="text" name="youtube_link" id="youtube_link" class="form-control"
            value="{{$image->youtube_link ?? old('youtube_link')}}" placeholder="Video Link">
    </div>
    <div class="col-lg-6">
        <label for="redirect_link">Redirect Link</label>
        <input type="text" name="redirect_link" id="redirect_link" class="form-control"
            value="{{$image->redirect_link ?? old('redirect_link')}}" placeholder="Redirect Link">
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <label for="image_excerpt">Image Excerpt</label>
        <textarea name="excerpt" id="image_excerpt" class="textarea">
                        @if (isset($image->excerpt))
                            {!!$image->excerpt !!}
                        @endif
                    </textarea>
    </div>
    <div class="col-lg-12">
        <label for="image_description">Image Description</label>
        <textarea name="image_description" id="image_description" class="textarea">
            @if (isset($image->image_description))
                {!!$image->image_description !!}
            @endif
        </textarea>
    </div>
</div>