<template>
    <Head><title>Home</title></Head>
    <div class="home">
        <h5 class="text-lg">lol</h5>
        <h6 class="text-blue-700 bg-red-400">{{ hello }}</h6>
    </div>
</template>

<script>
import Layout from "../Shared/Layout.vue";
export default {
    name: "home",
    props: ["hello"],
    components: { },
    // layout: Layout
    
};
</script>
