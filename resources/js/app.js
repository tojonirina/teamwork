/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

const StageBloc = () => ({
  component: import('./components/project/stage/StageBloc.vue'),
  loading: require('./components/Loading.vue'),
  error: require('./components/ErrorLoading.vue'),
  delay: 5000,
  timeout: 3000
});

Vue.component('toast', require('./components/Toast.vue').default);
Vue.component('edit-stage-modal', require('./components/project/stage/EditStageModalForm.vue').default);
Vue.component('add-issue-modal', require('./components/project/issue/AddIssueModalForm.vue').default);
Vue.component('edit-issue-modal', require('./components/project/issue/EditIssueModalForm.vue').default);
Vue.component('stage-bloc', StageBloc);
Vue.component('stage-bloc-title', require('./components/project/stage/StageBlocTitle.vue').default);
Vue.component('delete-stage-form', require('./components/project/stage/DeleteStageForm.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
