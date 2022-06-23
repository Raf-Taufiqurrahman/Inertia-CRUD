<template>

    <Head>
        <title>Edit Product - CRUD</title>
    </Head>
    <main class="c-main">
        <div class="container-fluid">
            <div class="fade-in">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 rounded-3 shadow border-top-purple">
                            <div class="card-header">
                                <span class="font-weight-bold"><i class="fa fa-shopping-bag"></i> EDIT PRODUCT</span>
                            </div>
                            <div class="card-body">
                                <form @submit.prevent="submit">
                                    <div class="mb-3">
                                        <input class="form-control" @input="form.image = $event.target.files[0]"
                                            :class="{ 'is-invalid': errors.image }" type="file">
                                    </div>
                                    <div v-if="errors.image" class="alert alert-danger">
                                        {{ errors.image }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="fw-bold">Name Product</label>
                                                <input class="form-control" v-model="form.name"
                                                    :class="{ 'is-invalid': errors.name }" type="text"
                                                    placeholder="Name Product">
                                            </div>
                                            <div v-if="errors.name" class="alert alert-danger">
                                                {{ errors.name }}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="fw-bold">Stock</label>
                                                <input class="form-control" v-model="form.stock"
                                                    :class="{ 'is-invalid': errors.stock }" type="number"
                                                    placeholder="Stock">
                                            </div>
                                            <div v-if="errors.stock" class="alert alert-danger">
                                                {{ errors.stock }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="fw-bold">Description</label>
                                        <textarea class="form-control" v-model="form.description"
                                            :class="{ 'is-invalid': errors.description }" type="text" rows="4"
                                            placeholder="Description"></textarea>
                                    </div>
                                    <div v-if="errors.description" class="alert alert-danger">
                                        {{ errors.description }}
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-primary shadow-sm rounded-sm" type="submit">
                                                <i class="fa fa-check"></i> SAVE
                                            </button>
                                            <Link href="/product" class="btn btn-warning shadow-sm rounded-sm ms-2">
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
        Link
    },
    props: {
        errors: Object,
        categories: Array,
        product: Object
    },
    setup(props) {
        const form = reactive({
            image: props.product.image,
            name: props.product.name,
            description: props.product.description,
            stock: props.product.stock,
        });
        const submit = () => {
            Inertia.post(`/product/${props.product.id}`, {
                _method: 'PUT',
                image: form.image,
                name: form.name,
                description: form.description,
                stock: form.stock
            });
        }
        return {
            form,
            submit,
        }
    }
}
</script>
