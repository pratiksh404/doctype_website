<div class="row">
    <div class="col-lg-12">
        <label for="plan_name">Plan Name</label>
        <input type="text" name="plan_name" id="plan_name" class="form-control"
            value="{{$plan->plan_name ?? old('plan')}}" placeholder="Plan Name" required>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-3">
        <label for="plan_period">Plan Period</label>
        <select name="plan_period" id="plan_period" class="form-control select2">
            <option value="null">Plan Period..</option>
            <option value="1"
                {{isset($plan->plan_period) ? $plan->plan_period == 'One Time Payment' ? 'selected' : '' : ''}}>One Time
                Payment</option>
            <option value="2" {{isset($plan->plan_period) ? $plan->plan_period == 'Day' ? 'selected' : '' : ''}}>Day
            </option>
            <option value="3" {{isset($plan->plan_period) ? $plan->plan_period == 'Week' ? 'selected' : '' : ''}}>Week
            </option>
            <option value="4" {{isset($plan->plan_period) ? $plan->plan_period == 'Month' ? 'selected' : '' : ''}}>Month
            </option>
            <option value="5" {{isset($plan->plan_period) ? $plan->plan_period == 'Year' ? 'selected' : '' : ''}}>Year
            </option>
        </select>
    </div>
    <div class="col-lg-3">
        <label for="plan_currency_symbol">Plan Currency Symbol</label>
        <input type="text" name="plan_currency_symbol" id="plan_currency_symbol" class="form-control"
            value="{{$plan->plan_currency_symbol ?? old('plan_currency_symbol')}}" placeholder="Plan Currency Symbol">
    </div>
    <div class="col-lg-3">
        <label for="plan_price">Plan Price</label>
        <input type="number" name="plan_price" id="plan_price" class="form-control"
            value="{{$plan->plan_price ?? old('plan_price')}}" placeholder="Plan Price">
    </div>
    <div class="col-lg-3">
        <label for="plan_color">Plan Color</label>
        <input type="text" class="form-control my-colorpicker1" value="{{$plan->plan_color ?? old('plan_color')}}">
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="d-flex justify-content-between">
            <label>Plan Service</label>
            <button type="button" id="add_plan_service" class="btn btn-primary">Add Service</button>
        </div>
        <hr>
        <div id="plan_service">
            @if (isset($plan->plan_services))
            @foreach ($plan->plan_services as $service)
            <div class="plan_service">
                <div class="row">
                    <div class="col-lg-11">
                        <input type="text" name="plan_services[]" class="form-control" id="plan_services"
                            placeholder="Plan Services" value="{{$service ?? ''}}">
                    </div>
                    <div class="col-lg-1">
                        <button type="button" id="delete_plan_service" class="btn btn-danger"><i
                                class="fa fa-trash"></i></button>
                    </div>
                </div>
                <br>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>