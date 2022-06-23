<template>
    <div class="c-app">
        <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
            <div class="c-sidebar-brand">
                <span class="ml-2 font-weight-bold">CRUD APP</span>
            </div>
            <Sidebar />
        </div>
        <div class="c-wrapper c-fixed-components">
            <Header />
            <div class="c-body">
                <slot />
            </div>
        </div>
    </div>
</template>

<script>
import Header from '../Components/Header.vue'
import Sidebar from '../Components/Sidebar.vue'
export default {
    components: {
        Header,
        Sidebar
    }
}
</script>
