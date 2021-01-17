@extends('layouts.master')

@section('title') Login @stop

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
                            <h2>Щоб розпочати, введіть ім'я</h2>
                        </div>
                        <form name="contactForm" class="form-border" method="post" action='{{route('login.store')}}'>
                            @csrf
                            <div class="field-set">
                                <label>Ім'я <small>Латиницею або кирилецею</small></label>
                                <input type='text' name='name' id='name' class="form-control" placeholder="">
                            </div>

                            <!--
                            <div class="field-set">
                                <label>Пароль</label>
                                <input type='text' name='email' id='email' class="form-control" placeholder="">
                            </div>
                            -->
                            <input type='submit'  value='Вхід' class="btn btn-custom color-2">

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
            <div class="container" style="min-height: 100px">

            </div>
        </section>

    </div>

@stop

