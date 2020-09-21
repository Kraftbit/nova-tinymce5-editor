<template>
    <default-field :field="field" :errors="errors" :full-width-content="true">
        <template slot="field">
            <editor
                v-model="value"
                :api-key="apiKey"
                cloud-channel="5"
                :init="editorConfig"
                :plugins="editorPlugins"
                :toolbar="editorToolbar"
                :class="errorClasses"
                :placeholder="field.placeholder"
                :id="field.id"
                :name="field.name"
                />
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'
import Editor from '@tinymce/tinymce-vue'

export default {
    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    components: {
        editor: Editor
    },

    data() {
            return {
                    editorConfigInit: this.field.options.init,
                    editorPlugins: this.field.options.plugins,
                    editorToolbar: this.field.options.toolbar,
                    apiKey: this.field.options.apiKey
                }
        },

    computed: {

        editorConfig: function() {

            let editorConfig = this.editorConfigInit

            if(this.field.mediaLibrary == true){
                editorConfig['selector'] = this.field.id

                window.mediaLibrarySelectFiles = function (filesArray, options) {
                    tinymce.get(options.editor).insertContent('<img src="'+ filesArray[0].url +'">');
                }

            }

            return editorConfig
        }
    },

    methods: {
        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
            this.value = this.field.value || ''
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            formData.append(this.field.attribute, this.value || '')
        },

        /**
         * Update the field's internal value.
         */
        handleChange(value) {
            this.value = value
        }
    },
}
</script>
