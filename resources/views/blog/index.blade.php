@extends('main')

@section('content')
<div class="row">    
    <div class="col-md-10">
        <div class="spacing-top"><h1>Wishlists</h1></div>
    </div>
    <div class="col-md-2">
        <a href="{{ route('lists.create') }}" class="btn btn-lg btn-block btn-primary btn-spacing-top">Create New</a>
    </div>
    <div class="col-md-12">
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    
        @foreach ($wishlists as $wishlist)
            <div class="col-md-8">
                <h2>{{ $wishlist->title }}</h2>
                <strong>Created by {{ $wishlist->user_id }} ~ </strong>
                <strong>{{ date('M j, Y H:i', strtotime($wishlist->created_at)) }}</strong>
                <hr>
                <p>{{ $wishlist->body }}</p>
                <p>Cadeau's:</p>
                @if (!empty($wishlist->product1))<p>~ {{ $wishlist->product1 }}</p>@endif
                @if (!empty($wishlist->product2))<p>~ {{ $wishlist->product2 }}</p>@endif
                @if (!empty($wishlist->product3))<p>~ {{ $wishlist->product3 }}</p>@endif
                @if (!empty($wishlist->product4))<p>~ {{ $wishlist->product4 }}</p>@endif
                @if (!empty($wishlist->product5))<p>~ {{ $wishlist->product5 }}</p>@endif
            </div>
            <div class="col-md-4">
                <h3>Aantal gedichten: <small>{{ $wishlist->comments()->count() }}</small></h3>
                <a href="{{ route('blog.single', $wishlist->id) }}" class="btn btn-lg btn-block btn-primary">Bekijk gedichten</a>
            </div>
            <hr>
        @endforeach
    </div>
</div>


    

@endsection