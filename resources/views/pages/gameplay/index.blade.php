@extends('layouts.master')

@section('title') Create @stop

@section('content')



        <section style="margin-top:80px" class="no-top" data-bgimage="url(/images/background/3.png) top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="background-size: cover;" >
                        <div class="skill-bar style-2" style="background-size: cover;">
                            <h5>Прогрес</h5>
                            <div class="de-progress" style="background-size: cover;">
                                <div class="value" style="background-size: cover;">80%</div>
                                <div class="progress-bar" data-value="30%" style="width: 30%; background-size: cover;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-9">
                        <div class="card" >
                            <img class="card-img-top" >
                            <div class="card-body">
                                <h5 class="card-title"><bold>Назва гри: </bold>{{$game->name}}</h5>
                                <p class="card-text">Чекаємо старту гри від ведучого.</p>
                                @if(auth()->id() === $game->user_id)
                                    <p class="card-text">
                                        <span style="font-weight: bold">Ти ведучий.</span> Як тільки всі учасники підключаться, нажми старт. Після цього, вже ніхто не зможе підключитись до гри
                                    </p>
                                    <form action="{{route('start')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="start" value="{{$game->id}}">
                                        <button type="submit" class="btn btn-primary btn-lg">Розпочати гру!</button>
                                    </form>

                                @endif
                                <checkstart gid="{{$game->id ?? 1}}"/>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">


                        <br>
                        <users gid="{{$game->id ?? 1}}" />


                    </div>


                </div>
            </div>
        </section>



    </div>

@stop

