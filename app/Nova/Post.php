<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\MorphMany;
use Laravel\Nova\Fields\MorphOne;
use Laravel\Nova\Fields\MorphTo;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Post extends Resource
{
    public static $group = 'Menu';

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Post::class;

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
        'id', 'title', 'description', 'author', 'user_id'
    ];

    public static function scoutQuery(NovaRequest $request, $query)
    {
        return $query;
    }

    public static $scoutSearchResults = 20;

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable()->hideFromIndex(),

            Text::make('Title')
                ->required(true),

            Text::make('Body')
                ->hideFromIndex(),

            Text::make('Description'),

            Text::make('Author'),

            Image::make('Image'),

            BelongsTo::make('Belong To', 'user', 'App\Nova\User')
                ->searchable()
                ->withSubtitles()
                ->required(true),

            BelongsTo::make('Supervisor', 'supervisor', 'App\Nova\User')
                ->searchable()
                ->withSubtitles()
                ->required(true),

            HasOne::make('Supervisor', 'supervisor', 'App\Nova\User'),
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
        return [];
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
        return '<svg class="w-6 h-6" style="color: #33FFF6;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>';
    }
}
