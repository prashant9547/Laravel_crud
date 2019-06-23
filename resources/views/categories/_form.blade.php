<div class="form-group{{ $errors->has('catName') ? ' has-error' : '' }}">
    <label class="control-label"> Categories Name</label>
	        {{ Form::text('catName',null,['class'=>'form-control','placeholder'=>'Enter Categories Name','id'=>'catName','name'=>'catName']) }}
                @if ($errors->has('catName'))
                    <span class="help-block">
                        <strong>{{ $errors->first('catName') }}</strong>
                    </span>
                @endif

</div>
<div class="form-group{{ $errors->has('catImg') ? ' has-error' : '' }}">
    <label class="control-label">Categories Image</label>
            {{ Form::file('catImg',null,['class'=>'form-control','id'=>'catImg','name'=>'catImg']) }}
                 @if ($errors->has('catImg'))
                    <span class="help-block">
                        <strong>{{ $errors->first('catImg') }}</strong>
                    </span>
                    @endif

</div>

{{-- <div class="form-group">
    <label class="control-label">Status</label>
    <div class="switch">
        <div class="onoffswitch">
            <input type="checkbox" class="onoffswitch-checkbox" id="example1">
            <label class="onoffswitch-label" for="example1">
                <span class="onoffswitch-inner"></span>
                <span class="onoffswitch-switch"></span>
            </label>
        </div>
    </div>
</div> --}}






