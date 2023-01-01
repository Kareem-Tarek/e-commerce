<div class="tab-pane mt-4" role="tabpanel">

    <div class="form-group row">
        <label class="form-label col-lg-3">Username <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <input class="form-control @error('username') is-invalid @enderror" value="{{Request::old('username') ? Request::old('username') : $model->username}}" type="text" name="username" placeholder="Enter username" autocomplete="off">
            @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="form-label col-lg-3">Name <span class="text-danger"></span></label>
        <div class="col-lg-9">
            <input class="form-control @error('name') is-invalid @enderror" value="{{Request::old('name') ? Request::old('name') : $model->name}}" type="text" name="name" placeholder="Enter name" autocomplete="off">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="form-label col-lg-3">Email <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            @if(Route::is('users.create'))
                <input class="form-control @error('email') is-invalid @enderror" value="{{Request::old('email') ? Request::old('email') : $model->email}}" type="text" name="email" placeholder="Enter user email" autocomplete="off">
            @elseif(Route::is('users.edit') && $model->email == auth()->user()->email)
                <input class="form-control @error('email') is-invalid @enderror" value="{{Request::old('email') ? Request::old('email') : $model->email}}" type="text" name="email" placeholder="Enter user email" autocomplete="off">
            @elseif(Route::is('users.edit'))
                <input disabled class="form-control @error('email') is-invalid @enderror" value="{{Request::old('email') ? Request::old('email') : $model->email}}" type="text" name="email" placeholder="Enter user email" autocomplete="off">
            @endif
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    @if(Route::is('users.create'))
        <div class="form-group row">
            <label class="form-label col-lg-3">Password <span class="text-danger">*</span></label>
            <div class="col-lg-9">
                <input class="form-control @error('password') is-invalid @enderror" value="{{Request::old('password') ? Request::old('password') : $model->password}}" type="password" name="password" placeholder="Enter user password" autocomplete="off">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="form-label col-lg-3">Confirm Password <span class="text-danger">*</span></label>
            <div class="col-lg-9">
                <input class="form-control @error('password') is-invalid @enderror" value="" type="password" name="confirm_password" placeholder="Enter user confirm password" autocomplete="off">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div> 
    @endif

    <div class="form-group row">
        <label class="form-label col-lg-3">User Type <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <select name="user_type" class="form-control select @error('user_type') is-invalid @enderror" value="{{Request::old('user_type') ? Request::old('user_type') : $model->user_type}}">
                <option value="" disabled selected> ---------- Please select a user type ---------- </option>
                <option value="customer" {{ isset($model) && $model->user_type == "customer" ? 'selected'  : '' }}>Customer</option>
                <option value="supplier" {{ isset($model) && $model->user_type == "supplier" ? 'selected'  : '' }}>Supplier</option>
                <option value="admin" {{ isset($model) && $model->user_type == "admin" ? 'selected'  : '' }}>Admin</option>
                <option value="moderator" {{ isset($model) && $model->user_type == "moderator" ? 'selected'  : '' }}>Moderator</option>
            </select>
            @error('user_type')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="form-label col-lg-3">Phone <span class="text-danger"></span></label>
        <div class="col-lg-9">
            <input class="form-control @error('phone') is-invalid @enderror" value="{{Request::old('phone') ? Request::old('phone') : $model->phone}}" type="text" name="phone" placeholder="Enter user phone" autocomplete="off">
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="form-label col-lg-3">Gender <span class="text-danger"></span></label>
        <div class="col-lg-9">
            <select name="gender" class="form-control select @error('gender') is-invalid @enderror" value="{{Request::old('gender') ? Request::old('gender') : $model->gender}}">
                <option value="" disabled selected> ---------- Please select a gender ---------- </option>
                <option value="male" {{ isset($model) && $model->gender == "male" ? 'selected'  : '' }}>Male</option>
                <option value="female" {{ isset($model) && $model->gender == "female" ? 'selected'  : '' }}>Female</option>
                <option value="unspecified" {{ isset($model) && $model->gender == "unspecified" ? 'selected'  : '' }}>Unspecified</option>
            </select>
            @error('gender')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

</div>