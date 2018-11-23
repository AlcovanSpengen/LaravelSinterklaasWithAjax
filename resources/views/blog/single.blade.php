@extends('main')

@section('title', "| $wishlist->title")
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
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
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
    @foreach($wishlist->comments as $comment)        
        <div class="comment">
            <p><strong>Name: </strong>{{ $comment->name }}</p>
            <p><strong>Reactie: </strong>{{ $comment->reply }}</p>
            <p><strong>Gedicht: </strong><br>{{ $comment->comment }}</p>
            <hr>
        </div>
    
    @endforeach
    </div>
</div>
<div id="gedicht" class="row">
    <div class="comment-form" class="col-md-8 col-md-offset-2">
        <h3>Aantal gedichten: <small>{{ $wishlist->comments()->count() }}</small></h3>
        <h3>Voeg hier een gedicht toe aan {{ $wishlist->title }} van {{ $wishlist->user_id }}</h3>
        {{ Form::open(['route' => ['comments.store', $wishlist->id], 'method' => 'POST']) }}
            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('name', "Name:") }}
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                </div>
                <div class="col-md-6">
                    {{ Form::label('email', 'Email:') }}
                    {{ Form::text('email', null, ['class' => 'form-control']) }}
                </div>
                <div class="col-md-12">
                    {{ Form::label('reply', "Reactie:") }}
                    {{ Form::textarea('reply', null, ['class' => 'form-control', 'rows' => '3']) }}
                </div>
                <div class="col-md-12">
                    {{ Form::label('comment', "Gedicht:") }}
                    {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5' ]) }}

                    {{ Form::submit('Gedicht toevoegen', ['class' => 'btn btn-success btn-block btn-spacing-top']) }}
                </div>
                
            </div>
            
        {{ Form::close() }}
    </div>
</div>
@endsection