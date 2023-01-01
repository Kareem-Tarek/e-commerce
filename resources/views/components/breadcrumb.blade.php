<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                {{ $breadcrumb_title ?? '' }}
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    {{ $slot ?? ''}}
                </ol>
            </div>
            <div class="col-lg-6">
                <!-- Bookmark Start-->
                <div class="bookmark">
                    <ul>
                        {{ $bookmark ?? '' }}
                    </ul>
                </div>
                <!-- Bookmark Ends-->
            </div>
        </div>
    </div>
</div>
