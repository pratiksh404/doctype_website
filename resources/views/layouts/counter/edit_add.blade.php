<div class="row">
    <div class="col-lg-6">
        <label for="counter_name">Counter Name <span class="text-danger">*</span></label>
        <input type="text" name="counter_name" id="counter_name" class="form-control"
            value="{{$counter->counter_name ?? old('counter_name')}}" placeholder="Counter Name" required>
    </div>
    <div class="col-lg-4">
        <label for="counter_icon">Counter Icon</label>
        <input type="text" name="counter_icon" id="counter_icon" class="form-control"
            value="{{$counter->counter_icon ?? old('counter_icon')}}" placeholder="Counter Icon">
    </div>
    <div class="col-lg-2">
        <label for="count">Count <span class="text-danger">*</span></label>
        <input type="number" name="count" id="count" class="form-control" value="{{$counter->count ?? old('count')}}"
            placeholder="Counter Name" required>
    </div>
</div>