@extends('layouts.client')
@section('title', 'Client Dashboard')

@section('content')
<div class="animate-fade-in">
    <h1 class="text-2xl font-bold text-white">
        Welcome {{ Auth::user()->ho_ten }} to the Control Panel
    </h1>
    <p class="text-dark-400 mt-2 text-sm">Manage your websites and personal hosting.</p>
</div>
@endsection
