@extends('layouts.app')

@section('content')
<section id="pointshop" class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Point Shop</h1>
            @foreach ($products as $row)
            @if(empty($row->image))
                @break
            @endif
            @for ($i = 0; $i <= count($row->id)-1; $i++)
            <div class="panel panel-default">
                <div class="item_box">
                    <img class="shop_item_image" src="images/{{$row->image}}">
                    <article class="shop_item_desc">
                        <h4>{{$row->name}}</h4>
                        <p>{{$row->price}} points</p>
                    </article>
                    <p class="shop_item_buy"><a href="pointshop/{{$row->id}}">BUY</a></p>
                </div>
            </div>
            @endfor
            @endforeach
        </div>
    </div>
</section>
@endsection
