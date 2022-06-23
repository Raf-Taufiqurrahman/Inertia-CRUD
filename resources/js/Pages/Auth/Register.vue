<template>

    <Head>
        <title>Register - CRUD</title>
    </Head>
    <div class="col-md-4">
        <div class="fade-in">
            <div class="card-group">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <div class="text-start">
                            <h5>REGISTER ACCOUNT</h5>
                        </div>
                        <hr>
                        <div v-if="session.status" class="alert alert-success mt-2">
                            {{ session.status }}
                        </div>
                        <form @submit.prevent="submit">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </div>
                                <input class="form-control" v-model="form.name" :class="{ 'is-invalid': errors.name }"
                                    type="text" placeholder="Full Name">
                            </div>
                            <div v-if="errors.name" class="alert alert-danger">
                                {{ errors.name }}
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                </div>
                                <input class="form-control" v-model="form.email" :class="{ 'is-invalid': errors.email }"
                                    type="email" placeholder="Email Address">
                            </div>
                            <div v-if="errors.email" class="alert alert-danger">
                                {{ errors.email }}
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </div>
                                <input class="form-control" v-model="form.password"
                                    :class="{ 'is-invalid': errors.password }" type="password" placeholder="Password">
                            </div>
                            <div v-if="errors.password" class="alert alert-danger">
                                {{ errors.password }}
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </div>
                                <input class="form-control" v-model="form.password_confirmation"
                                    :class="{ 'is-invalid': errors.password_confirmation }" type="password"
                                    placeholder="Confirmation Password">
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-info text-white shadow-sm rounded-sm px-4"
                                        type="submit">Save</button>
                                    <Link href="/login" class="btn btn-secondary ml-2">Login</Link>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import LayoutAuth from '../../Layouts/Auth.vue';
import { reactive } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';
export default {
    layout: LayoutAuth,
    components: {
        Head,
        Link
    },
    props: {
        errors: Object,
        session: Object
    },
    setup() {
        const form = reactive({
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
        });
        const submit = () => {
            Inertia.post('/register', {
                name: form.name,
                email: form.email,
                password: form.password,
                password_confirmation: form.password_confirmation
            });
        }
        return {
            form,
            submit,
        };
    }
}
</script>
