<div class="row">
    <div class="col-lg-4">
        <label for="service_name">Service Name <span class="text-danger">*</span></label>
        <input type="text" name="service_name" id="service_name" class="form-control"
            value="{{$service->service_name ?? old('service_name')}}" placeholder="Service Name">
    </div>
    <div class="col-lg-4">
        <label for="service_redirect_link">Redirect Link</label>
        <input type="text" name="service_redirect_link" id="service_redirect_link" class="form-control"
            value="{{$service->service_redirect_link ?? old('service_redirect_link')}}" placeholder="Redirect Link">
    </div>
    <div class="col-lg-4">
        <label for="service_icon">Service Icon</label>
        <input type="text" name="service_icon" id="service_icon" class="form-control"
            value="{{$service->service_icon ?? old('service_icon')}}" placeholder="Service Icon">
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <label for="service_excerpt">Service Excerpt <span class="text-danger">*</span></label>
        <textarea name="service_excerpt" id="service_excerpt" class="textarea">
            @if (isset($service->service_excerpt))
                {!! $service->service_excerpt !!}
            @endif
        </textarea>
    </div>
</div>