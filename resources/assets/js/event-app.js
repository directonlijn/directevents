
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',

    data: {
        sessionId: '',
        user: null,
        userType: '',
        loginFormData: {
            email: '',
            password: ''
        },
        registerEventData: {
            eventId: '',
            foodType: '',
            stalls: 0,
            groundSpots: 0,
            sellTypes: []
        },
        registerEventErrors: {},
        authenticated: false
    },

    computed: {
        nonFoodBtnActive: function() {
            return {
                selected: (app.registerEventData.foodType == 'non-food')
            }
        },
        foodBtnActive: function() {
            return {
                selected: (app.registerEventData.foodType == 'food')
            }
        }
    },

    mounted: function() {
        this.setAuthUser(window.auth_user);
        this.registerEventData.eventId = window.eventId;
        this.sessionId = window.sessionId;

        // Log user in into main domain
        this.setCookieForMainDomain();
    },

    methods: {
        setUserType: function (userType) {
            if (event) event.preventDefault();

            // Set user type
            app.userType = userType;

            // Automatically hides and shows divs
        },
        setFoodType: function (foodType, event) {
            if (event) event.preventDefault();

            // Set user type
            app.registerEventData.foodType = foodType;

            // Automatically hides and shows divs
        },
        registerEvent: function(event){
            if (event) event.preventDefault();

            axios.post('/registerEvent', app.registerEventData)
                .then(function (response) {
                    console.log(response.data);

                    if (response.data.authenticated) {
                        // The user is logged in
                        app.setAuthUser(response.data.user);
                    } else if (response.data.error !== '') {
                        app.registerEventErrors = response.data;
                    } else {
                        // The credentials are invalid
                    }
                })
                .catch(function (data) {
                    // The request was invalid or has erros
                    console.log(typeof data.response.data.errors);
                    console.log(JSON.stringify(data.response.data.errors));
                    if (typeof data.response.data.errors !== 'undefined') {
                        app.registerEventErrors = data.response.data.errors;
                    } else {

                    }
                });
        },
        setAuthUser: function(user) {
            if (user !== null) {
                this.user = user;
                this.setLoggedIn();
            }

        },
        setCookieForMainDomain: function() {
            var instance = axios.create();
            delete instance.defaults.headers.common['X-CSRF-TOKEN'];
            instance.post('http://directevents.test/setCookie', {'sessionId': sessionId})
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                    // The request was invalid
                });
        },
        isLoggedIn: function() {
            return this.authenticated;
        },
        setLoggedIn: function() {
            if (typeof this.user === 'object') {
                this.authenticated = true;
            } else {
                this.authenticated = false;
            }
        },
        login: function(event) {
            if (event) event.preventDefault();

            axios.post('/loginEvent', app.loginFormData)
                .then(function (response) {
                    console.log(response.data);
                    if (response.data.authenticated) {
                        // The user is logged in
                        app.setAuthUser(response.data.user);
                    } else {
                        // The credentials are invalid
                    }
                })
                .catch(function (error) {
                    console.log(error);
                    // The request was invalid
                });
        }
    }
});