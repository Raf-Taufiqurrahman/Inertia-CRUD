<template>
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <Link class="c-sidebar-nav-link" :class="{ 'active': $page.url.startsWith('/dashboard') }"
                href="/dashboard"> <i class="fa fa-th-large"></i> <span class="ms-2">Dashboard</span>
            </Link>
        </li>
        <li class="c-sidebar-nav-item">
            <Link class="c-sidebar-nav-link" :class="{ 'active': $page.url.startsWith('/customer') }" href="/customer">
            <i class="fa fa-user-circle"></i> <span class="ms-2">Customer</span>
            </Link>
        </li>
        <li class="c-sidebar-nav-item">
            <Link class="c-sidebar-nav-link" :class="{ 'active': $page.url.startsWith('/product') }" href="/product">
            <i class="fa fa-shopping-bag"></i> <span class="ms-2">Product</span>
            </Link>
        </li>
        <li class="c-sidebar-nav-item">
            <Link class="c-sidebar-nav-link" :class="{ 'active': $page.url.startsWith('/order') }" href="/order">
            <i class="fa fa-shopping-cart"></i> <span class="ms-2">Order</span>
            </Link>
        </li>
    </ul>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link
    }
}
</script>
