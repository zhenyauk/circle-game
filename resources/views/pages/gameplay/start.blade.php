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
                            <div class="value" style="background-size: cover;">0%</div>
                            <div class="progress-bar" data-value="{{round($question->id * 16.67)}}%" style="width: 30%; background-size: cover;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9">
                    @if(isset($finish) && $finish === 1)
                        <results />
                        <div class="card-body" style="font-size: 24px">
                           <div>Чекаємо, коли інші учасники закінчать відповідати</div>
                           <div>Справа ти можеш бачити хто ще не закінчив ->>></div>
                        </div>
                        <div>
                            @isset($game->id)
                            @if(auth()->id() === $game->id)
                                <a href="" class="btn btn-danger">Закінчити примусово (якщо хтось завис в прямому чи переносному змісті)</a>
                            @endif
                            @endisset
                        </div>
                        @else
                             <div class="card" >
                        <img class="card-img-top" >
                        <div class="card-body" style="font-size: 24px">
                            <div>
                                <span style="font-weight: bold">Запитання: </span>
                                {{$question->question}}
                            </div>
                            <br>
                            <form action="{{route('start.save')}}" method="post">
                                @csrf
                                <input type="hidden" name="qid" value="{{$question->id}}">
                                <input required type="text" name="answer" placeholder="Відповідь" style="width:100%">
                                <br><br>
                                <button style="width: 100%" type="submit" class="btn btn-success btn-lg">Зберегти</button>
                            </form>
                        </div>
                    </div>
                        @endif
                </div>

                <div class="col-md-3">
                    <users gid="{{$game->id ?? 1}}"    @if(auth()->id() === $game->id) admin="1" @else admin="0" @endif/>
                </div>


            </div>
        </div>
    </section>



    </div>

@stop

