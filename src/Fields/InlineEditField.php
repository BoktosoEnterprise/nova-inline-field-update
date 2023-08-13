<?php

namespace BoktosoEnterprise\NovaInlineEdit\Fields;

use Config;
use Laravel\Nova\Fields\Field;
use function BoktosoEnterprise\NovaInlineEdit\data_get;

class InlineEditField extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-inline-edit-field';

    protected function resolveAttribute($resource, $attribute)
    {
        $this->setResourceId(data_get($resource, $resource->getKeyName()));

        return parent::resolveAttribute($resource, $attribute);
    }

    protected function setResourceId($id)
    {
        return $this->withMeta(['id' => $id, 'nova_path' => Config::get('nova.path')]);
    }

    public function minWidth($width = 100)
    {
        return $this->withMeta(['minWidth' => $width]);
    }
}
