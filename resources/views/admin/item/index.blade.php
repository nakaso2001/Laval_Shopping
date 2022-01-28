@extends('layouts.app')

@section('content')
<h2>商品一覧</h2>
<a class="btn btn-primary" href="{{ route('admin.item.create') }}">商品追加</a>

<table class="table">
  <tr>
    <th></th>
    <th>{{__('label.item_name')}}</th>
    <th>{{__('label.item_code')}}</th>
    <th>{{__('label.price')}}</th>
    <th>{{__('label.stock')}}</th>
  </tr>

  @if($items)
  @foreach($items as $item)
  <tr>
    <td><a class="btn btn-outline-primary" href="{{ route('admin.item.edit', $item->id) }}">{{__('Edit')}}</a></td>
    <td>{{ $item->name }}</td>
    <td>{{ $item->code }}</td>
    <td>{{ $item->price }}</td>
    <td>{{ $item->stock }}</td>
  </tr>
  @endforeach
  @endif
</table>
@endsection