@extends('layouts.admin.master')

@section('title') {{$user->name}} @endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>{{$user->name}}</h3>
        @endslot
        <li class="breadcrumb-item">{{__('admin/user.users')}}</li>
        <li class="breadcrumb-item active">{{$user->name}}</li>
    @endcomponent

    <div class="container-fluid">
        <div class="user-profile">
            <div class="row">
                <!-- user users header start-->
                <div class="col-sm-12">
                    <div class="card profile-header">
                        <img class="img-fluid bg-img-cover" src="{{$user->getFirstMediaUrl('cover')}}" alt="cover {{$user->name}}" />
                        <div class="profile-img-wrrap"><img class="img-fluid bg-img-cover" src="{{$user->getFirstMediaUrl('cover')}}" alt="cover {{$user->name}}" /></div>
                        <div class="userpro-box">
                            <div class="img-wrraper">
                                <div class="avatar"><img class="img-fluid" alt="{{$user->name}}" src="{{$user->photo}}" /></div>
                                <a class="icon-wrapper" href="{{route('edit-profile')}}"><i class="icofont icofont-pencil-alt-5"></i></a>
                            </div>
                            <div class="user-designation">
                                <div class="title">
                                    <a target="_blank" href="">
                                        <h4 onMouseOver="this.style.color='#0083FF'" onMouseOut="this.style.color='#B4B6BB'">{{$user->name}}</h4>
                                        @if($user->user_type =='dashboard')
                                            <h6>{{__('admin/home.admin_title')}}</h6>
                                        @else
                                            <h6>{{$user->user_type}}</h6>
                                        @endif
                                    </a>
                                </div>
                                <div class="social-media">
                                    <ul class="user-list-social">
                                        <li>
                                            <a href="https://facebook.com/{{$user->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        {{-- <li>
                                            <a href="https://twitter.com/{{$user->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                                        </li> --}}
                                        <li>
                                            <a href="https://instagram.com/{{$user->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a href="https://whatsapp.com/{{$user->whatsapp}}" target="_blank"><i class="fa fa-whatsapp"></i></a>
                                        </li>
                                        {{-- <li>
                                            <a href="https://t.me/{{$user->telegram}}" target="_blank"><i class="fa fa-telegram"></i></a>
                                        </li> --}}
                                    </ul>
                                </div>
                                <div class="follow">
                                    <ul class="follow-list">
                                        <li>
                                            <div class="follow-num counter">325</div>
                                            <span>Follower</span>
                                        </li>
                                        <li>
                                            <div class="follow-num counter">450</div>
                                            <span>Following</span>
                                        </li>
                                        <li>
                                            <div class="follow-num counter">500</div>
                                            <span>Likes</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- user users header end-->
                <div class="col-xl-3 col-lg-12 col-md-5 xl-35">
                    <div class="default-according style-1 faq-accordion job-accordion">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="p-0">
                                            <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon2" aria-expanded="true" aria-controls="collapseicon2">{{__('admin/user.about_me')}}</button>
                                        </h5>
                                    </div>
                                    <div class="collapse show" id="collapseicon2" aria-labelledby="collapseicon2" data-parent="#accordion">
                                        <div class="card-body post-about">
                                            <ul>
                                                <li>
                                                    <div class="icon"><i data-feather="at-sign"></i></div>
                                                    <div>
                                                        <h5>{{$user->username ?? __('admin/home.alertUsername')}}</h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="icon">
                                                        <i data-feather="mail"></i>
                                                    </div>
                                                    <div>
                                                        <h5>{{$user->email ?? __('admin/home.alertEmail')}}</h5>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="icon"><i data-feather="map-pin"></i></div>
                                                    <div>
                                                        <h5>{{$user->address ?? __('admin/home.alertLocation')}}</h5>
                                                        <p>{{$user->city->name ?? ''}} - {{$user->governorate->name ?? ''}} - {{$user->country->name ?? ''}}</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="icon"><i class="icofont icofont-air-balloon"></i></div>
                                                    <div>
                                                        <h5>{{$user->dob}}</h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    @if($user->gender == 'Male')
                                                        <div class="icon"><i class="fa fa-male"></i></div>
                                                    @else
                                                        <div class="icon"><i class="fa fa-venus"></i></div>
                                                    @endif
                                                    <div>
                                                        <h5>{{$user->gender ?? __('admin/home.alertGender')}}</h5>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-xl-9 col-lg-12 col-md-7 xl-65">
                    <div class="card">
                        <div class="card-body">
                            @forelse($events as $event)
                            <!-- event start-->
                            <div class="col-xxl-12 col-lg-12">
                                <div class="project-box">
                                    @if($event->status == 'Stopped')
                                    <span class="badge badge-danger">{{$event->status}}</span>
                                    @elseif($event->status == 'Available')
                                    <span class="badge badge-success" style="color:bisque;">{{$event->status}}</span>
                                    @elseif($event->status == 'Expired')
                                    <span class="badge badge-dark">{{$event->status}}</span>
                                    @endif
                                    <h6>{{$event->title}}</h6>
                                    <div class="media">
                                        <img class="img-20 me-2 rounded-circle" src="{{asset('admin/images/user/3.jpg')}}" alt="" data-original-title="" title="" />
                                        <div class="media-body">
                                            <p>{{$event->user->name ?? ''}}</p>
                                        </div>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <div class="row details">
                                        <div class="col-6"><span>{{__('admin/event.time')}}</span></div>
                                        <div class="col-6 font-secondary">{{$event->time}}</div>
                                        <div class="col-6"><span>{{__('admin/event.date')}}</span></div>
                                        <div class="col-6 font-secondary">{{$event->date}}</div>
                                        <div class="col-6"><span>{{__('admin/event.budget')}}</span></div>
                                        <div class="col-6 font-danger">{{$event->budget}} {{__('admin/home.currency')}}</div>
                                    </div>
                                </div>
                            </div>
                                <!-- event end-->
                            @empty
                                <div class="alert alert-secondary">
                                    There is no data yet.
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{asset('admin/js/counter/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('admin/js/counter/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('admin/js/counter/counter-custom.js')}}"></script>
    @endpush
@endsection
