// Vue component addins

Vue.component('trade-create-overview', {props: ['trade'], template: require('./components/views/trade/create.html')});
//Vue.component('player-select', {props: ['data'], template: require('./components/views/player/index/select.vue')})
Vue.component('player-select', require('./components/views/player/index/select.vue'));