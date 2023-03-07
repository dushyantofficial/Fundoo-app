<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fundoo App | {{$faqs[0]['page_title']}}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://demos.creative-tim.com/material-kit-pro/assets/css/material-kit-pro.min.css?v=3.0.2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <style>
        /*.wrap {*/
        /*    display: flex;*/
        /*    justify-content: space-around;*/
        /*    align-items: center;*/
        /*    box-sizing: border-box;*/
        /*    height: 100vh;*/
        /*    background-color: #eee;*/
        /*    font-family: sans-serif;*/
        /*    line-height: 1.5;*/
        /*    letter-spacing: 1px;*/
        /*}*/

        /*.container {*/
        /*    display: flex;*/
        /*    flex-direction: column;*/
        /*    box-sizing: border-box;*/
        /*    padding: 1rem;*/
        /*    background-color: #fff;*/
        /*    width: 768px;*/
        /*    height: 100%;*/
        /*    border-radius: 0.25rem;*/
        /*    box-shadow: 0rem 1rem 2rem -0.25rem rgba(0, 0, 0, 0.25);*/
        /*}*/
        /*.container__heading {*/
        /*    padding: 1rem 0;*/
        /*    border-bottom: 1px solid #ccc;*/
        /*    text-align: center;*/
        /*}*/
        /*.container__heading > h2 {*/
        /*    font-size: 1.75rem;*/
        /*    line-height: 1.75rem;*/
        /*    margin: 0;*/
        /*}*/
        /*.container__content {*/
        /*    flex-grow: 1;*/
        /*    overflow-y: scroll;*/
        /*}*/
        /*.container__nav {*/
        /*    border-top: 1px solid #ccc;*/
        /*    text-align: right;*/
        /*    padding: 2rem 0 1rem;*/
        /*}*/
        /*.container__nav > .button {*/
        /*    background-color: #444499;*/
        /*    box-shadow: 0rem 0.5rem 1rem -0.125rem rgba(0, 0, 0, 0.25);*/
        /*    padding: 0.8rem 2rem;*/
        /*    border-radius: 0.5rem;*/
        /*    color: #fff;*/
        /*    text-decoration: none;*/
        /*    font-size: 0.9rem;*/
        /*    transition: transform 0.25s, box-shadow 0.25s;*/
        /*}*/
        /*.container__nav > .button:hover {*/
        /*    box-shadow: 0rem 0rem 1rem -0.125rem rgba(0, 0, 0, 0.25);*/
        /*    transform: translateY(-0.5rem);*/
        /*}*/
        /*.container__nav > small {*/
        /*    color: #777;*/
        /*    margin-right: 1rem;*/
        /*}*/
    </style>
</head>
<body>

<section class="py-4">
    <div class="container">
        <div class="row my-5">
            <div class="col-md-6 mx-auto text-center">
                <h2>Frequently Asked Questions</h2>
            </div>
        </div>
        {{--        <div class="row">--}}
        {{--            <div class="col-md-10 mx-auto">--}}
        {{--                <div class="accordion" id="accordionRental">--}}
        {{--                    <div class="accordion-item mb-3">--}}
        {{--                        <h5 class="accordion-header" id="headingOne">--}}
        {{--                            <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">--}}
        {{--                                {!!$faq[0]['page_title']!!}--}}
        {{--                                <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0"></i>--}}
        {{--                                <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0"></i>--}}
        {{--                            </button>--}}
        {{--                        </h5>--}}
        {{--                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionRental">--}}
        {{--                            <div class="accordion-body text-sm opacity-8">--}}
        {{--                                {!!$faq[0]['description']!!}--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}

        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}


        <div class="row">
            @foreach($faqs as $faq)
            <div class="col-md-10 mx-auto">
                <div class="accordion" id="accordionRental{{$faq->id}}">
                    <div class="accordion-item mb-3">
                        <h5 class="accordion-header" id="headingOne">
                            <button class="accordion-button border-bottom font-weight-bold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne{{$faq->id}}" aria-expanded="true"
                                    aria-controls="collapseOne">
                                {{$faq->question}}
                                <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0"></i>
                                <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0"></i>
                            </button>
                        </h5>
                        <div id="collapseOne{{$faq->id}}" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                             data-bs-parent="#accordionRental{{$faq->id}}">
                            <div class="accordion-body text-sm opacity-8">
                                {!! $faq->answer !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{--<main class="wrap">--}}
{{--    <section class="container">--}}
{{--        <div class="container__heading">--}}
{{--            <h2 style="color: #FFC100">{!!$faq[0]['page_title']!!}</h2>--}}
{{--        </div>--}}
{{--        <div class="container__content">--}}
{{--            <p>{!!$faq[0]['description']!!}</p>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--</main>--}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js"></script>
</body>
</html>
