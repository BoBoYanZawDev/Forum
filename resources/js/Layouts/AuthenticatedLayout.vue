<script setup>
import { ref, computed, onMounted, watch } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { Link } from '@inertiajs/vue3';
import { ConfigProvider, theme as antdTheme } from 'ant-design-vue';

const sidebarOpen = ref(false);
const siderCollapsed = ref(false);
const isDark = ref(false);

const selectedKey = computed(() => {
    if (route().current('admin.dashboard')) return ['dashboard'];
    if (route().current('admin.categories.*')) return ['categories'];
    if (route().current('admin.tags.*')) return ['tags'];
    return [];
});

onMounted(() => {
    const saved = localStorage.getItem('theme');
    isDark.value = saved ? saved === 'dark' : window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
});

watch(isDark, (val) => {
    const root = document.documentElement;
    if (val) {
        root.classList.add('dark');
        localStorage.setItem('theme', 'dark');
    } else {
        root.classList.remove('dark');
        localStorage.setItem('theme', 'light');
    }
});

const menuTheme = computed(() => (isDark.value ? 'dark' : 'light'));
</script>

<template>
    <ConfigProvider :theme="{ algorithm: isDark ? antdTheme.darkAlgorithm : antdTheme.defaultAlgorithm }">
    <a-layout class="min-h-screen bg-white dark:bg-gray-900">
        <a-layout-sider
            :theme="menuTheme"
            breakpoint="lg"
            :collapsed="siderCollapsed"
            collapsible
            @collapse="(c) => (siderCollapsed = c)"
            class="hidden sm:block"
            width="240"
        >
            <div class="flex h-16 items-center px-4">
                <Link :href="route('admin.dashboard')" class="flex items-center gap-2">
                    <ApplicationLogo class="block h-8 w-auto fill-current text-gray-800 dark:text-gray-100" />
                    <span class="text-base font-semibold text-gray-900 dark:text-gray-100" v-show="!siderCollapsed"></span>
                </Link>
            </div>
            <a-menu :selectedKeys="selectedKey" mode="inline" :theme="menuTheme">
                <a-menu-item key="dashboard">
                    <template #icon>
                        <font-awesome-icon icon="fa-solid fa-home" />
                    </template>
                    <Link :href="route('admin.dashboard')">Dashboard</Link>
                </a-menu-item>
                <a-menu-item key="categories">
                    <template #icon>
                        <font-awesome-icon icon="fa-regular fa-star" />
                    </template>
                    <Link :href="route('admin.categories.index')">Categories</Link>
                </a-menu-item>
                <a-menu-item key="tags">
                    <template #icon>
                        <font-awesome-icon icon="fa-solid fa-tag" />
                    </template>
                    <Link :href="route('admin.tags.index')">Tags</Link>
                </a-menu-item>
            </a-menu>
        </a-layout-sider>

        <a-drawer :open="sidebarOpen" placement="left" :width="260" @close="sidebarOpen = false" class="sm:hidden">
            <div class="flex h-16 items-center px-3 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800">
                <Link :href="route('admin.dashboard')" class="flex items-center gap-2">
                    <ApplicationLogo class="block h-8 w-auto fill-current text-gray-800 dark:text-gray-100" />
                    <span class="text-base font-semibold text-gray-900 dark:text-gray-100">Forum Admin</span>
                </Link>
            </div>
            <a-menu :selectedKeys="selectedKey" mode="inline" :theme="menuTheme" @click="() => (sidebarOpen = false)">
                <a-menu-item key="dashboard">
                    <template #icon>
                        <font-awesome-icon icon="fa-solid fa-home" />
                    </template>
                    <Link :href="route('admin.dashboard')">Dashboard</Link>
                </a-menu-item>
                <a-menu-item key="categories">
                    <template #icon>
                        <font-awesome-icon icon="fa-regular fa-star" />
                    </template>
                    <Link :href="route('admin.categories.index')">Categories</Link>
                </a-menu-item>
                <a-menu-item key="tags">
                    <template #icon>
                        <font-awesome-icon icon="fa-solid fa-tag" />
                    </template>
                    <Link :href="route('admin.tags.index')">Tags</Link>
                </a-menu-item>
            </a-menu>
        </a-drawer>

        <a-layout>
            <a-layout-header class="sm:hidden flex items-center justify-between bg-white dark:bg-gray-900 px-4">
                <button class="p-2" @click="sidebarOpen = true">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                </button>
                <Link :href="route('admin.dashboard')" class="flex items-center gap-2">
                    <ApplicationLogo class="block h-8 w-auto fill-current text-gray-800" />
                </Link>
                <button class="me-2 rounded-md border px-2 py-1 text-xs" @click="isDark = !isDark">{{ isDark ? 'Light' : 'Dark' }}</button>
                <Dropdown align="right" width="48">
                    <template #trigger>
                        <span class="inline-flex rounded-md">
                            <button type="button" class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-700 hover:text-gray-900 focus:outline-none">
                                {{ $page.props.auth.user.name }}
                                <svg class="-me-0.5 ms-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                            </button>
                        </span>
                    </template>
                    <template #content>
                        <DropdownLink :href="route('profile.edit')">Profile</DropdownLink>
                        <DropdownLink :href="route('logout')" method="post" as="button">Log Out</DropdownLink>
                    </template>
                </Dropdown>
            </a-layout-header>

            <a-layout-header class="hidden sm:flex items-center justify-end bg-white dark:bg-gray-900 px-6">
                <button class="me-3 rounded-md border px-2 py-1 text-xs" @click="isDark = !isDark">{{ isDark ? 'Light' : 'Dark' }}</button>
                <Dropdown align="right" width="48">
                    <template #trigger>
                        <span class="inline-flex rounded-md">
                            <button type="button" class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-700 hover:text-gray-900 focus:outline-none">
                                {{ $page.props.auth.user.name }}
                                <svg class="-me-0.5 ms-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                            </button>
                        </span>
                    </template>
                    <template #content>
                        <DropdownLink :href="route('profile.edit')">Profile</DropdownLink>
                        <DropdownLink :href="route('logout')" method="post" as="button">Log Out</DropdownLink>
                    </template>
                </Dropdown>
            </a-layout-header>

            <a-layout-content class="bg-gray-50 dark:bg-gray-950">
                <header class="bg-white dark:bg-gray-900 shadow" v-if="$slots.header">
                    <div class="px-4 py-6 sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
                        <slot name="header" />
                    </div>
                </header>
                <main class="px-4 py-6 sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
                    <slot />
                </main>
            </a-layout-content>
        </a-layout>
    </a-layout>
    </ConfigProvider>
</template>
