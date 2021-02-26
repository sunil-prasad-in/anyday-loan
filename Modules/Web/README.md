# Coompiling Asses With Laravel Mixer
## Ref: https://nwidart.com/laravel-modules/v6/introduction
## Ref: https://nwidart.com/laravel-modules/v6/basic-usage/compiling-assets

## Run Composer and Laravel mixer dependencies
## Run project php artisan serve
## Open url: http://localhost:8000/web to see it in action

1. We are keeping our project Modular and this module for the website.
2. This module is only for frontend development. You can create Views, Css, Js but backend code should not be developed in this module.
3. You will require to run laravel mix setup inside this module to start working.
4. Use laravel mix to generate JS and CSS. laravel mix for module.
5. You should only write common function into library or helpers of this module only. Use DRY (Don't Repeat Your Code).
6. Page specfic css should not be written in global css. Page specfic js should not be written in global JS. This setup come with example how to inject js & css to a page.

