<template>
    <div class="bg-white rounded-2xl p-4 border border-gray-200 shadow-sm">
        <h3 class="font-bold text-gray-900 mb-4">Suggested Communities</h3>
        <div class="space-y-3">
            <div v-for="suggestion in suggestions" :key="suggestion.id" class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white">
                        {{ suggestion.avatar }}
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-900 text-sm">{{ suggestion.name }}</h4>
                        <p class="text-xs text-gray-500">{{ suggestion.members }} members</p>
                    </div>
                </div>
                <button
                    class="px-3 py-1 bg-blue-500 text-white text-sm rounded-full hover:bg-blue-600 transition-colors duration-200">
                    Join
                </button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            suggestions: [{ id: 1, name: 'JavaScript Developers', members: '12.5k', avatar: '⚛️' },
            { id: 2, name: 'UI/UX Designers', members: '8.3k', avatar: '🎨' },
            { id: 3, name: 'Startup Founders', members: '5.7k', avatar: '🚀' },
            { id: 4, name: 'Tech News', members: '25.1k', avatar: '📰' }]
        }
    }
}
</script>
<style scoped></style>