@extends('layouts.master')

@section('content')

    <!-- content begin -->
    <div class="no-bottom no-top" id="content">


        <section data-bgimage="url(images/background/1.png) bottom" class="full-height vertical-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 wow fadeInRight" data-wow-delay=".5s">
                        @if(isset($games) && $games->count() > 0)
                        <h3 style="margin-left:10px;">Приєднатись до гри (вибери нижче)</h3>
                            @foreach($games as $item)
                                <p><a style="font-size: 26px; color:rebeccapurple" href="/game/join/{{$item->id}}">{{$item->name}}</a></p>
                            @endforeach
                        @else
                            <h2 style="margin-left:10px;">Немає запущених ігор</h2>
                        @endif
                        <br>




                    </div>
                    <div class="col-lg-6 offset-lg-1 wow fadeInLeft" data-wow-delay=".5s">
                        <a class="btn-custom" style="font-size:2em" href="{{route('game.create')}}"><i class="fa fa-arrow-down"></i>Створити гру</a>
                    </div>
                </div>
            </div>
        </section>


    </div>
    <!-- content close -->

@stop
