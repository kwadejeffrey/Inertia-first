<template>
    <Head><title>Create User</title></Head>
    <div class="">
        <h1 class="text-center">Create New User</h1>
        <div class="mt-4">
            <form @submit.prevent="submit()" method="post" class="max-w-md mx-auto px-4 flex flex-col gap-y-3">
                <div class="">
                    <label for="name" class="mb-2 font-bold block text-xs uppercase">Name</label>
                    <input v-model="name" type="text" name="name" autocomplete="off" id="name" class="p-2 rounded-lg border-slate-600 border w-full">
                    <span v-if="$page.props.errors.name" v-text="$page.props.errors.name" class="text-xs text-red-500 mt-1"></span>
                </div>
                <div class="">
                    <label for="email" class="mb-2 font-bold block text-xs uppercase">Email</label>
                    <input v-model="email" type="email" name="email" id="email" class="p-2 rounded-lg border-slate-600 border w-full" autocomplete="off">
                    <span v-if="$page.props.errors.email" v-text="$page.props.errors.email" class="text-xs text-red-500 mt-1"></span>
                </div>
                <div class="">
                    <label for="password" class="mb-2 font-bold block text-xs uppercase">Password</label>
                    <input v-model="password" type="password" name="password" id="password" class="p-2 rounded-lg border-slate-600 border w-full">
                    <span v-if="$page.props.errors.password" v-text="$page.props.errors.password" class="text-xs text-red-500 mt-1"></span>
                </div>
                <div class="">
                    <button class="px-4 py-2 bg-green-400 hover:bg-green-500 transition-all rounded-md text-white" :disabled="processing">Submit</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import LayoutVue from '../../Shared/Layout.vue';
export default{
    name: 'create-user',
    data(){
        return{
            name: '',
            email: '',
            password: '',
            processing: false
        }
    },
    methods: {
        submit(){
            this.$inertia.post('/users',{name: this.name, email: this.email, password: this.password}, {
                onStart: () => {this.processing = true},
                onFinish: () => {this.processing = false}
            })
        }
    },
    layout: LayoutVue
}
</script>