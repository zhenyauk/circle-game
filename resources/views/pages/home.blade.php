@extends('layouts.master')

@section('content')

    <!-- content begin -->
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>

        <section data-bgimage="url(images/background/1.png) bottom" class="full-height vertical-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 wow fadeInRight" data-wow-delay=".5s">
                        <a class="btn-custom" style="font-size:2em" href="/login"><i class="fa fa-arrow-down"></i>Приєднатись до гри</a>
                        <br>
                        <br>
                        <h2 style="margin-left:10px;">Зум + Карантин + Зима</h2>


                    </div>

                    <div class="col-lg-6 offset-lg-1 wow fadeInLeft" data-wow-delay=".5s">
                        <img src="/images/misc/1.png" class="img-fluid" alt="" />
                    </div>
                </div>
            </div>
        </section>


    </div>
    <!-- content close -->

@stop
