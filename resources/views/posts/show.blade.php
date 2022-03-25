@extends('layouts.app')

@section('content')
    <div class="section-div-1">
        <div class="section-div-2">
            <x-post :post="$post"/>
        </div>
    </div>
@endsection
