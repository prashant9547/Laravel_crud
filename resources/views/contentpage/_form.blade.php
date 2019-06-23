{{-- <div class="col-md-6">
<div class="form-group{{ $errors->has('page-slug') ? ' has-error' : '' }}">
    <label class="control-label"> Page Slug </label>
            {{ Form::text('page-slug',null,['class'=>'form-control','id'=>'page-slug','name'=>'page-slug','placeholder'=>'Enter Page Slug ']) }}
                @if ($errors->has('page-slug'))
                    <span class="help-block">
                        <strong>{{ $errors->first('page-slug') }}</strong>
                    </span>
                @endif
            </div>
</div> --}}
<div class="col-md-6">
<div class="form-group{{ $errors->has('content_title') ? ' has-error' : '' }}">
        <label class="control-label"> Content Title </label>
                {{ Form::text('content_title',null,['class'=>'form-control','id'=>'content_title','name'=>'content_title','placeholder'=>'Enter Content Title ']) }}
                    @if ($errors->has('content_title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('content_title') }}</strong>
                        </span>
                    @endif
    
    </div>
</div>
    
<div class="col-md-12">
    <div class="form-group{{ $errors->has('content_des') ? ' has-error' : '' }}">
        <label class="control-label"> Content Description </label>
                {{ Form::textarea('content_desc',null,['class'=>'form-control','id'=>'summernote','name'=>'summernote','placeholder'=>'Enter Content Description ']) }}
                    @if ($errors->has('content_desc'))
                        <span class="help-block">
                            <strong>{{ $errors->first('content_desc') }}</strong>
                        </span>
                    @endif
    
    </div>
</div>