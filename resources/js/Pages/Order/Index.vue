<template>

    <Head>
        <title>Order - CRUD</title>
    </Head>
    <main class="c-main">
        <div class="container-fluid">
            <div class="fade-in">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 rounded-3 shadow">
                            <div class="card-header">
                                <span class="font-weight-bold"><i class="fa fa-shopping-cart"></i> Order</span>
                            </div>
                            <div class="card-body">
                                <Link href="/order/create" class="btn btn-success input-group-text mb-3"> <i
                                    class="fa fa-plus-circle me-2"></i> Order
                                </Link>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Invoice</th>
                                            <th scope="col">Customer</th>
                                            <th scope="col">Product</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(order, index) in orders.data" :key="index">
                                            <td>{{ order.invoice }}</td>
                                            <td>{{ order.customer.name }}</td>
                                            <td>
                                                <li v-for="product in order.products" :key="product.id">
                                                    {{ product.name }}
                                                </li>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <Pagination :links="orders.links" align="end" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import LayoutApp from '../../Layouts/App.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia';
import { ref } from 'vue'
import Pagination from '../../Components/Pagination.vue';
export default {
    layout: LayoutApp,
    components: {
        Head, Link, Pagination
    },
    props: {
        orders: Object
    },
    setup() {
        const search = ref('' || (new URL(document.location)).searchParams.get('q'));

        const handleSearch = () => {
            Inertia.get('/order', {
                q: search.value
            })
        }

        const destroy = (id) => {
            Inertia.delete(`/order/${id}`);
        }

        return { destroy, handleSearch, search }
    }
}
</script>
