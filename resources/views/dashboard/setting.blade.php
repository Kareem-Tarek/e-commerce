@extends('layouts.admin.master')

@section('title') Settings @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Settings</h3>
        @endslot
        <li class="breadcrumb-item active">Settings</li>

    @endcomponent
    @include('layouts.admin.partials.validation-errors')
    <div class="col-sm-12 col-xl-6 xl-100">
        <div class="card">
            <div class="card-header pb-0">
                <h5>Check Changes</h5>
            </div>
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <form action="{{route('setting.update')}}" method="post" id="alert-form">
                        @csrf

                        <div class="tab-pane mt-4" role="tabpanel" aria-labelledby="tabpanel">
                            <div class="form-group row">
                                <label class="form-label col-lg-3">{{__('admin/home.title_site')}} <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input class="form-control @error('title') is-invalid @enderror" required value="{{Request::old('title') ? Request::old('title') : $settings->title}}" type="text" name="title_en" placeholder="title" autocomplete="off">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="form-label col-lg-3">Content Site <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <textarea class="form-control @error('content') is-invalid @enderror" required value="{{Request::old('content') ? Request::old('content') : $settings->content}}" type="text" name="content_en"> </textarea>
                                    @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="form-label col-lg-3">Email <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input class="form-control @error('email') is-invalid @enderror" type="email" required name="email" placeholder="{{__('admin/home.enter_email')}}" autocomplete="off" required value="{{Request::old('email') ? Request::old('email') : $settings->email}}"/>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="form-label col-lg-3">Phone <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" placeholder="{{__('admin/home.enter_phone')}}" autocomplete="off" required value="{{Request::old('phone') ? Request::old('phone') : $settings->phone}}"/>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="form-label col-lg-3">WhatsApp <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input class="form-control @error('whatsApp') is-invalid @enderror" type="tel" name="whatsApp" placeholder="{{__('admin/home.enter_whatsApp')}}" autocomplete="off" required value="{{Request::old('whatsApp') ? Request::old('whatsApp') : $settings->whatsApp}}"/>
                                @error('whatsApp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="form-label col-lg-3">Facebook</label>
                            <div class="col-lg-9">
                                <input class="form-control @error('facebook') is-invalid @enderror" type="text" name="facebook" placeholder="{{__('admin/home.enter_facebook')}}" autocomplete="off" value="{{Request::old('facebook') ? Request::old('facebook') : $settings->facebook}}"/>
                                @error('facebook')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="form-label col-lg-3">Twitter</label>
                            <div class="col-lg-9">
                                <input class="form-control @error('twitter') is-invalid @enderror" type="text" name="twitter" placeholder="{{__('admin/home.enter_twitter')}}" autocomplete="off" value="{{Request::old('twitter') ? Request::old('twitter') : $settings->twitter}}"/>
                                @error('twitter')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="form-label col-lg-3">Instagram</label>
                            <div class="col-lg-9">
                                <input class="form-control @error('instagram') is-invalid @enderror" type="text" name="instagram" placeholder="{{__('admin/home.enter_instagram')}}" autocomplete="off" value="{{Request::old('instagram') ? Request::old('instagram') : $settings->instagram}}"/>
                                @error('instagram')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="form-label col-lg-3">Telegram</label>
                            <div class="col-lg-9">
                                <input class="form-control @error('telegram') is-invalid @enderror" type="text" name="telegram" placeholder="{{__('admin/home.enter_telegram')}}" autocomplete="off" value="{{Request::old('telegram') ? Request::old('telegram') : $settings->telegram}}"/>
                                @error('telegram')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="form-label col-lg-3">LinkedIn</label>
                            <div class="col-lg-9">
                                <input class="form-control @error('linkedin') is-invalid @enderror" type="text" name="linkedin" placeholder="{{__('admin/home.enter_linkedin')}}" autocomplete="off" value="{{Request::old('linkedin') ? Request::old('linkedin') : $settings->linkedin}}"/>
                                @error('linkedin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="form-label col-lg-3">L ocation</label>
                            <div class="col-lg-9">
                                <input class="form-control @error('location') is-invalid @enderror" type="text" name="location" placeholder="{{__('admin/home.enter_location')}}" autocomplete="off" value="{{Request::old('location') ? Request::old('location') : $settings->location}}"/>
                                @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <button class="btn btn-success mt-4 d-block me-auto" type="submit">Update</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
