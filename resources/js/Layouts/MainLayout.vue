<template>
    <div>
        <!-- TODO - add this to navbar-->
        <header class="bg-gray-800 text-white p-4 flex justify-between">
            <h1 class="text-lg">Countries Explorer</h1>
            <nav>
                <Link href="/countries/table" class="mr-4">Table View</Link>
                <Link href="/countries/cards">Card View</Link>
            </nav>
        </header>
        <main class="p-6">
            <slot />
        </main>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>
