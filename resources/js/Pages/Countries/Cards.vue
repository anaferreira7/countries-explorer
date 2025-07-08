<template>
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Countries Cards</h2>

    <div
        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6"
    >
        <div
            v-for="country in props.countries"
            :key="country.name.common"
            class="bg-white shadow-md rounded-lg p-6 flex flex-col items-center text-center transition-transform duration-200 hover:scale-105"
        >
            <img
                :src="country.flags.svg"
                :alt="country.flags.alt || country.name.common + ' flag'"
                class="h-24 w-auto object-cover rounded-md mb-4 shadow-sm border border-gray-200"
            />

            <h3 class="text-xl font-bold text-gray-900 mb-2">
                {{ country.name.common }}
            </h3>

            <p class="text-gray-600 text-sm mb-1">
                <span class="font-semibold">Region:</span> {{ country.region }}
            </p>

            <p class="text-gray-600 text-sm">
                <span class="font-semibold">Population:</span>
                {{ country.population.toLocaleString() }}
            </p>
        </div>
    </div>

    <div
        v-if="props.countries.length === 0"
        class="text-center text-gray-500 mt-8"
    >
        No countries to display.
    </div>
</template>

<script setup>
const props = defineProps({
    countries: Array,
});
</script>
