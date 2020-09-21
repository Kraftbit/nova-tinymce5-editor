<?php

namespace Kraftbit\NovaTinymce5Editor;

use Laravel\Nova\Fields\Field;

class NovaTinymce5Editor extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-tinymce5-editor';

    public function __construct(string $name, $attribute = null)
    {
        parent::__construct($name, $attribute);

        $this->withMeta([
            'options' => config('nova-tinymce5-editor.options', []),
        ]);
    }

    public function options($options)
    {
        $inlineOptions = $this->meta['options'] ?? [];

        return $this->withMeta([
            'options' => array_merge($inlineOptions, $options),
        ]);
    }

    /**
     * Set the field id html attribute.
     *
     * @param mixed $id
     *
     * @return $this
     */
    public function id($id)
    {
        $this->withMeta([
            'id' => $id,
        ]);

        return $this;
    }

    /**
     * Set the field name.
     *
     * @param mixed $name
     *
     * @return $this
     */
    public function name($name)
    {
        $this->withMeta([
            'name' => $name,
        ]);

        return $this;
    }

    /**
     * Set the field placeholder.
     *
     * @param mixed $name
     * @param mixed $placeholder
     *
     * @return $this
     */
    public function placeholder($placeholder)
    {
        $this->withMeta([
            'placeholder' => $placeholder,
        ]);

        return $this;
    }
}
