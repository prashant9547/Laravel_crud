
<div class="form-group">
    <span class="starerrtext-muted"> * required field</span>
    </div>
    <div class="row">
        <div class="col-md-6">
                <div class="form-group{{ $errors->has('PcategoryName') ? ' has-error' : '' }}">
                        <label class="control-label">Parent Category Name <span class="startext-muted"> * </span> </label>
                        {{ Form::text('PcategoryName',null,['class'=>'form-control','placeholder'=>'Enter Parent Category Name','id'=>'PcategoryName','name'=>'PcategoryName']) }}
                        @if ($errors->has('PcategoryName'))
                        <span class="help-block">
                                <strong>{{ $errors->first('PcategoryName') }}</strong>
                            </span> @endif
                        <p class="egtext-muted">eg. Home & Decor, Hardware</p>
                    </div>
        </div>
        {{-- <div class="col-md-6">
                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                        <label class="control-label">Status</label>
                        <div class="onoffswitch">
                            <input type="checkbox" class="onoffswitch-checkbox" value="0" name="status" id="status" checked data-toggle="toggle">
                            <label class="onoffswitch-label" for="status">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
                    </div>
        </div> --}}
        <div class="col-md-6">
                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                        <label class="control-label">Status </label>
                        <div class="onoffswitch">
                              {{ Form::checkbox('status',0, true, ['class' => 'form-control onoffswitch-checkbox','name'=>'status','id'=>'status',"data-toggle"=>"toggle"]) }}  
                             {{-- {{ Form::checkbox('status', 'yes', true, array('class' => 'form-control onoffswitch-checkbox','name'=>'status','id'=>'status',"data-toggle"=>"toggle")) }} --}}
                             <label class="onoffswitch-label" for="status">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
                    </div> 
        </div>
    </div>

    {{-- <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
            <label class="control-label">Status</label>
            {{ Form::checkbox('status',null,['class'=>'form-control','id'=>'status','name'=>'status','checked'=>'true']) }}
            @if ($errors->has('status'))
            <span class="help-block">
                    <strong>{{ $errors->first('status') }}</strong>
                </span> @endif
        </div> --}}




{{-- <div class="form-group{{ $errors->has('PcategoryName') ? ' has-error' : '' }}">
    <label class="control-label">Parent Category Name <span class="startext-muted"> * </span> </label>
    {{ Form::text('PcategoryName',null,['class'=>'form-control','placeholder'=>'Enter Parent Category Name','id'=>'PcategoryName','name'=>'PcategoryName']) }}
    @if ($errors->has('PcategoryName'))
    <span class="help-block">
            <strong>{{ $errors->first('PcategoryName') }}</strong>
        </span> @endif
</div> --}}

{{-- <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
    <label class="control-label">Status</label>
    <div class="onoffswitch">
        <input type="checkbox" class="onoffswitch-checkbox" name="status" id="status" checked>
        <label class="onoffswitch-label" for="status">
            <span class="onoffswitch-inner"></span>
            <span class="onoffswitch-switch"></span>
        </label>
    </div>
</div> --}}





