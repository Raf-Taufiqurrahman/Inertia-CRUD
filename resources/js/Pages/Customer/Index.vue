<template>

    <Head>
        <title>Customer - CRUD</title>
    </Head>
    <main class="c-main">
        <div class="container-fluid">
            <div class="fade-in">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 rounded-3 shadow">
                            <div class="card-header">
                                <span class="font-weight-bold"><i class="fa fa-user-circle"></i> CUSTOMER</span>
                            </div>
                            <div class="card-body">
                                <form @submit.prevent="handleSearch">
                                    <div class="input-group mb-3">
                                        <Link href="/customer/create" class="btn btn-success input-group-text"> <i
                                            class="fa fa-plus-circle me-2"></i> NEW</Link>
                                        <input type="text" class="form-control" placeholder="search by customer name..."
                                            v-model="search">
                                        <button class="btn btn-success input-group-text" type="submit">
                                            <i class="fa fa-search me-2"></i>
                                            SEARCH
                                        </button>
                                    </div>
                                </form>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Full Name</th>
                                            <th scope="col">No. Telp</th>
                                            <th scope="col">Address</th>
                                            <th scope="col" style="width:20%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(customer, index) in customers.data" :key="index">
                                            <td>{{ customer.name }}</td>
                                            <td>{{ customer.no_telp }}</td>
                                            <td>{{ customer.address }}</td>
                                            <td class="text-center">
                                                <Link :href="`/customer/${customer.id}/edit`"
                                                    class="btn btn-warning btn-sm me-2"><i
                                                    class="fa fa-pencil-alt me-1"></i> EDIT</Link>
                                                <button @click.prevent="destroy(customer.id)"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                                    DELETE</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <Pagination :links="customers.links" align="end" />
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
        customers: Object
    },
    setup() {
        const search = ref('' || (new URL(document.location)).searchParams.get('q'));

        const handleSearch = () => {
            Inertia.get('/customer', {
                q: search.value
            })
        }

        const destroy = (id) => {
            Inertia.delete(`/customer/${id}`);
        }

        return { destroy, handleSearch, search }
    }
}
</script>
