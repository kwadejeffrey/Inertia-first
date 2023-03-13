<template>
    <Head><title>Users</title></Head>
    <div class="flex flex-col text-center">
        <span>use</span>
        <div class="mt-5 flex flex-col gap-2">
            <span>Current time is {{ time }}</span>
            <Link href="/users" preserve-scroll>Refresh</Link>
        </div>
        <div class="">
            <div class="flex justify-between mx-5">
                <Link v-if="can.createUser" href="/createUser" class="bg-blue-700 p-1 rounded-md text-white" as="button">Create User</Link>
                <h1 v-else class="text-3xl font-semibold">Users</h1>
                <input v-model="search" type="text" placeholder="Search..." class="border-2 border-slate-500 placeholder:text-slate-400 px-2 py-1 rounded-lg outline-none">
            </div>
            <div
                class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5"
            >
                <table
                    class="w-full border-collapse bg-white text-left text-sm text-gray-500"
                >
                    <thead class="bg-gray-50">
                        <tr>
                            <th
                                scope="col"
                                class="px-6 py-4 font-medium text-gray-900"
                            >
                                Name
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-4 font-medium text-gray-900"
                            >
                                State
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-4 font-medium text-gray-900"
                            >
                                Role
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-4 font-medium text-gray-900"
                            >
                                Team
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-4 font-medium text-gray-900"
                            ></th>
                        </tr>
                    </thead>
                    <tbody
                        class="divide-y divide-gray-100 border-t border-gray-100"
                    >
                        <tr class="hover:bg-gray-50" v-for="(user, index) in users.data" :key="index">
                            <th
                                class="flex gap-3 px-6 py-4 font-normal text-gray-900"
                            >
                                <div class="relative h-10 w-10">
                                    <img
                                        class="h-full w-full rounded-full object-cover object-center"
                                        src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt=""
                                    />
                                    <span
                                        class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"
                                    ></span>
                                </div>
                                <div class="text-sm">
                                    <div class="font-medium text-gray-700">
                                        {{user.name}}
                                    </div>
                                    <div class="text-gray-400">
                                        {{user.email}}
                                    </div>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600"
                                >
                                    <span
                                        class="h-1.5 w-1.5 rounded-full bg-green-600"
                                    ></span>
                                    Active
                                </span>
                            </td>
                            <!-- <td class="px-6 py-4">Product Designer</td> -->
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600"
                                    >
                                        Design
                                    </span>
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-indigo-50 px-2 py-1 text-xs font-semibold text-indigo-600"
                                    >
                                        Product
                                    </span>
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-violet-50 px-2 py-1 text-xs font-semibold text-violet-600"
                                    >
                                        Develop
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-4">
                                    <Link :href="`/users/${user.id}`">Edit</Link>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="">
                <Paginator :links="users.links" />
            </div>
        </div>
    </div>
</template>

<script>
import Layout from "../Shared/Layout.vue";
import { Link } from "@inertiajs/inertia-vue3";
import Paginator from "../Shared/Paginator.vue";
import _ from 'lodash'
export default {
    name: "user",
    data(){
        return{
            search: this.filters.search ?? ''
        }
    },
    components: { Link,Paginator },
    props: ["time", "users", "filters","can"],
    watch:{
        search: _.debounce(function(value) {
            this.$inertia.get("/users", { search: value }, {
            preserveState: true,
            replace: true
        })},2000)
    },
    layout: Layout,
};
</script>
