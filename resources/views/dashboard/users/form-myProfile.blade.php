<div class="card-body">
    <div class="row">
        <div class="col-sm-6 col-md-6">
            <div class="mb-3">
                <label class="form-label">{{__('admin/user.name')}}</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="{{__('admin/user.enter_full_name')}}" autocomplete="off" value="{{Request::old('name') ? Request::old('name') : $model->name}}"/>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="mb-3">
                <label class="form-label">{{__('admin/user.username')}}</label>
                <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" placeholder="{{__('admin/user.enter_username')}}" autocomplete="off" value="{{Request::old('username') ? Request::old('username') : $model->username}}"/>
                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="mb-3">
                <label class="form-label">{{__('admin/user.phone')}}</label>
                <input class="form-control @error('phone') is-invalid @enderror" type="tel" name="phone" placeholder="{{__('admin/user.enter_phone')}}" autocomplete="off" value="{{Request::old('phone') ? Request::old('phone') : $model->phone}}"/>
                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="mb-3">
                <label class="form-label">{{__('admin/user.email')}}</label>
                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="{{__('admin/user.enter_email')}}" autocomplete="off" value="{{Request::old('email') ? Request::old('email') : $model->email}}"/>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <label class="form-label">{{__('admin/user.gender')}}</label>
            <div class="form-group m-checkbox-inline custom-radio-ml">
                <div class="radio radio-primary">
                    <input id="radioinline1" type="radio" name="gender" {{ isset($model) && $model->gender == 'male' ? 'checked'  : '' }}  value="male">
                    <label class="mb-0" for="radioinline1">{{__('admin/user.male')}}</label>
                </div>
                <div class="radio radio-primary">
                    <input id="radioinline2" type="radio" name="gender" {{ isset($model) && $model->gender == 'female' ? 'checked'  : '' }} value="female">
                    <label class="mb-0" for="radioinline2">{{__('admin/user.female')}}</label>

                </div>

            </div>
            @error('gender')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="mb-3">
                <label class="form-label">{{__('admin/user.dob')}}</label>
                <input class="form-control @error('dob') is-invalid @enderror" type="date" name="dob" autocomplete="off" value="{{Request::old('dob') ? Request::old('dob') : $model->dob}}"/>
                @error('dob')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label class="form-label">{{__('admin/user.address')}}</label>
                <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" placeholder="{{__('admin/user.enter_address')}}" autocomplete="off" value="{{Request::old('address') ? Request::old('address') : $model->address}}"/>
                @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="mb-3">
                <label class="form-label">{{__('admin/user.postal_code')}}</label>
                <input class="form-control @error('postal_code') is-invalid @enderror" type="number" name="postal_code" placeholder="{{__('admin/user.enter_postal_code')}}" autocomplete="off" value="{{Request::old('postal_code') ? Request::old('postal_code') : $model->postal_code}}"/>
                @error('postal_code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="mb-3">
                <label class="form-label">{{__('admin/user.state_province')}}</label>
                <input class="form-control @error('state_province') is-invalid @enderror" type="text" name="state_province" placeholder="{{__('admin/user.enter_state_province')}}" autocomplete="off" value="{{Request::old('state_province') ? Request::old('state_province') : $model->state_province}}"/>
                @error('state_province')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label class="form-label">Country</label>
                @inject('countries','App\Models\Country')
                {!! Form::select('country_id',$countries->pluck('name','id'),Request::old('country_id') ? Request::old('country_id') : $model->country_id,[
                    'placeholder' => 'Please select and option',
                    'class'       => 'form-control select'. ( $errors->has('country_id') ? ' is-invalid' : '' )
                ]) !!}
                @error('country_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label class="form-label">Governorate</label>
                @inject('governorate','App\Models\Governorate')
                {!! Form::select('governorate_id',$governorate->pluck('name','id'),Request::old('governorate_id') ? Request::old('governorate_id') : $model->governorate_id,[
                    'placeholder' => 'Please select and option',
                    'class'       => 'form-control select'. ( $errors->has('governorate_id') ? ' is-invalid' : '' )
                ]) !!}
                @error('governorate_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label class="form-label">City</label>
                @inject('cities','App\Models\City')
                {!! Form::select('city_id',$cities->pluck('name','id'),Request::old('city_id') ? Request::old('city_id') : $model->city_id,[
                    'placeholder' => 'Please select and option',
                    'class'       => 'form-control select'.( $errors->has('city_id') ? ' is-invalid' : '' )
                ]) !!}
                @error('city_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label class="form-label">{{__('admin/user.about_me')}}</label>
                <textarea class="form-control" rows="5" name="bio" placeholder="{{__('admin/user.enter_bio')}}">{{Request::old('bio') ? Request::old('bio') : $model->bio}}</textarea>
                @error('bio')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="mb-3 input-group-solid">
                <label class="form-label">{{__('admin/user.facebook')}}</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="icofont icofont-social-facebook"></i></span>
                    <input class="form-control @error('facebook') is-invalid @enderror" type="text" name="facebook" placeholder="{{__('admin/user.enter_facebook')}}" autocomplete="off" value="{{Request::old('facebook') ? Request::old('facebook') : $model->facebook}}"/>
                    @error('facebook')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="mb-3 input-group-solid">
                <label class="form-label">{{__('admin/user.twitter')}}</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="icofont icofont-social-twitter"></i></span>
                    <input class="form-control @error('twitter') is-invalid @enderror" type="text" name="twitter" placeholder="{{__('admin/user.enter_twitter')}}" autocomplete="off" value="{{Request::old('twitter') ? Request::old('twitter') : $model->twitter}}"/>
                    @error('twitter')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4">
            <div class="mb-3 input-group-solid">
                <label class="form-label">{{__('admin/user.instagram')}}</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="icofont icofont-social-instagram"></i></span>
                    <input class="form-control @error('instagram') is-invalid @enderror" type="text" name="instagram" placeholder="{{__('admin/user.enter_instagram')}}" autocomplete="off" value="{{Request::old('instagram') ? Request::old('instagram') : $model->instagram}}"/>
                    @error('instagram')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4">
            <div class="mb-3 input-group-solid">
                <label class="form-label">{{__('admin/user.whatsApp')}}</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="icofont icofont-social-whatsapp"></i></span>
                    <input class="form-control @error('whatsApp') is-invalid @enderror" type="tel" name="whatsApp" placeholder="{{__('admin/user.enter_whatsApp')}}" autocomplete="off" value="{{Request::old('whatsApp') ? Request::old('whatsApp') : $model->whatsApp}}"/>
                    @error('whatsApp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4">
            <div class="mb-3 input-group-solid">
                <label class="form-label">{{__('admin/user.telegram')}}</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="icofont icofont-social-telegram"></i></span>
                    <input class="form-control @error('telegram') is-invalid @enderror" type="text" name="telegram" placeholder="{{__('admin/user.enter_telegram')}}" autocomplete="off" value="{{Request::old('telegram') ? Request::old('telegram') : $model->telegram}}"/>
                    @error('telegram')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="mb-6">
                <label class="form-label">{{__('admin/user.avatar')}}</label>
                <input class="form-control @error('avatar') is-invalid @enderror" type="file" name="avatar"/>
                @error('avatar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="mb-6">
                <label class="form-label">{{__('admin/user.cover')}}</label>
                <input class="form-control @error('cover') is-invalid @enderror" type="file" name="cover"/>
                @error('cover')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

    </div>
</div>
