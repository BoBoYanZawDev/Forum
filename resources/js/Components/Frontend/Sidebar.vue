<template>
    <div class="lg:col-span-1">
        <div class="sticky top-20 space-y-4">
            <!-- User Profile Card -->
            <div class="bg-white rounded-2xl p-4 border border-gray-200 shadow-sm">
                <div class="flex items-center space-x-3">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-xl">
                        {{ currentUser.avatar }}
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold text-gray-900">{{ currentUser.name }}</h3>
                        <p class="text-sm text-gray-500">{{ currentUser.username }}</p>
                    </div>
                </div>
            </div>

            <!-- Navigation Menu -->
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm">
                <nav class="p-2">
                    <a v-for="item in navItems" :key="item.id" href="#" :class="[
                        'flex items-center space-x-3 px-4 py-3 rounded-xl transition-colors duration-200 relative',
                        item.isActive
                            ? 'bg-blue-50 text-blue-600'
                            : 'text-gray-700 hover:bg-gray-50'
                    ]">
                        <span class="text-xl">{{ item.icon }}</span>
                        <span class="font-medium">{{ item.name }}</span>
                        <span v-if="item.count" class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full">
                            {{ item.count }}
                        </span>
                    </a>
                </nav>
            </div>

            <!-- Trending Topics -->
            <div class="bg-white rounded-2xl p-4 border border-gray-200 shadow-sm">
                <h3 class="font-bold text-gray-900 mb-3">Trending</h3>
                <div class="space-y-3">
                    <div v-for="trend in trending" :key="trend.id"
                        class="cursor-pointer hover:bg-gray-50 p-2 rounded-lg transition-colors duration-200">
                        <p class="font-semibold text-gray-900 text-sm">{{ trend.tag }}</p>
                        <p class="text-xs text-gray-500">{{ trend.posts }} posts</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            currentUser: {
                name: 'John Doe',
                username: '@johndoe',
                avatar: 'JD',
            },
            navItems: [
                { id: 1, name: 'Home', icon: '🏠', isActive: true },
                { id: 2, name: 'Trending', icon: '🔥', isActive: false },
                { id: 3, name: 'Following', icon: '👥', isActive: false },
                { id: 4, name: 'Notifications', icon: '🔔', isActive: false, count: 3 },
                { id: 5, name: 'Messages', icon: '💬', isActive: false, count: 7 },
                { id: 6, name: 'Bookmarks', icon: '🔖', isActive: false },
                { id: 7, name: 'Profile', icon: '👤', isActive: false }
            ],
            trending: [
                { id: 1, tag: '#WebDevelopment', posts: '2.1k' },
                { id: 2, tag: '#AI', posts: '1.8k' },
                { id: 3, tag: '#RemoteWork', posts: '956' },
                { id: 4, tag: '#Startup', posts: '743' },
                { id: 5, tag: '#Design', posts: '612' }
            ],
        };
    },
};
</script>