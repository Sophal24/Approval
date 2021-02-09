<?php

namespace App\Nova;

use App\Nova\Lenses\Under25Degree;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Weather extends Resource
{
    public static $group = 'Menu';
    public static $tableStyle = 'tight';

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Weather::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'description', 'max_tem', 'min_tem'
    ];

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->orderBy('id', 'desc');
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

            Text::make('Description')
                ->hideFromIndex(),
                
            Text::make('Description')
                ->displayUsing(function () {
                    $length = strlen($this->description);
                    if($length > 35){
                        return substr($this->description, 0, 35) . '...';
                    }
                    return $this->description;
                })
                ->onlyOnIndex(),

            Text::make('max_tem'),

            Text::make('min_tem'),

            Text::make('day_rain'),

            Text::make('night_rain'),

            // Date::make('Date')
            // ->format('ddd DD MM YYYY')


        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [
            new Under25Degree()
        ];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }

    // Or simply return it as a string
    public static function icon()
    {
        return '<svg class="w-6 h-6" style="color: #33FFF6;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path></svg>';
    }
}
