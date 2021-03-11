<template>
    <!-- Add Employee Modal -->
    <div class="modal fade" id="pay-with-card" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModel">
                    Pay with 
                </h5>
                <i class="fab fa-stripe" style="font-size: 38px; margin-left: 5px; margin-top: -3px; color: blue;"></i>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-md-12">
                            <div class="alert alert-danger" v-if="errors">
                                <ul>
                                    <li v-for="error in errors" :key="error">{{ error[0] }}</li>
                                </ul>
                            </div>
                            <form>
                                <div class="form-group mb-3">
                                    <label style="float: left;" for="inputNameOnCard"
                                        >Name on Card
                                        <span class="text-danger font-weight-bold">*</span></label
                                    >
                                    <br>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="inputNameOnCard"
                                        aria-describedby="emailHelp"
                                        v-model="card_details.name_on_card"
                                    />
                                    <div class="invalid-feedback">Name on Card is required!</div>    
                                </div>

                                <div class="form-group mb-3">
                                    <label style="float: left;" for="card-element">Credit Card</label>
                                    <div id="card-element">

                                    </div>
                                </div>
                                <!-- Used to display form errors -->
                                <div id="card-errors" role="alert"></div>

                                <div class="form-group mb-0 text-center">
                                    <button type="button" class='pay-with-stripe btn btn-primary' style="background-color: #FE6161" @click='submitPaymentMethod()'>Save Payment Method</button>
                                </div>
                            </form>
                        </div>

                    </div>
                    <!-- end row -->

                    <div class="mt-3 mb-3">
                            OR
                    </div>

                    <div class="row justify-content-center">
                        
                        <div class="col-md-12">
                            <div v-show="paymentMethodsLoadStatus == 2 && paymentMethods.length == 0" class="">
                                    No payment method on file, please add a payment method.
                            </div>

                            <div v-show="paymentMethodsLoadStatus == 2 && paymentMethods.length > 0">
                                <div style="cursor: pointer;" v-for="(method, key) in paymentMethods" 
                                        v-bind:key="'method-'+key" 
                                        v-on:click="paymentMethodSelected = method.id"
                                        class="border rounded row p-1"
                                        v-bind:class="{
                                        'bg-success text-light': paymentMethodSelected == method.id    
                                    }">
                                        <div class="col-2">
                                            {{ method.brand.charAt(0).toUpperCase() }}{{ method.brand.slice(1) }}
                                        </div>
                                        <div class="col-7">
                                            Ending In: {{ method.last_four }} Exp: {{ method.exp_month }} / {{ method.exp_year }}
                                        </div>
                                        <div class="col-3">
                                            <span style="cursor: pointer;" v-on:click.stop="removePaymentMethod( method.id )">Remove</span>
                                        </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <h4 class="mt-3 mb-3">Confirm your Plan</h4>

                            <div style="cursor: pointer;" class="mt-3 row rounded border p-1" 
                                v-bind:class="{'bg-success text-light': selectedPlan == 'plan_XXX'}" 
                                v-on:click="selectedPlan = 'plan_XXX'">
                                <div class="col-6">
                                    Growth
                                </div>
                                <div class="col-6">
                                    ${{ price }}/mo.
                                </div>
                            </div>

                            <button class="btn btn btn-primary mt-3" style="background-color: #FE6161" id="add-card-button" v-on:click="updateSubscription()">
                                Subscribe
                            </button>
                        </div>
                    </div>
                </div>
                <!-- end container -->

                <!-- end page -->
            </div>
            <!--  <div class="modal-footer">
       
        <button type="button" class="button-credit-card">Pay £</button>
      </div> -->
        </div>
    </div>
</div>
    <!-- /Add Employee Modal -->
</template>
<script>

import { EventBus } from "../vue-asset";
import { Card, createToken } from 'vue-stripe-elements-plus'

export default {
    props: ['price'],
    components: { Card },
    data() {
        return {
            stripeAPIToken: 'pk_test_8ogpjCaJXqqmYprxoHWp1OIO00p81Bu1dy',
            stripe: '',
            elements: '',
            card: '',
            card_details: {
                name_on_card: "",
                stripeToken: '',
                price: '',
                intentToken: '',
            },
            selectedPlan: 'plan_XXX',
            paymentMethodSelected: {},
            paymentMethods: [],
            addPaymentStatus: 0,
            addPaymentStatusError: '',
            paymentMethodsLoadStatus: 0,
            complete: false,
            stripeOptions: {
                // see https://stripe.com/docs/stripe.js#element-options for details
            },
            errors: null,
            notificationSystem: {
                options: {
                    success: {
                        position: "topRight",
                        timeout: 3000,
                        class: 'success_notification'
                    },
                    error: {
                        position: "topRight",
                        timeout: 4000,
                        class: 'error_notification'
                    },
                    completed: {
                        position: 'center',
                        timeout: 1000,
                        class: 'complete_notification'
                    },
                    info: {
                        overlay: true,
                        zindex: 999,
                        position: 'center',
                        timeout: 3000,
                        class: 'info_notification',
                    }
                }
            },
        }
    },

  methods: {
    
    /*
        Uses the intent to submit a payment method
        to Stripe. Upon success, we save the payment
        method to our system to be used.
    */
    submitPaymentMethod(){
        this.addPaymentStatus = 1;
        this.stripe.confirmCardSetup(
            this.card_details.intentToken.client_secret, {
                payment_method: {
                    card: this.card,
                    billing_details: {
                        name: this.card_details.name_on_card
                    }
                }
            }
        ).then(function(result) {
            if (result.error) {
                this.addPaymentStatus = 3;
                this.addPaymentStatusError = result.error.message;
            } else {
                this.savePaymentMethod( result.setupIntent.payment_method );
                this.addPaymentStatus = 2;
                this.card.clear();
                this.name = '';
            }
        }.bind(this));
    },
    pay() {
            // // createToken returns a Promise which resolves in a result object with
            // // either a token or an error key.
            // // See https://stripe.com/docs/api#tokens for the token object.
            // // See https://stripe.com/docs/api#errors for the error object.
            // // More general https://stripe.com/docs/stripe.js#stripe-create-token.
            // var options = {
            //     name: this.card_details.name_on_card,
            // };
            // createToken(options).then(result => {
            //     if (result.token) {
            //         var hiddenInput = document.createElement("input");
            //         hiddenInput.setAttribute("type", "hidden");
            //         hiddenInput.setAttribute("v-model", "card.stripeToken");
            //         hiddenInput.setAttribute("value", result.token.id);
            //         this.$el.appendChild(hiddenInput);
            //         this.submit(result.token.id)
            //     }
            // });
            
        },

        updateSubscription(){
            axios.post(base_url + 'user/subscription', {
                plan: this.selectedPlan,
                payment: this.paymentMethodSelected
            }).then( function( response ){
                console.log( response );
            }.bind(this));
        },

        submit(token) {
            alert('button clicked')
            this.addPaymentStatus = 1;
	        axios.post(base_url + "pay-with-stripe/" + token, this.card_details)
            .then(response => {
                this.savePaymentMethod( this.card_details.intentToken.payment_method );
                this.card_details = {
                    name_on_card: '',
                    stripeToken: '',
                };
                this.errors = null;
                this.showMessage(response.data)
                // window.location.href = base_url + 'success';
                })
                .catch(err => {
                if (err.response) {
                    this.errors = err.response.data.errors;
                    this.addPaymentStatus = 3;
                    this.addPaymentStatusError = err.response.data.error;
                    this.showMessage(err.response.data)
                    //this.$toast.error('Something Went Wrong', 'Error', { timeout: 3000 } );
                }
            });
        },

        /*
            Saves the payment method for the user and
            re-loads the payment methods.
        */
        savePaymentMethod( method ){
            axios.post(base_url + 'user/payments', {
                payment_method: method
            }).then( function(){
                this.loadPaymentMethods();
            }.bind(this));
        },

        /*
            Includes Stripe.js dynamically
        */
        includeStripe( URL, callback ){
            var documentTag = document, tag = 'script',
                object = documentTag.createElement(tag),
                scriptTag = documentTag.getElementsByTagName(tag)[0];
            object.src = '//' + URL;
            if (callback) { object.addEventListener('load', function (e) { callback(null, e); }, false); }
            scriptTag.parentNode.insertBefore(object, scriptTag);
        },

        /*
            Configures Stripe by setting up the elements and 
            creating the card element.
        */
        configureStripe(){
            this.stripe = Stripe( this.stripeAPIToken );

            this.elements = this.stripe.elements();
            // Create an instance of the card UI component
            this.card = this.elements.create('card');
            this.card.mount('#card-element');
        },

        /*
            Loads the payment intent key for the user to pay.
        */
        loadIntent(){
            axios.get(base_url + 'user/setup-intent')
                .then( function( response ){
                    this.card_details.intentToken = response.data;
                }.bind(this));
        },

        /*
            Loads all of the payment methods for the
            user.
        */
        loadPaymentMethods(){
            this.paymentMethodsLoadStatus = 1;
            axios.get(base_url + 'user/payment-methods')
                .then( function( response ){
                    this.paymentMethods = response.data;
                    this.paymentMethodsLoadStatus = 2;
                }.bind(this));
        },

        removePaymentMethod( paymentID ){
            axios.post(base_url + 'user/remove-payment', {
                id: paymentID
            }).then( function( response ){
                this.loadPaymentMethods();
            }.bind(this));
        }
  },

    mounted() {
        this.includeStripe('js.stripe.com/v3/', function(){
            this.configureStripe();
        }.bind(this) );
        this.loadIntent();
        this.loadPaymentMethods();
    },
  // end of method section

  created() {
      this.card_details.price = this.price
  }
};
</script>


