<div class="row">
    <div class="col-lg-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Page Body</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                class="fas fa-expand"></i>
                        </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <textarea name="body" id="body" class="textarea" cols="30" rows="10">
                   @if (isset($page->body))
                       {!! $page->body !!}
                   @endif
                </textarea>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-lg-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Page Meta Data</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="title">Page Title</label>
                        <input type="text" name="title" id="title" class="form-control"
                            value="{{$page->title ?? old('title')}}" placeholder="Page Title">
                    </div>
                    <br>
                    <div class="col-lg-12">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" name="meta_title" id="meta_title" class="form-control"
                            value="{{$page->meta_title ?? old('meta_title')}}" placeholder="Meta Title">
                    </div>
                    <br>
                    <div class="col-lg-12">
                        <label for="meta_keywords">Meta Keywords</label>
                        <select name="meta_keywords[]" id="meta_keywords" class="form-control" multiple="multiple">
                            @if (isset($page->meta_keywords))
                            @foreach ($page->meta_keywords as $meta_keywords)
                            <option value="{{$meta_keywords}}" selected>{{$meta_keywords}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <br>
                    <div class="col-lg-12">
                        <label for="meta_description">Meta Description</label>
                        <textarea name="meta_description" id="meta_description" class="form-control">
                            {{$page->meta_description ?? ''}}
                        </textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        @if (isset($page->meta_image))
                        <img src="{{url($page->thumbnail('meta_image','small'))}}" alt="{{$page->title}}"
                            class="img-fluid">
                        @endif
                        <input type="file" class="custom-file-input" id="meta_image" name="meta_image">
                        <label class="custom-file-label" for="meta_image">Choose file</label>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>