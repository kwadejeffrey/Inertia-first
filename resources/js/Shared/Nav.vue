<template>
    <div class="">
        <div class="flex justify-between gap-2 bg-slate-800 p-5 text-white">
            <div class="">
                <h1>My Inertia</h1>
                <p v-if="$page.props.user">Welcome {{ username }}</p>
            </div>
            <div class="">
                <nav>
                    <ul class="flex gap-3">
                        <li>
                            <Link
                                href="/"
                                :class="{
                                    'underline uppercase':
                                        $page.component === 'home',
                                }"
                                >Home</Link
                            >
                        </li>
                        <li><Link href="/setting" :class="{'underline uppercase':$page.component === 'setting'}">Setting</Link></li>
                        <li><Link href="/users" :class="{'underline uppercase':$page.component === 'users'}">Users</Link></li>
                        <li>
                            <Link
                                class=""
                                href="/logout"
                                method="post"
                                as="button"
                                >Logout</Link
                            >
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
    name: "Nav",
    components: { Link },
    computed: {
        username(){
            return this.$page.props.user.auth.name
        }
    }
};
</script>

<style></style>
