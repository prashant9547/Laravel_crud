<div class="form-group{{ $errors->has('sitename_logo') ? ' has-error' : '' }}">
    <label class="control-label"> Select Site (Name Or Logo) </label>
	        {{ Form::select('sitename_logo',['name' => 'Name', 'logo' => 'Logo','name & logo' => 'Name & Logo'],null,['class'=>'form-control','placeholder'=>'Pick a One...','id'=>'sitename_logo','name'=>'sitename_logo']) }}
                @if ($errors->has('sitename_logo'))
                    <span class="help-block">
                        <strong>{{ $errors->first('sitename_logo') }}</strong>
                    </span>
                @endif

</div>
<div id="sname" style="display:none;">
<div class="form-group{{ $errors->has('siteName') ? ' has-error' : '' }}">
    <label class="control-label"> Site Name </label>
	        {{ Form::text('siteName',null,['class'=>'form-control','placeholder'=>'Enter Site Name ','id'=>'siteName','name'=>'siteName']) }}
                @if ($errors->has('siteName'))
                    <span class="help-block">
                        <strong>{{ $errors->first('siteName') }}</strong>
                    </span>
                @endif

</div>
</div>
<div id="slogo" style="display:none;">
<div class="form-group{{ $errors->has('sitelogo') ? ' has-error' : '' }}">
    <label class="control-label">Site Logo </label>
	        {{ Form::file('sitelogo',null,['class'=>'form-control','id'=>'sitelogo','name'=>'sitelogo']) }}
                @if ($errors->has('sitelogo'))
                    <span class="help-block">
                        <strong>{{ $errors->first('sitelogo') }}</strong>
                    </span>
                @endif

</div>
</div>
<div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
        <label class="control-label"> Facebook </label>
                {{ Form::url('facebook',null,['class'=>'form-control','id'=>'facebook','name'=>'facebook','placeholder'=>'Enter Facebook Url ']) }}
                    @if ($errors->has('facebook'))
                        <span class="help-block">
                            <strong>{{ $errors->first('facebook') }}</strong>
                        </span>
                    @endif
    
    </div>
    <div class="form-group{{ $errors->has('google_plus') ? ' has-error' : '' }}">
            <label class="control-label"> Google+ </label>
                    {{ Form::url('google_plus',null,['class'=>'form-control','id'=>'google_plus','name'=>'google_plus','placeholder'=>'Enter Google plus Url ']) }}
                        @if ($errors->has('google_plus'))
                            <span class="help-block">
                                <strong>{{ $errors->first('google_plus') }}</strong>
                            </span>
                        @endif
        
        </div>
        <div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
                <label class="control-label"> Twitter </label>
                        {{ Form::url('twitter',null,['class'=>'form-control','id'=>'twitter','name'=>'twitter','placeholder'=>'Enter Twitter Url ']) }}
                            @if ($errors->has('twitter'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('twitter') }}</strong>
                                </span>
                            @endif
            
            </div>
            <div class="form-group{{ $errors->has('linkedin') ? ' has-error' : '' }}">
                    <label class="control-label"> LinkedIn </label>
                            {{ Form::url('linkedin',null,['class'=>'form-control','id'=>'linkedin','name'=>'linkedin','placeholder'=>'Enter Linkedin Url ']) }}
                                @if ($errors->has('linkedin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('linkedin') }}</strong>
                                    </span>
                                @endif
                
                </div>





