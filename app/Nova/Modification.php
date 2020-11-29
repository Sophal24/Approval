<?php

namespace App\Nova;

use App\Nova\Actions\Approve;
use App\Nova\Actions\Disapprove;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Modification extends Resource
{
    public static $group = 'Approval';
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Modification::class;

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
        'id',
    ];

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

            Text::make('modifiable_id'),
            Text::make('modifiable_type'),
            Text::make('modifier_id'),
            Text::make('modifier_type'),
            Text::make('active'),
            Text::make('is_update'),
            Text::make('approvers_required')
            ->hideFromIndex(),
            Text::make('disapprovers_required')
            ->hideFromIndex(),
            Text::make('md5')
                ->hideFromIndex(),
            Text::make('modifications')
            ->hideFromIndex(),
            Text::make('created_at')
            ->hideFromIndex(),
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
        return [
            new Approve,
            new Disapprove
        ];
    }
}
