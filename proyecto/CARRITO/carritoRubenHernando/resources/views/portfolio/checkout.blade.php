@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('partials.msg')
        <div class="col-md-10">
            @if(Cart::count())
            <div class="row justify-content-between text-center mb-3">
                <div class="col">
                <form method="get" action="{{route('clear')}}">
                    @csrf
                    <input type="submit" name="btn" value="Vaciar carrito" class="btn btn-danger w-20" />
                </form>
                </div>
                <div class="col">
                <form method="get" action="{{route('comprar')}}">
                    @csrf
                    <input type="submit" name="btn" value="Realizar compra" class="btn btn-primary w-20" />
                </form>
                </div>
            </div>
                <table class="table table-striped">
                    <thead>
                        <th></th>
                        <th>NOMBRE</th>
                        <th>CANTIDAD</th>
                        <th>PRECIO UNITARIO</th>
                        <th>IMPORTE</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach(Cart::content() as $item)
                            <tr class="align-middle">
                                <td><img src="{{URL('/img/'.$item->options->image)}}" style="width:50px"></td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->qty}}</td>
                                <td>{{number_format($item->price,2)}}</td>
                                <td>{{number_format($item->price*$item->qty,2)}}</td>
                                <td>
                                    <form method="post" action="{{route('removeone')}}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->rowId }}" />
                                        <input type="submit" name="btn" value="Quitar uno" class="btn btn-danger w-100" />
                                    </form>
                                </td>
                                <td>
                                    <form method="post" action="{{route('removeitem')}}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->rowId }}" />
                                        <input type="submit" name="btn" value="Quitar todos" class="btn btn-danger w-100" />
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr class="fw-bolder">
                            <td colspan="5"></td>
                            <td class="text-end">Total</td>
                            <td class="text-end">{{Cart::subtotal()}}</td>
                        </tr>
                    </tbody>
                </table>
            @else
                <a href="{{URL('/productos')}}" class="text-center">Agregar productos</a>
            @endif
        </div>
    </div>
</div>
@endsection
