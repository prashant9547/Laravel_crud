<div class="form-group{{ $errors->has('unitName') ? ' has-error' : '' }}">
    <label class="control-label">Unit Name</label> 
    {{ Form::text('unitName',null,['class'=>'form-control','placeholder'=>'Enter Unit Name','id'=>'unitName','name'=>'unitName']) }} 
    @if ($errors->has('unitName'))
    <span class="help-block">
            <strong>{{ $errors->first('unitName') }}</strong>
        </span> @endif
</div>
<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
    <label class="control-label">Status</label>
    <div class="onoffswitch">
        <input type="checkbox" checked="" class="onoffswitch-checkbox" name="status" id="status" value="">
        <label class="onoffswitch-label" for="status">
            <span class="onoffswitch-inner"></span>
            <span class="onoffswitch-switch"></span>
        </label>
    </div>
</div>


{{-- <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
        <label class="control-label">Status</label> 
        {{ Form::checkbox('status',null,['class'=>'form-control','id'=>'example1','name'=>'example1']) }} 
        @if ($errors->has('status'))
        <span class="help-block">
                <strong>{{ $errors->first('status') }}</strong>
            </span> @endif
    </div> --}}