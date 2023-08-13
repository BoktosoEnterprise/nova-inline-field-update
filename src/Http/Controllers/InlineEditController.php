<?php

namespace BoktosoEnterprise\NovaInlineEdit\Http\Controllers;

use Illuminate\Routing\Controller;
use Laravel\Nova\Http\Requests\NovaRequest;

class InlineEditController extends Controller
{
    public function update(NovaRequest $request)
    {
        $resourceClass = $request->resource();
        $resourceValidationRules = $resourceClass::rulesForUpdate($request);
        $fieldValidationRules = $resourceValidationRules[$request->attribute] ?? [];

        // Check if we have validation rules.
        if (!empty($fieldValidationRules)) {
            // Run the validation.
            $validatedData = $request->validate([
                'value' => $fieldValidationRules,
            ]);
        } else {
            // Copy the values as is.
            $validatedData = $request->all();
        }

        $model = $request->model()->find($validatedData->id);
        $model->{$validatedData->attribute} = $validatedData->value;
        $model->save();
    }
}
