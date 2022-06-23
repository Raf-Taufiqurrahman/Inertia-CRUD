<template>

    <Head>
        <title>Add New Order - CRUD </title>
    </Head>
    <main class="c-main">
        <div class="container-fluid">
            <div class="fade-in">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 rounded-3 shadow">
                            <div class="card-header">
                                <span class="font-weight-bold"><i class="fa fa-shopping-cart"></i> ADD NEW Order</span>
                            </div>
                            <div class="card-body">
                                <form @submit.prevent="submit">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="fw-bold">Customer</label>
                                                <select class="form-select"
                                                    :class="{ 'is-invalid': errors.customer_id }"
                                                    v-model="form.customer_id">
                                                    <option v-for="(customer, index) in customers" :key="index"
                                                        :value="customer.id">{{ customer.name }}</option>
                                                </select>
                                            </div>
                                            <div v-if="errors.customer_id" class="alert alert-danger">
                                                {{ errors.customer_id }}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="fw-bold">Product</label>
                                            <select class="form-select" :class="{ 'is-invalid': errors.products }"
                                                v-model="form.products" multiple>
                                                <option v-for="(product, index) in products" :key="index"
                                                    :value="product.id">{{ product.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-primary shadow-sm rounded-sm" type="submit">
                                                <i class="fa fa-check"></i> SAVE
                                            </button>
                                            <Link href="/order" class="btn btn-warning shadow-sm rounded-sm ms-2">
                                            <i class="fa fa-arrow-left"></i> Back
                                            </Link>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import LayoutApp from '../../Layouts/App.vue';

import { Head, Link } from '@inertiajs/inertia-vue3';

import { reactive } from 'vue';

import { Inertia } from '@inertiajs/inertia';

export default {
    layout: LayoutApp,
    components: {
        Head,
        Link,
    },
    props: {
        customers: Array,
        products: Array,
        errors: Object
    },
    setup() {
        const form = reactive({
            customer_id: '',
            qty: '',
            products: [],
        });
        const submit = () => {
            Inertia.post('/order', {
                customer_id: form.customer_id,
                products: form.products,
                qty: form.qty,
            });
        }
        return {
            form,
            submit,
        }
    }
}
</script>
