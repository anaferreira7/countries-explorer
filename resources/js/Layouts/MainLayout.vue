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

        <main class="max-w-7xl mx-auto px-6 py-8">
            <slot />
        </main>
    </div>
</template>

<script setup>
import NavBar from "../Shared/NavBar.vue";
</script>
