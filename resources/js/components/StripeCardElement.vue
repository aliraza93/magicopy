<template>
    <div>
        <card
            class="stripe-card"
            :class="{ complete }"
            stripe="pk_test_XeRv97d9dKmbUp00sAg3HHUB004w23q8z6"
            :options="stripeOptions"
            @change="change($event)"
        />

        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert" v-text="errorMessage"></div>
    </div>
</template>

<script>
import { Card, createToken } from "vue-stripe-elements-plus";
export default {
    data() {
        return {
            complete: false,
            errorMessage: "",
            stripeOptions: {
                // see https://stripe.com/docs/stripe.js#element-options for details
                hidePostalCode: true
            },
            style: {
                base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
            }
        };
    },
    components: { Card },
    methods: {
      change(event) {
          this.errorMessage = event.error ? event.error.message : "";
      }
    }
};
</script>
<style>
/**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.stripe-card {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.stripe-card--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.stripe-card--invalid {
  border-color: #fa755a;
}

.stripe-card--webkit-autofill {
  background-color: #fefde5 !important;
}
.stripe-card.complete {
  border-color: green;
}
</style> 