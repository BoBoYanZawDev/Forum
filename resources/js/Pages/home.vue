<script setup >
import { Head, Link } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

// User data
const currentUser = ref({
  name: 'John Doe',
  avatar: '👨‍💻',
  username: '@johndoe'
});

// Navigation items
const navItems = ref([
  { id: 1, name: 'Home', icon: '🏠', isActive: true },
  { id: 2, name: 'Trending', icon: '🔥', isActive: false },
  { id: 3, name: 'Following', icon: '👥', isActive: false },
  { id: 4, name: 'Notifications', icon: '🔔', isActive: false, count: 3 },
  { id: 5, name: 'Messages', icon: '💬', isActive: false, count: 7 },
  { id: 6, name: 'Bookmarks', icon: '🔖', isActive: false },
  { id: 7, name: 'Profile', icon: '👤', isActive: false }
]);

// Community suggestions
const suggestions = ref([
  { id: 1, name: 'JavaScript Developers', members: '12.5k', avatar: '⚛️' },
  { id: 2, name: 'UI/UX Designers', members: '8.3k', avatar: '🎨' },
  { id: 3, name: 'Startup Founders', members: '5.7k', avatar: '🚀' },
  { id: 4, name: 'Tech News', members: '25.1k', avatar: '📰' }
]);

// Trending topics
const trending = ref([
  { id: 1, tag: '#WebDevelopment', posts: '2.1k' },
  { id: 2, tag: '#AI', posts: '1.8k' },
  { id: 3, tag: '#RemoteWork', posts: '956' },
  { id: 4, tag: '#Startup', posts: '743' },
  { id: 5, tag: '#Design', posts: '612' }
]);

// Posts/Threads data
const posts = ref([
  {
    id: 1,
    author: {
      name: 'Sarah Chen',
      username: '@sarahchen',
      avatar: '👩‍💼',
      verified: true
    },
    content: 'Just launched my new web app! 🚀 Built with Vue.js and Laravel. The journey from idea to deployment took 3 months of nights and weekends. So grateful for this amazing community!',
    image: null,
    timestamp: '2h',
    likes: 124,
    reposts: 23,
    replies: 45,
    views: '2.1k',
    isLiked: false,
    isReposted: false,
    tags: ['#VueJS', '#Laravel', '#WebDev']
  },
  {
    id: 2,
    author: {
      name: 'Alex Rodriguez',
      username: '@alexdev',
      avatar: '👨‍💻',
      verified: false
    },
    content: 'Hot take: CSS Grid is still underutilized in 2024. I see so many developers defaulting to Flexbox for everything when Grid would be perfect for their layouts.',
    image: null,
    timestamp: '4h',
    likes: 89,
    reposts: 34,
    replies: 67,
    views: '1.8k',
    isLiked: true,
    isReposted: false,
    tags: ['#CSS', '#WebDesign', '#Frontend']
  },
  {
    id: 3,
    author: {
      name: 'Tech News Daily',
      username: '@technews',
      avatar: '📰',
      verified: true
    },
    content: 'BREAKING: OpenAI announces GPT-5 with revolutionary multimodal capabilities. Early tests show 40% improvement in reasoning tasks. What does this mean for developers?',
    image: null,
    timestamp: '6h',
    likes: 456,
    reposts: 178,
    replies: 234,
    views: '12.3k',
    isLiked: false,
    isReposted: true,
    tags: ['#AI', '#OpenAI', '#GPT5', '#TechNews']
  },
  {
    id: 4,
    author: {
      name: 'Maya Patel',
      username: '@mayaux',
      avatar: '🎨',
      verified: false
    },
    content: 'Design tip: White space is not wasted space. It\'s one of the most powerful tools in your design arsenal. It guides attention, creates hierarchy, and improves readability.',
    image: null,
    timestamp: '8h',
    likes: 203,
    reposts: 67,
    replies: 34,
    views: '3.2k',
    isLiked: true,
    isReposted: false,
    tags: ['#Design', '#UX', '#DesignTips']
  },
  {
    id: 5,
    author: {
      name: 'Code Mentor',
      username: '@codementor',
      avatar: '🧑‍🏫',
      verified: true
    },
    content: 'Reminder: Your first solution doesn\'t have to be perfect. Write it, make it work, then make it better. Progress over perfection, always.',
    image: null,
    timestamp: '12h',
    likes: 789,
    reposts: 234,
    replies: 123,
    views: '5.6k',
    isLiked: false,
    isReposted: false,
    tags: ['#Programming', '#Motivation', '#Learning']
  }
]);

const searchQuery = ref('');
const activeTab = ref('For You');

const filteredPosts = computed(() => {
  let filtered = posts.value;
  
  if (searchQuery.value) {
    filtered = filtered.filter(post => 
      post.content.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
      post.author.name.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
      post.tags.some(tag => tag.toLowerCase().includes(searchQuery.value.toLowerCase()))
    );
  }
  
  return filtered;
});

const toggleLike = (postId) => {
  const post = posts.value.find(p => p.id === postId);
  if (post) {
    post.isLiked = !post.isLiked;
    post.likes += post.isLiked ? 1 : -1;
  }
};

const toggleRepost = (postId) => {
  const post = posts.value.find(p => p.id === postId);
  if (post) {
    post.isReposted = !post.isReposted;
    post.reposts += post.isReposted ? 1 : -1;
  }
};

const formatNumber = (num) => {
  if (num >= 1000) {
    return (num / 1000).toFixed(1) + 'k';
  }
  return num.toString();
};
</script>

<template>
  <Head title="Social Forum" />
  
  <div class="min-h-screen bg-gray-50">
    <!-- Header - Twitter/X Style -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50 shadow-sm">
      <div class="max-w-6xl mx-auto px-4">
        <div class="flex items-center justify-between h-16">
          <!-- Logo -->
          <div class="flex items-center space-x-3">
            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
              <span class="text-white font-bold text-sm">F</span>
            </div>
            <h1 class="text-xl font-bold text-gray-900">Forum</h1>
          </div>
          
          <!-- Search Bar - Facebook Style -->
          <div class="flex-1 max-w-lg mx-8">
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
              </div>
              <input
                v-model="searchQuery"
                type="text"
                placeholder="Search posts, people, and topics..."
                class="w-full pl-10 pr-4 py-2.5 bg-gray-100 border-0 rounded-full focus:ring-2 focus:ring-blue-500 focus:bg-white text-gray-900 placeholder-gray-500 transition-all duration-200"
              />
            </div>
          </div>
          
          <!-- Navigation -->
          <nav class="flex items-center space-x-2">
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
              class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition-colors duration-200 font-medium"
                >
                    Dashboard
                </Link>
                <template v-else>
                    <Link
                        :href="route('login')"
                class="px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-full transition-colors duration-200"
                    >
                        Log in
                    </Link>
                    <Link
                        :href="route('register')"
                class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition-colors duration-200 font-medium"
                    >
                Sign up
                    </Link>
                </template>
            </nav>
        </div>
      </div>
        </header>

    <div class="max-w-6xl mx-auto px-4 py-6">
      <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <!-- Left Sidebar - Twitter Style -->
        <div class="lg:col-span-1">
          <div class="sticky top-20 space-y-4">
            <!-- User Profile Card -->
            <div class="bg-white rounded-2xl p-4 border border-gray-200 shadow-sm">
              <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-xl">
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
                <a
                  v-for="item in navItems"
                  :key="item.id"
                  href="#"
                  :class="[
                    'flex items-center space-x-3 px-4 py-3 rounded-xl transition-colors duration-200 relative',
                    item.isActive
                      ? 'bg-blue-50 text-blue-600'
                      : 'text-gray-700 hover:bg-gray-50'
                  ]"
                >
                  <span class="text-xl">{{ item.icon }}</span>
                  <span class="font-medium">{{ item.name }}</span>
                  <span
                    v-if="item.count"
                    class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full"
                  >
                    {{ item.count }}
                  </span>
                </a>
              </nav>
            </div>

            <!-- Trending Topics -->
            <div class="bg-white rounded-2xl p-4 border border-gray-200 shadow-sm">
              <h3 class="font-bold text-gray-900 mb-3">Trending</h3>
              <div class="space-y-3">
                <div
                  v-for="trend in trending"
                  :key="trend.id"
                  class="cursor-pointer hover:bg-gray-50 p-2 rounded-lg transition-colors duration-200"
                >
                  <p class="font-semibold text-gray-900 text-sm">{{ trend.tag }}</p>
                  <p class="text-xs text-gray-500">{{ trend.posts }} posts</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Main Feed -->
        <div class="lg:col-span-2">
          <div class="space-y-4">
            <!-- Feed Header -->
            <div class="bg-white rounded-2xl p-4 border border-gray-200 shadow-sm">
              <div class="flex space-x-4 border-b border-gray-200">
                <button
                  :class="[
                    'px-4 py-2 font-medium transition-colors duration-200 border-b-2',
                    activeTab === 'For You'
                      ? 'text-blue-600 border-blue-600'
                      : 'text-gray-600 border-transparent hover:text-gray-900'
                  ]"
                  @click="activeTab = 'For You'"
                >
                  For You
                </button>
                <button
                  :class="[
                    'px-4 py-2 font-medium transition-colors duration-200 border-b-2',
                    activeTab === 'Following'
                      ? 'text-blue-600 border-blue-600'
                      : 'text-gray-600 border-transparent hover:text-gray-900'
                  ]"
                  @click="activeTab = 'Following'"
                >
                  Following
                </button>
              </div>
            </div>

                        <!-- Create Post -->
            <div class="bg-white rounded-2xl p-4 border border-gray-200 shadow-sm">
              <div class="flex space-x-3">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-xl">
                  {{ currentUser.avatar }}
                </div>
                <div class="flex-1">
                  <textarea
                    placeholder="What's on your mind?"
                    class="w-full p-3 bg-gray-50 border-0 rounded-xl resize-none focus:ring-2 focus:ring-blue-500 text-gray-900 placeholder-gray-500"
                    rows="3"
                  ></textarea>
                  <div class="flex items-center justify-between mt-3">
                    <div class="flex items-center space-x-4 text-gray-500">
                      <button class="hover:text-blue-500 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                      </button>
                      <button class="hover:text-blue-500 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m0 0V1a1 1 0 011 1v8a1 1 0 01-1 1H7a1 1 0 01-1-1V3a1 1 0 011-1m0 0h8"></path>
                                    </svg>
                      </button>
                    </div>
                    <button class="px-6 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition-colors duration-200 font-medium">
                      Post
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Posts Feed -->
            <div class="space-y-4">
              <article
                v-for="post in filteredPosts"
                :key="post.id"
                class="bg-white rounded-2xl p-6 border border-gray-200 hover:border-gray-300 transition-all duration-200 shadow-sm"
              >
                <!-- Post Header -->
                <div class="flex items-start space-x-3 mb-4">
                  <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-xl">
                    {{ post.author.avatar }}
                  </div>
                  <div class="flex-1">
                    <div class="flex items-center space-x-2">
                      <h3 class="font-semibold text-gray-900">{{ post.author.name }}</h3>
                      <svg
                        v-if="post.author.verified"
                        class="w-4 h-4 text-blue-500"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                      >
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                      </svg>
                      <span class="text-gray-500">{{ post.author.username }}</span>
                      <span class="text-gray-400">•</span>
                      <span class="text-gray-500">{{ post.timestamp }}</span>
                    </div>
                  </div>
                  <button class="text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                    </svg>
                  </button>
                </div>

                <!-- Post Content -->
                <div class="mb-4">
                  <p class="text-gray-900 leading-relaxed">{{ post.content }}</p>
                  <div v-if="post.tags.length > 0" class="flex flex-wrap gap-2 mt-3">
                    <span
                      v-for="tag in post.tags"
                      :key="tag"
                      class="text-blue-500 hover:text-blue-600 cursor-pointer"
                    >
                      {{ tag }}
                    </span>
                  </div>
                </div>

                <!-- Post Actions -->
                <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                  <div class="flex items-center space-x-6">
                    <button
                      @click="toggleLike(post.id)"
                      :class="[
                        'flex items-center space-x-2 px-3 py-1.5 rounded-full transition-all duration-200',
                        post.isLiked
                          ? 'text-red-500 bg-red-50'
                          : 'text-gray-500 hover:text-red-500 hover:bg-red-50'
                      ]"
                    >
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                      </svg>
                      <span class="text-sm font-medium">{{ formatNumber(post.likes) }}</span>
                    </button>

                                        <button class="flex items-center space-x-2 px-3 py-1.5 rounded-full text-gray-500 hover:text-blue-500 hover:bg-blue-50 transition-all duration-200">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                      <span class="text-sm font-medium">{{ formatNumber(post.replies) }}</span>
                    </button>

                    <button
                      @click="toggleRepost(post.id)"
                      :class="[
                        'flex items-center space-x-2 px-3 py-1.5 rounded-full transition-all duration-200',
                        post.isReposted
                          ? 'text-green-500 bg-green-50'
                          : 'text-gray-500 hover:text-green-500 hover:bg-green-50'
                      ]"
                    >
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                      </svg>
                      <span class="text-sm font-medium">{{ formatNumber(post.reposts) }}</span>
                    </button>
                  </div>

                                    <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-500">{{ post.views }} views</span>
                    <button class="text-gray-400 hover:text-gray-600">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                    </svg>
                    </button>
                  </div>
                </div>
              </article>
            </div>
          </div>
        </div>

        <!-- Right Sidebar -->
        <div class="lg:col-span-1">
          <div class="sticky top-20 space-y-4">
            <!-- Suggested Communities -->
            <div class="bg-white rounded-2xl p-4 border border-gray-200 shadow-sm">
              <h3 class="font-bold text-gray-900 mb-4">Suggested Communities</h3>
              <div class="space-y-3">
                <div
                  v-for="suggestion in suggestions"
                  :key="suggestion.id"
                  class="flex items-center justify-between"
                >
                  <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white">
                      {{ suggestion.avatar }}
                    </div>
                    <div>
                      <h4 class="font-medium text-gray-900 text-sm">{{ suggestion.name }}</h4>
                      <p class="text-xs text-gray-500">{{ suggestion.members }} members</p>
                    </div>
                  </div>
                  <button class="px-3 py-1 bg-blue-500 text-white text-sm rounded-full hover:bg-blue-600 transition-colors duration-200">
                    Join
                  </button>
                </div>
              </div>
            </div>

            <!-- Footer Links -->
            <div class="bg-white rounded-2xl p-4 border border-gray-200 shadow-sm">
              <div class="space-y-2 text-sm text-gray-500">
                <a href="#" class="hover:text-blue-500 block">Terms of Service</a>
                <a href="#" class="hover:text-blue-500 block">Privacy Policy</a>
                <a href="#" class="hover:text-blue-500 block">Cookie Policy</a>
                <a href="#" class="hover:text-blue-500 block">Accessibility</a>
                <p class="pt-2 border-t border-gray-200">© 2024 Forum</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
</template>


