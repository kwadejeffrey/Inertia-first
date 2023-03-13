<template>
    <Head><title>Login</title></Head>
    <main class="min-h-screen grid place-items-center">
        <section class="bg-white border rounded-lg p-8">
            <div class="">
                <h1 class="text-center text-3xl mb-3 font-semibold">Login</h1>
                <div class="mt-4">
                    <form
                        @submit.prevent="submit"
                        method="post"
                        class="max-w-md mx-auto px-4 flex flex-col gap-y-3"
                    >
                        <div class="">
                            <label
                                for="email"
                                class="mb-2 font-bold block text-xs uppercase"
                                >Email</label
                            >
                            <input
                                v-model="form.email"
                                type="email"
                                name="email"
                                id="email"
                                class="p-2 rounded-sm border-slate-600 border w-full"
                                autocomplete="off"
                            />
                            <span
                                v-if="$page.props.errors.email"
                                v-text="$page.props.errors.email"
                                class="text-xs text-red-500 mt-1"
                            ></span>
                        </div>
                        <div class="">
                            <label
                                for="password"
                                class="mb-2 font-bold block text-xs uppercase"
                                >Password</label
                            >
                            <input
                                v-model="form.password"
                                type="password"
                                name="password"
                                id="password"
                                class="p-2 rounded-sm border-slate-600 border w-full"
                            />
                            <span
                                v-if="$page.props.errors.password"
                                v-text="$page.props.errors.password"
                                class="text-xs text-red-500 mt-1"
                            ></span>
                        </div>
                        <div class="">
                            <button
                                class="px-4 py-2 bg-green-400 hover:bg-green-500 transition-all rounded-sm text-white"
                                :disabled="processing"
                            >
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
</template>


<script>

export default{
    name: 'login',
    layout: null
}
</script>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';

let processing = ref(false)


let form = useForm({
    email: null,
    password: null
});

let submit = () => {
    form.post('/login')
}
</script>
