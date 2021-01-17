@extends('layouts.master')

@section('title') Create @stop

@section('content')

    <div class="no-bottom no-top" id="content">
        <div id="top"></div>

        <!-- section begin -->
        <section id="subheader" data-bgimage="url(/images/background/5.png) bottom">
            <div class="center-y relative text-center" data-scroll-speed="4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <form action='blank.php' class="row" id='form_subscribe' method="post" name="myForm">

                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->


        <section class="no-top" data-bgimage="url(/images/background/3.png) top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="col-md-12 text-center">
                            <h2>Створити гру</h2>
                        </div>
                        <form name="contactForm" class="form-border" method="post" action='{{route('game.store')}}'>
                            @csrf
                            <h4>Введіть назву гри</h4>
                            <div class="field-set">
                                <label>Назва <small>Латиницею</small></label>
                                <input type='text' name='name' id='name' class="form-control" placeholder="">
                            </div>


                            <input type='submit'  value='Створити' class="btn btn-custom color-2">

                            <div id='submit' class="pull-left">



                                <div class="clearfix"></div>

                                <div class="spacer-single"></div>

                                <!-- social icons -->

                                <!-- social icons close -->

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt60 pb60 bg-color-2 text-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8 mb-sm-30 text-lg-left text-sm-center">
                        <h3 class="no-bottom">Awesomeness begin here. Are you ready?</h3>
                    </div>

                    <div class="col-md-4 text-lg-right text-sm-center">
                        <a href="#" class="btn-custom capsule med">Let's do it!</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

@stop

