<script setup>
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
</script>

<template>

    <Head title="Dashboard" />

    <div class="py-8 sm:py-10">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h2 class="mb-6 text-xl font-semibold leading-tight text-gray-900 dark:text-gray-100">Dashboard</h2>
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <div class="overflow-hidden rounded-lg bg-white p-5 shadow dark:bg-gray-900/60">
                    <div class="text-sm text-gray-500 dark:text-gray-400">Users</div>
                    <div class="mt-2 text-2xl font-bold text-gray-900 dark:text-gray-100">1,245</div>
                </div>
                <div class="overflow-hidden rounded-lg bg-white p-5 shadow dark:bg-gray-900/60">
                    <div class="text-sm text-gray-500 dark:text-gray-400">Threads</div>
                    <div class="mt-2 text-2xl font-bold text-gray-900 dark:text-gray-100">532</div>
                </div>
                <div class="overflow-hidden rounded-lg bg-white p-5 shadow dark:bg-gray-900/60">
                    <div class="text-sm text-gray-500 dark:text-gray-400">Comments</div>
                    <div class="mt-2 text-2xl font-bold text-gray-900 dark:text-gray-100">3,870</div>
                </div>
                <div class="overflow-hidden rounded-lg bg-white p-5 shadow dark:bg-gray-900/60">
                    <div class="text-sm text-gray-500 dark:text-gray-400">Reactions</div>
                    <div class="mt-2 text-2xl font-bold text-gray-900 dark:text-gray-100">9,421</div>
                </div>
            </div>

            <div class="mt-8 grid gap-6 lg:grid-cols-3">
                <div class="rounded-lg bg-white p-6 shadow dark:bg-gray-900/60 lg:col-span-2">
                    <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">Recent Activity</h3>
                    <div class="mt-4 space-y-3 text-sm text-gray-600 dark:text-gray-300">
                        <div>• New thread created: Improving Vue Performance</div>
                        <div>• Tag added: optimization</div>
                        <div>• Category updated: Announcements</div>
                    </div>
                </div>
                <div class="rounded-lg bg-white p-6 shadow dark:bg-gray-900/60">
                    <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">Quick Actions</h3>
                    <div class="mt-4 grid gap-3">
                        <Link :href="route('admin.categories.create')" class="inline-flex items-center justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-medium text-white hover:bg-indigo-700">New Category</Link>
                        <Link :href="route('admin.tags.create')" class="inline-flex items-center justify-center rounded-md bg-gray-800 px-3 py-2 text-sm font-medium text-white hover:bg-gray-900">New Tag</Link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
