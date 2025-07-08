<template>
    <div class="min-h-screen bg-gray-50 text-gray-900">
        <header class="bg-white shadow sticky top-0 z-50">
            <div
                class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between"
            >
                <h1 class="text-xl font-bold text-indigo-600">
                    🌍 Countries Explorer
                </h1>

                <NavBar />
            </div>
        </header>

        <main class="max-w-7xl mx-auto px-6 py-8 animate-fade-in">
            <slot />
        </main>
    </div>
</template>

<script setup>
import NavBar from "../Shared/NavBar.vue";
</script>

<style scoped>
@keyframes fade-in {
    0% {
        opacity: 0;
        transform: translateY(10px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fade-in 0.4s ease-out;
}
</style>
