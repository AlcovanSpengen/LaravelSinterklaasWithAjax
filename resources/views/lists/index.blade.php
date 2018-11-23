@extends('main')
@section('title', '| All lists')

@section('content')
    <div class="row">
        <div class="col-md-10">
        <div class="spacing-top"><h1>Wishlists</h1></div>
        </div>
        <div class="col-md-2">
            <a href="{{ route('lists.create') }}" class="btn btn-lg btn-block btn-primary spacing-top">Create New</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Item 1</th>
                    <th>Item 2</th>
                    <th>Item 3</th>
                    <th>Item 4</th>
                    <th>Item 5</th>
                    <th>Created at</th>
                    <th></th>
                </thead>
                <tbody>
                @if (Auth::user()->wishlist->count() )
                    @foreach ($wishlists as $wishlist)
                        <tr>
                            <th>{{ $wishlist->id }}
                            <td>{{ $wishlist->title }}</td>
                            <td>{{ $wishlist->product1 }}</td>
                            <td>{{ $wishlist->product2 }}</td>
                            <td>{{ $wishlist->product3 }}</td>
                            <td>{{ $wishlist->product4 }}</td>
                            <td>{{ $wishlist->product5 }}</td>
                            <td>{{ date('M j, Y H:i', strtotime($wishlist->created_at)) }}</td>
                            <td><a href="{{ route('lists.show', $wishlist->id) }}" class="btn btn-default">View</a></td>
                        </tr>
                    @endforeach
                    @else 
                    <h3>U have no wishlists yet!</h3>
                @endif 
            </table>
            <div class="text-center">{!! $wishlists->links(); !!}</div>
        </div>
    </div>
@endsection