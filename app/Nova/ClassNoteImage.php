<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;


class ClassNoteImage extends Resource
{
    /**
     * Indicates if the resource should be displayed in the sidebar.
     *
     * @var bool
     */
    public static $displayInNavigation = false;

    /**
     * The model the resource corresponds to.
     *
     * @var  string
     */
    public static $model = \App\ClassNoteImage::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var  string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var  array
     */
    public static $search = [
        'id', 'name', 'file'
    ];

    /**
     * Get the displayable label of the resource.
     *
     * @return  string
     */
    public static function label()
    {
        return __('Class Note Images');
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return  string
     */
    public static function singularLabel()
    {
        return __('Class Note Image');
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return  array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('Id'), 'id')
                ->rules('required')
                ->sortable()
            ,
            BelongsTo::make('ClassNote')
                ->rules('required')
                ->searchable()
                ->sortable()
            ,
            Text::make(__('Name'), 'name')
                ->rules('required')
                ->sortable()
            ,
            Text::make(__('Description'), 'description')
                ->sortable()
            ,
            Image::make(__('File'), 'file')
                ->rules('required')
                ->sortable()
            ,
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return  array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return  array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return  array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return  array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
