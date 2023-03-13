<template>
    <div class="">
        <div class="">
            <header>
                <Nav></Nav>
            </header>
            <section class="max-w-3xl mx-auto bg-gray-200 py-3">
                <slot/>
            </section>
        </div>
    </div>
</template>

<script>
import Nav from './Nav.vue';
// import { Head } from '@inertiajs/inertia-vue3';
export default{
    name: 'layout',
    components:{Nav}
}
</script>