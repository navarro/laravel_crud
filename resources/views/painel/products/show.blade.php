@extends('painel.templates.template')

@section('content')

<a href="{{ route('produtos.index')}}"><span class="glyphicon glyphicon-backward"></span></a>
<h1 class="title-pg">Visualizar produto: {!!$product->name!!}</h1>

<p><b>Ativo: </b>{{$product->active }}</p>
<p><b>Número: </b>{{$product->number }}</p>
<p><b>Categoria: </b>{{$product->category }}</p>
<p><b>Descrição: </b>{{$product->description }}</p>

<hr>

{!! Form::open(['route' => ['produtos.destroy', $product->id], 'method' => 'DELETE']) !!}

    {!! Form::submit("Deletar produto: $product->name", ['class' => 'btn btn-danger'])!!}

{!! Form::close() !!}

@endsection