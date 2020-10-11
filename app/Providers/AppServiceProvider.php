<?php

namespace App\Providers;

use Form;
use Html;
use Validator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Form::component('bsText', 'components.form.text', ['name', 'label' => null, 'value' => null, 'attributes' => []]);
        Form::component('bsTextarea', 'components.form.textarea', ['name', 'label' => null, 'value' => null, 'attributes' => []]);
        Form::component('bsDate', 'components.form.date', ['name', 'label' => null, 'value' => null, 'attributes' => []]);
        Form::component('bsEmail', 'components.form.email', ['name', 'label' => null, 'value' => null, 'attributes' => []]);
        Form::component('bsPassword', 'components.form.password', ['name', 'label' => null, 'attributes' => []]);
        Form::component('bsFile', 'components.form.file', ['name', 'label' => null, 'attributes' => []]);
        Form::component('bsCheckbox', 'components.form.checkbox', ['name', 'label' => null, 'value' => 1, 'checked' => null, 'attributes' => []]);
        Form::component('bsRadio', 'components.form.radio', ['name', 'label' => null, 'value' => 1, 'checked' => null, 'attributes' => []]);
        Form::component('bsSelect', 'components.form.select', ['name', 'label' => null, 'list' => [], 'selected' => null, 'selectAttributes' => [], 'optionsAttributes' => []]);
        Form::component('bsSubmit', 'components.form.submit', ['label' => null, 'attributes' => []]);

        // $rows accept associative array in format: ['name' => ['label']]
        Form::component('bsFields', 'components.form.fields', ['rows' => [], 'data' => null]);

        // $cols accept associative nested array in format: ['name' => ['title', 'filter']]
        Html::component('bsList', 'components.html.list', ['data', 'cols' => []]);

        // $items accept associative array in format: ['route.index' => 'Route name']
        Html::component('bsMenu', 'components.html.menu', ['items', 'attributes' => []]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
