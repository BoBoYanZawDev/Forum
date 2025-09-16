<template>

    <Head title="Social Forum" />

    <div class="min-h-screen bg-gray-50">
        <Navbar />

        <div class="max-w-6xl mx-auto px-4 py-6">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                <!-- Left Sidebar - Twitter Style -->
                <Sidebar />

                <!-- Main Feed -->
                <div class="lg:col-span-2">
                    <slot />
                </div>

                <!-- Right Sidebar -->
                <div class="lg:col-span-1">
                    <div class="sticky top-20 space-y-4">
                        <!-- Suggested Communities -->
                        <SuggestedCommunity />

                        <!-- Footer Links -->
                        <Footer />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Footer from '@/Components/Frontend/Footer.vue';
import Navbar from '@/Components/Frontend/Navbar.vue';
import Sidebar from '@/Components/Frontend/Sidebar.vue';
import SuggestedCommunity from '@/Components/Frontend/SuggestedCommunity.vue';

export default {
    data() {
        return {

        };
    },
    components: {
        Sidebar, SuggestedCommunity, Footer, Navbar
    },
    methods: {},
}
</script>