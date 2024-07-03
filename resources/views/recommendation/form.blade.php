<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('recommendation_name') }}
            {{ Form::text('recommendation_name', $recommendation->recommendation_name, ['class' => 'form-control' . ($errors->has('recommendation_name') ? ' is-invalid' : ''), 'placeholder' => 'Recommendation Name']) }}
            {!! $errors->first('recommendation_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('branch_id') }}
            {{ Form::text('branch_id', $recommendation->branch_id, ['class' => 'form-control' . ($errors->has('branch_id') ? ' is-invalid' : ''), 'placeholder' => 'Branch Id']) }}
            {!! $errors->first('branch_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>