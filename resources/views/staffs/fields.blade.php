<div class="row">
<h3 class="mt-5 mb-5"><u>Clinic Information</u></h3>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('first_name', __('Clinic Name').':', ['class' => 'form-label required']) }}
            {{ Form::text('first_name', isset($staff) ? $staff->first_name : null, ['class' => 'form-control', 'placeholder' => __('Clinic Name'), 'required']) }}
            
        </div>
    </div>

    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('no_izin', __('No. Izin').':', ['class' => 'form-label']) }}
            {{ Form::text('no_izin', isset($staff) ? $staff->no_izin : null, ['class' => 'form-control', 'placeholder' => __('No. Izin')]) }}
        </div>
    </div>

    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('email', __('messages.staff.email').':', ['class' => 'form-label required']) }}
            {{ Form::email('email', isset($staff) ? $staff->email : null, ['class' => 'form-control', 'placeholder' => __('messages.patient.email'), 'required']) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('no_wa', __('Whatsapp Number').':', ['class' => 'form-label']) }}
            {{ Form::text('no_wa', isset($staff) ? $staff->no_wa : null, ['class' => 'form-control', 'placeholder' => __('Whatsapp Number')]) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('contact', __('Phone Number').':', ['class' => 'form-label']) }}
            <br>
            {{ Form::tel('contact', isset($staff) && $staff->contact ? '+'.$staff->region_code.$staff->contact : null, ['class' => 'form-control', 'placeholder' => __('Phone Number'), 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")','id'=>'phoneNumber']) }}
            {{ Form::hidden('region_code',isset($staff) ? $staff->region_code : null,['id'=>'prefix_code']) }}
            <span id="valid-msg" class="text-success d-none fw-400 fs-small mt-2">{{ __('messages.valid_number') }}</span>
            <span id="error-msg" class="text-danger d-none fw-400 fs-small mt-2">{{ __('messages.invalid_number') }}</span>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('link_map', __('Link Map').':', ['class' => 'form-label']) }}
            {{ Form::text('link_map', isset($staff) ? $staff->link_map : null, ['class' => 'form-control', 'placeholder' => __('Link Map')]) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('Schedule', __('Schedule').':', ['class' => 'form-label']) }}
            {{ Form::textarea('schedule', isset($staff) ? $staff->schedule : null, ['class' => 'form-control', 'rows' => '3', 'cols' => '5', 'placeholder' => __('Schedule')]) }}
        </div>
    </div>
    <div class="col-md-6 mb-5">
        {{ Form::label('City',__('City').':' ,['class' => 'form-label required']) }}
        {{ Form::select('city', $data2['city'], null, ['class' => 'io-select2 form-select', 'id' => 'datacity', 'data-control'=>"select2", 'required', 'placeholder' => __('Select City')]) }}
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('Address', __('Address').':', ['class' => 'form-label']) }}
            {{ Form::textarea('address', isset($staff) ? $staff->address : null, ['class' => 'form-control', 'rows' => '3', 'cols' => '5', 'placeholder' => __('Address')]) }}
        </div>
    </div>
    <div class="col-lg-6 mb-7">
        <div class="mb-3" io-image-input="true">
            <label for="exampleInputImage" class="form-label">{{__('messages.patient.profile')}}:</label>
            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage" id="exampleInputImage" style="background-image: url({{ !empty($staff->profile_image) ? $staff->profile_image : asset('web/media/avatars/male.png') }})">
                    </div>
                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                          data-placement="top" data-bs-original-title="{{ __('messages.user.edit_profile') }}">
                        <label> 
                            <i class="fa-solid fa-pen" id="profileImageIcon"></i> 
                            <input type="file" name="profile_image" class="image-upload d-none profile-validation" accept="image/*" /> 
                        </label> 
                    </span>
                </div>
            </div>
        </div>
    </div>
    <h3 class="mt-5 mb-5"><u>Apoteker Information</u></h3>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('Apoteker Name', __('Apoteker Name').':', ['class' => 'form-label required']) }}
            {{ Form::text('apoteker_name', isset($staff) ? $staff->apoteker_name : null, ['class' => 'form-control', 'placeholder' => __('Apoteker Name'), 'required']) }}
            
        </div>
    </div>

    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('no_izin_apoteker', __('No. Izin Apoteker').':', ['class' => 'form-label']) }}
            {{ Form::text('no_izin_apoteker', isset($staff) ? $staff->no_izin_apoteker : null, ['class' => 'form-control', 'placeholder' => __('No. Izin Apoteker')]) }}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('Schedule Apoteker', __('Schedule Apoteker').':', ['class' => 'form-label']) }}
            {{ Form::textarea('schedule_apoteker', isset($staff) ? $staff->schedule_apoteker : null, ['class' => 'form-control', 'rows' => '3', 'cols' => '5', 'placeholder' => __('Schedule Apoteker')]) }}
        </div>
    </div>
    <h3 class="mt-5 mb-5"><u>Login Information</u></h3>
    <div class="col-md-6 mb-5">
        <div class="mb-1">
            {{ Form::label('password',__('messages.staff.password').':' ,['class' => 'form-label']) }}
            <span class="text-danger">{{isset($staff) ? null : '*' }}</span>
            <span data-bs-toggle="tooltip" title="{{ __('messages.flash.user_8_or') }}">
                <i class="fa fa-question-circle"></i></span>
            <div class="mb-3 position-relative">
                {{Form::password('password',['class' => 'form-control','placeholder' => __('messages.patient.password'),'autocomplete' => 'off','aria-label'=>"Password",'data-toggle'=>"password"])}}
                <span class="position-absolute d-flex align-items-center top-0 bottom-0 end-0 me-4 input-icon input-password-hide cursor-pointer text-gray-600"> <i class="bi bi-eye-slash-fill"></i> </span>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-5">
        <div class="fv-row">
            <div class="mb-1">
                {{ Form::label('confirmPassword',__('messages.staff.confirm_password').':' ,['class' => 'form-label']) }}
                <span class="text-danger">{{isset($staff) ? null : '*' }}</span>
                <span data-bs-toggle="tooltip"
                      title="{{ __('messages.flash.user_8_or') }}">
                    <i class="fa fa-question-circle"></i></span>
                <div class="mb-3 position-relative">
                    {{Form::password('password_confirmation',['class' => 'form-control','placeholder' => __('messages.user.confirm_password'),'autocomplete' => 'off','aria-label'=>"Password",'data-toggle'=>"password"])}}
                    <span class="position-absolute d-flex align-items-center top-0 bottom-0 end-0 me-4 input-icon input-password-hide cursor-pointer text-gray-600"> <i class="bi bi-eye-slash-fill"></i> </span>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex">
    {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-2']) }}
        <a href="{{ route('staffs.index') }}" type="reset"
           class="btn btn-secondary">{{__('messages.common.discard')}}</a>
    </div>
</div>
