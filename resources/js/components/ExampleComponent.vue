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
                