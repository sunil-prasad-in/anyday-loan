@extends('web::layouts.master')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-12">
            <h1>Welcome to Anyday Money Website!</h1>
            <b>This view is loaded from module: {!! config('web.name') !!}</b>
        </div>
        <div class="clear-fix"></div>
        <div class="col-12">
            <p>Please read file README.md to start for all refrences!</p>
        </div>
        <div class="clear-fix"></div>
        <div class="col-12">
            <p>
                <b>1.</b> We are keeping our project Modular and this module for the website. <br>
                <b>2.</b> This module is only for frontend development. You can create Views, Css, Js
                but backend code should not be developed in this module. <br>
                <b>3.</b> You will require to run laravel mix setup inside this module to start working. <br>
                <b>4.</b> Use laravel mix to generate JS and CSS. <a href='https://nwidart.com/laravel-modules/v6/basic-usage/compiling-assets'>laravel mix for module.</a> <br>
                <b>5.</b> You should only write common function into library or helpers of this module only. <b>Use DRY (Don't Repeat Your Code).</b> <br>
                <b>6.</b> Helper example is given in this setup. This uppercase string is with the helper help <b>{{ changeToUpperCase('helper.php') }}</b>. <br>
                <b>7.</b> Page specfic css should not be written in global css. Page specfic js should not be written in global JS. 
                   This setup come with example how to inject js & css to a page. <br>
            </p>
        </div>
    </div>

</div>

@endsection

@section('pagejs')
<script src="{{ mix('js/pagespecific.js') }}"></script>
@endsection