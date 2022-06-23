<template>

    <Head>
        <title>Dashboard - CRUD</title>
    </Head>

    <main class="c-main">
        <div class="container-fluid">
            <div class="fade-in">
                <div class="row">
                    <div class="card">
                        <div class="card-body text-center">
                            <h1>Task 3</h1>
                            <p>Aplikasi ini saya bangun menggunakan <span class="text-danger">Inertia js, Vue
                                    Js, dan
                                    Laravel</span></p>
                            <p>
                                Inertia js sendiri merupakan sebuah teknologi baru yang dapat digunakan untuk membuat
                                sebuah aplikasi web berbasis <span class="font-weight-bold">SPA atau
                                    <i>Single Page Appliaciton</i> </span>
                                menggunakan <span class="text-danger">React, Vue, atau Svelte</span> tanpa perlu membuat
                                sebuah <span class="text-danger">Rest
                                    API</span>. Teknologi
                                ini dinamakan
                                <span class="text-danger">The
                                    Modern Monolith</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import LayoutApp from '../Layouts/App.vue';
import { Head } from '@inertiajs/inertia-vue3';
export default {
    layout: LayoutApp,
    components: {
        Head,
    },
}
</script>
