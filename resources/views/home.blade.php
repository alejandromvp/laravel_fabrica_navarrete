@extends('layouts.app')

@section('content')
<div class="container-fluid">
     <container user_autentication="{{ Auth::user()->name }}" user_icon="{{ Auth::user()->url_photo_profile }}"></container>
</div>
@endsection

