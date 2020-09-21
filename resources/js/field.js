Nova.booting((Vue, router, store) => {
  Vue.component('index-nova-tinymce5-editor', require('./components/IndexField'))
  Vue.component('detail-nova-tinymce5-editor', require('./components/DetailField'))
  Vue.component('form-nova-tinymce5-editor', require('./components/FormField'))
  Vue.config.devtools = true
})
