@extends('main')

@section('title', '| Create New Wishlist')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Wishlist</h1>
            <hr>
            {!! Form::open(array('route' => 'lists.store', 'data-parsley-validate' => '')) !!}
                {{ Form::label('title', 'Title:', ['class' => 'form-spacing-top']) }}
                {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'minlength' => '3', 'maxlength' => '100')) }}

                {{ Form::label('body', 'Toelichting:', ['class' => 'form-spacing-top']) }}
                {{ Form::text('body', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}
                            
                {{ Form::label('product1', 'Product 1:', ['class' => 'form-spacing-top']) }}
                {{ Form::text('product1', null, array('class' => 'form-control')) }}

                {{ Form::label('product2', 'Product 2:', ['class' => 'form-spacing-top']) }}
                {{ Form::text('product2', null, array('class' => 'form-control')) }}

                {{ Form::label('product3', 'Product 3:', ['class' => 'form-spacing-top']) }}
                {{ Form::text('product3', null, array('class' => 'form-control')) }}

                {{ Form::label('product4', 'Product 4:', ['class' => 'form-spacing-top']) }}
                {{ Form::text('product4', null, array('class' => 'form-control')) }}
                
                {{ Form::label('product5', 'Product 5:', ['class' => 'form-spacing-top']) }}
                {{ Form::text('product5', null, array('class' => 'form-control')) }}
                
                {{ Form::submit('Create Wishlist', array('class' => 'btn btn-success btn-lg btn-block')) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection



    