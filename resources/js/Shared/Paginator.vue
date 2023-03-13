<template>
    <div>
        <Component :is="link.url ? 'Link' : 'span'" v-for="(link, index) in links" :key="index" :href="link.url" v-html="link.label" class="p-1" :class="{'text-slate-800 font-bold': link.active, 'text-gray-500 pointer-events-none': ! link.url}"/>
    </div>
</template>

<script>

export default{
    name: 'pag',
    props:["links"]
}
</script>