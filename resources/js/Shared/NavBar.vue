<template>
    <nav class="space-x-4">
        <Link
            href="/countries/table"
            class="px-4 py-2 rounded transition duration-200"
            :class="{
                'bg-indigo-100 text-indigo-700':
                    $page.url === '/countries/table',
                'hover:bg-indigo-50': $page.url !== '/countries/table',
            }"
        >
            Table View
        </Link>
        <Link
            href="/countries/cards"
            class="px-4 py-2 rounded transition duration-200"
            :class="{
                'bg-indigo-100 text-indigo-700':
                    $page.url === '/countries/cards',
                'hover:bg-indigo-50': $page.url !== '/countries/cards',
            }"
        >
            Card View
        </Link>
    </nav>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/vue3";
</script>
