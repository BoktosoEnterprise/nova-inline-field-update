Nova.booting((Vue, router, store) => {
  Vue.component('index-nova-inline-edit-field', require('./components/IndexField'))
  Vue.component('detail-nova-inline-edit-field', require('./components/DetailField'))
  Vue.component('form-nova-inline-edit-field', require('./components/FormField'))
})
