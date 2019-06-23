
<div class="form-group{{ $errors->has('cat_id') ? ' has-error' : '' }}">
    <label class="control-label"> Categories Name</label>
	    {{-- {{ Form::select('cat_id',$categories->plucks('catName','id'),null ,['placeholder' => 'Pick Categories','class'=>'form-control']) }} --}}
        <select class="form-control" name="cat_id" id='cat_id'>
            @foreach($categories as $category)
            <option {{ $category['id'] == @$cat_id? 'selected' : ''}}  value="{{ $category['id'] }}">{{ $category['catName'] }}</option>
            @endforeach
              
        </select>
                @if ($errors->has('cat_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('cat_id') }}</strong>
                    </span>
                @endif

</div>
<div class="form-group{{ $errors->has('sub_catName') ? ' has-error' : '' }}">
    <label class="control-label">Sub_Categories Name</label>
            {{ Form::text('sub_catName',null,['class'=>'form-control','id'=>'sub_catName','name'=>'sub_catName','placeholder'=>'Enter Sub Categories Name']) }}
                 @if ($errors->has('sub_catName'))
                    <span class="help-block">
                        <strong>{{ $errors->first('sub_catName') }}</strong>
                    </span>
                    @endif

</div>
<div class="form-group{{ $errors->has('sub_catImg') ? ' has-error' : '' }}">
    <label class="control-label">Sub_Categories Image</label>
            {{ Form::file('sub_catImg',null,['class'=>'form-control','id'=>'sub_catImg','name'=>'sub_catImg']) }}
                 @if ($errors->has('sub_catImg'))
                    <span class="help-block">
                        <strong>{{ $errors->first('sub_catImg') }}</strong>
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






