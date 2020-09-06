<div class="row">
    <div class="col-lg-12">
        <label for="portfolio">Portfolio Name <span class="text-danger">*</span></label>
        <input type="text" name="portfolio" id="portfolio" class="form-control"
            value="{{$portfolio->portfolio ?? old('portfolio')}}" placeholder="Portfolio Name" required>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <label for="portfolio">Portfolio Description</label>
        <textarea name="portfolio_description" class="textarea form-control">
            @if (isset($portfolio->portfolio_description))
                {!! $portfolio->portfolio_description !!}
            @endif
        </textarea>
    </div>
</div>