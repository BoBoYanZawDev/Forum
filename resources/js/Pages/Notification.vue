<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { usePoll } from '@inertiajs/vue3';
usePoll(5000, {
    only: ['comments']
})
const notifications = ref([]);
const open = ref(false);

onMounted(async () => {
    let res = await axios.get('/notifications');
    notifications.value = res.data;
});

function toggleDropdown() {
    open.value = !open.value;
}

function markAsRead(id) {
    axios.post(`/notifications/${id}/read`).then(() => {
        notifications.value = notifications.value.filter(n => n.id !== id);
    });
}
</script>

<template>
    <div class="relative">
        <!-- Bell Button -->
        <button @click="toggleDropdown" class="relative">
            🔔
            <span v-if="notifications.length"
                class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full text-xs px-1">
                {{ notifications.length }}
            </span>
        </button>

        <!-- Dropdown -->
        <div v-if="open" class="absolute right-0 mt-2 w-72 bg-white shadow-lg rounded-lg overflow-hidden z-50">
            <ul>
                <li v-if="!notifications.length" class="p-3 text-gray-500 text-sm text-center">
                    No new notifications
                </li>
                <li v-for="n in notifications" :key="n.id" class="p-3 hover:bg-gray-100 cursor-pointer border-b"
                    @click="markAsRead(n.id)">
                    <p class="text-sm font-medium">{{ n.data.message }}</p>
                    <p class="text-xs text-gray-500">{{ n.created_at }}</p>
                </li>
            </ul>
        </div>
    </div>
</template>
