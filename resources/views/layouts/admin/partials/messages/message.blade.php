@if(session('message') ?? '' )
    @include('layouts.admin.partials.alert.success')
@elseif(session('delete') ?? '' )
    @include('layouts.admin.partials.alert.danger')
@elseif(session('error') ?? '' )
    @include('layouts.admin.partials.alert.error')
@endif
