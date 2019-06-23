<div class="form-group{{ $errors->has('slider_title') ? ' has-error' : '' }}">
    <label class="control-label">Slider Title </label>
	        {{ Form::text('slider_title',null,['class'=>'form-control','placeholder'=>'Enter Slider Title Name','id'=>'slider_title','name'=>'slider_title']) }}
                @if ($errors->has('slider_title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('slider_title') }}</strong>
                    </span>
                @endif

</div>
<div class="form-group{{ $errors->has('slider_caption') ? ' has-error' : '' }}">
    <label class="control-label">Slider Caption </label>
	        {{ Form::text('slider_caption',null,['class'=>'form-control','placeholder'=>'Enter Slider Caption ','id'=>'slider_caption','name'=>'slider_caption']) }}
                @if ($errors->has('slider_caption'))
                    <span class="help-block">
                        <strong>{{ $errors->first('slider_caption') }}</strong>
                    </span>
                @endif

</div>
<div class="form-group{{ $errors->has('button_text') ? ' has-error' : '' }}">
    <label class="control-label">Button Text </label>
	        {{ Form::text('button_text',null,['class'=>'form-control','placeholder'=>'Enter Button Text','id'=>'button_text','name'=>'button_text']) }}
                @if ($errors->has('button_text'))
                    <span class="help-block">
                        <strong>{{ $errors->first('button_text') }}</strong>
                    </span>
                @endif

</div>
<div class="form-group{{ $errors->has('button_url') ? ' has-error' : '' }}">
    <label class="control-label"> Button Url</label>
	        {{ Form::url('button_url',null,['class'=>'form-control','placeholder'=>'Enter Button Url','id'=>'button_url','name'=>'button_url']) }}
                @if ($errors->has('button_url'))
                    <span class="help-block">
                        <strong>{{ $errors->first('button_url') }}</strong>
                    </span>
                @endif

</div>
<div class="form-group{{ $errors->has('slider_img') ? ' has-error' : '' }}">
    <label class="control-label">Slider Image</label>
            {{ Form::file('slider_img',null,['class'=>'form-control','id'=>'slider_img','name'=>'slider_img']) }}
                 @if ($errors->has('slider_img'))
                    <span class="help-block">
                        <strong>{{ $errors->first('slider_img') }}</strong>
                    </span>
                    @endif

</div>





