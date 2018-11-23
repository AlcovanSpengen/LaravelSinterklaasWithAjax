@extends('main')

@section('title', '| View Wishlist')

@section('content')

<div class="row">
    <div class="col-md-8">
        <h1>{{ $wishlist->title }}</h1>
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
        <div class="well">
            <dl class="dl-horizontal">
                <label>Created At:</label>
                <p>{{ date('M j, Y H:i', strtotime($wishlist->created_at)) }}</p>
            </dl>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                                   
                    {!! Form::open(['route' => ['lists.destroy', $wishlist->id], 'method' => 'DELETE']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    {{ Html::linkRoute('lists.index', 'View my wishlists', [], ['class' => 'btn btn-secondary btn-block']) }}
                </div>
            </div>
        </div>
    </div>
        <hr>
        <div id="backend-comments">
            <h3>Gedichten <small>{{ $wishlist->comments()->count() }} in totaal</small></h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Reactie</th>
                        <th>Gedicht</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wishlist->comments as $comment)
                    <tr>
                        <td>{{ $comment->name }}</td>
                        <td>{{ $comment->email }}</td>
                        <td>{{ $comment->reply }}</td>
                        <td>{{ $comment->comment }}</td>
                        <td>
                            <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary btn-block">Edit</a>
                            <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger btn-block">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    
    
    
</div>



@endsection