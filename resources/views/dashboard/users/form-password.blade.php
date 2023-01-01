<div class="row mb-2">
    <div class="profile-title">
        <div class="media">
            <img class="img-70 rounded-circle" alt="Avatar {{$model->name}}" src="{{$model->photo}}" />
            <div class="media-body">
                <h3 class="mb-1 f-20 txt-primary">{{$model->name}}</h3>
                @if($model->user_type =='dashboard')
                    <p class="f-12">{{__('admin/home.admin_title')}}</p>
                @else
                    <p class="f-2">{{$model->user_type}}</p>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="mb-5"><h5>{{__('admin/user.change_password')}}</h5></div>

<div class="mb-3">
    <label class="form-label">{{__('admin/user.current_password')}}</label>
    <input class="form-control @error('current_password') is-invalid @enderror" name="current_password" type="password" placeholder="{{__('admin/user.enter_current_password')}}"/>
    @error('current_password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="mb-3">
    <label class="form-label">{{__('admin/user.new_password')}}</label>
    <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" placeholder="{{__('admin/user.enter_password')}}"/>
    @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="mb-3">
    <label class="form-label">{{__('admin/user.confirm_new_password')}}</label>
    <input class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" type="password" placeholder="{{__('admin/user.enter_password_confirmation')}}"/>
    @error('password_confirmation')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
