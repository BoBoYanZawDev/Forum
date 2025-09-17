<template >
<header class="bg-white border-b border-gray-200 sticky top-0 z-50 shadow-sm">
            <div class="max-w-6xl mx-auto px-4">
                <div class="flex items-center justify-between h-16">
                    <!-- Logo -->
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center">
                            <img id="background" class=" max-w-[50px]" src="/assets/forum.png" />
                        </div>
                        <h1 class="text-xl font-bold text-gray-900">Forum</h1>
                    </div>

                    <!-- Search Bar - Facebook Style -->
                    <div class="flex-1 max-w-lg mx-8">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <input v-model="searchQuery" type="text" placeholder="Search posts, people, and topics..."
                                class="w-full pl-10 pr-4 py-2.5 bg-gray-100 border-0 rounded-full focus:ring-2 focus:ring-blue-500 focus:bg-white text-gray-900 placeholder-gray-500 transition-all duration-200" />
                        </div>
                    </div>

                    <!-- Navigation -->
                    <nav class="flex items-center space-x-2">
                        <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                            class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition-colors duration-200 font-medium">
                        Dashboard
                        </Link>
                        <template v-else>
                            <Link :href="route('login')"
                                class="px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-full transition-colors duration-200">
                            <!-- <Icon icon="mdi-light:home" /> -->
                            Log in
                            </Link>
                            <Link :href="route('register')"
                                class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition-colors duration-200 font-medium">
                            <!-- <font-awesome-icon :icon="['fas', 'home']" /> -->
                            Sign up
                            </Link>
                        </template>
                    </nav>
                </div>
            </div>
        </header>
</template>
<script>
import { Link } from '@inertiajs/vue3';

export default {
    components:{
        Link
    }
}
</script>
<style scoped>
    
</style>