@extends('layouts.master')

@section('content')
  @include('blocks.header')

  {{ $product->name }}
@endsection