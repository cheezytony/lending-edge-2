import Vue from 'vue';

Vue.component('Alert', require(/* webpackChunkName: 'js/components/alerts/Alert' */'./alerts/Alert.vue').default);
Vue.component('AlertDanger', require(/* webpackChunkName: 'js/components/alerts/Danger' */'./alerts/Danger.vue').default);
Vue.component('AlertPrimary', require(/* webpackChunkName: 'js/components/alerts/Primary' */'./alerts/Primary.vue').default);
Vue.component('AlertSuccess', require(/* webpackChunkName: 'js/components/alerts/Success' */'./alerts/Success.vue').default);

Vue.component('ButtonSubmit', require(/* webpackChunkName: 'js/components/buttons/Submit' */'./buttons/Submit.vue').default);

Vue.component('FormGroup', require(/* webpackChunkName: 'js/components/form/FormGroup' */'./form/FormGroup.vue').default);
Vue.component('Input', require(/* webpackChunkName: 'js/components/form/Input' */'./form/Input.vue').default);
Vue.component('InputEmail', require(/* webpackChunkName: 'js/components/form/Email' */'./form/Email.vue').default);
Vue.component('InputLabel', require(/* webpackChunkName: 'js/components/form/Label' */'./form/Label.vue').default);
Vue.component('InputTextarea', require(/* webpackChunkName: 'js/components/form/Textarea' */'./form/Textarea.vue').default);

Vue.component('LoaderSm', require(/* webpackChunkName: 'js/components/loaders/Small' */'./loaders/Small.vue').default);
Vue.component('LoaderSmWhite', require(/* webpackChunkName: 'js/components/loaders/SmallWhite' */'./loaders/SmallWhite.vue').default);

Vue.component('Logo', require(/* webpackChunkName: 'js/components/logo/Index' */'./logo/Index.vue').default);
