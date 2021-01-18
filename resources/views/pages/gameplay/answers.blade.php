@extends('layouts.master')

@section('content')

    <!-- content begin -->


        <section data-bgimage="url(images/background/1.png) bottom" class="full-height vertical-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12" style="background-size: cover;">
                        <!-- Accordion -->
                        <div id="accordion-1" class="accordion accordion-style-1" style="background-size: cover;">

                            <!-- Accordion item 1 -->
                            @foreach($questions as $q)
                            <div class="card" style="background-size: cover;">
                                <div id="heading-{{$loop->iteration}}" class="card-header bg-white shadow-sm border-0" style="background-size: cover;">
                                    <h6 class="mb-0 font-weight-bold"><a href="#" data-toggle="collapse" data-target="#collapse-{{$loop->iteration}}" aria-expanded="false" aria-controls="collapse-{{$loop->iteration}}" class="d-block position-relative text-dark collapsible-link py-2 collapsed">{{$q->question}}</a></h6>
                                </div>
                                <div id="collapse-{{$loop->iteration}}" aria-labelledby="heading-{{$loop->iteration}}" data-parent="#accordion-1" class="collapse" style="background-size: cover;">
                                    <div class="card-body p-4" style="background-size: cover;">
                                        <p class="m-0">
                                            {{$q->answers($q->id, $user->id, $game->id)->first()->answer ?? 'Oops :('}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </section>
    <section class=" vertical-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12" style="background-size: cover;">
                    @if($game->user_id === auth()->id())
                        <a href="/game/playa-gain"><button class="btn btn-danger btn-lg">Грати ще раз</button></a>
                    @endif
                </div>
            </div>
        </div>
    </section>


    </div>
    <!-- content close -->

@stop
