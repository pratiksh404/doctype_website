<div class="row">
    <div class="col-lg-12">
        <label for="question">Quesion <span class="text-danger">*</span></label>
        <input type="text" name="question" id="question" class="form-control"
            value="{{$faq->question ?? old('question')}}" placeholder="Quesion">
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <label for="answer">Answer <span class="text-danger">*</span></label>
        <textarea name="answer" id="answer" class="textarea">
            @if (isset($faq->answer))
                {!! $faq->answer !!}
            @endif
        </textarea>
    </div>
</div>
<br>