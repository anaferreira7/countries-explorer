<template>
    <div class="flex justify-between">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">
            Countries Table
        </h2>

        <div class="mb-6">
            <input
                type="text"
                v-model="searchQuery"
                placeholder="Search countries by name..."
                class="w-96 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            />
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th
                        scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        Flag
                    </th>
                    <th
                        scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        Country Name
                    </th>
                    <th
                        scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        Capital
                    </th>
                    <th
                        scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        Region
                    </th>
                    <th
                        scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        Population
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr v-if="paginatedCountries.length === 0">
                    <td
                        colspan="5"
                        class="px-6 py-4 text-center text-sm text-gray-500"
                    >
                        No countries found.
                    </td>
                </tr>
                <tr
                    v-else
                    v-for="country in paginatedCountries"
                    :key="country.name.common"
                >
                    <td class="px-6 py-4 whitespace-nowrap">
                        <img
                            :src="country.flags.svg"
                            :alt="
                                country.flags.alt ||
                                country.name.common + ' flag'
                            "
                            class="h-8 w-12 object-cover rounded shadow-sm"
                        />
                    </td>
                    <td
                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                    >
                        {{ country.name.common }}
                    </td>
                    <td
                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                    >
                        {{ country.capital ? country.capital[0] : "N/A" }}
                    </td>
                    <td
                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                    >
                        {{ country.region }}
                    </td>
                    <td
                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                    >
                        {{ country.population.toLocaleString() }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Pagination Controls -->
    <div class="flex justify-between items-center mt-6">
        <button
            @click="goBack"
            :disabled="currentPage === 1"
            class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50 disabled:cursor-not-allowed"
        >
            Previous
        </button>
        <span class="text-sm text-gray-700"
            >Page {{ currentPage }} of {{ totalPages }}</span
        >
        <button
            @click="goNext"
            :disabled="currentPage === totalPages"
            class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50 disabled:cursor-not-allowed"
        >
            Next
        </button>
    </div>
</template>

<script setup>
import { ref, computed } from "vue";

//props
const props = defineProps({
    countries: Array,
});

//data
const searchQuery = ref("");
const currentPage = ref(1);
const itemsPerPage = 10; // Number of countries to display per page

//computed
const filteredCountries = computed(() => {
    if (!searchQuery.value) {
        return props.countries;
    } else {
        currentPage.value = 1;
        const query = searchQuery.value.toLowerCase();
        return props.countries.filter((country) =>
            country.name.common.toLowerCase().includes(query)
        );
    }
});

const totalPages = computed(() => {
    return Math.ceil(filteredCountries.value.length / itemsPerPage);
});

//TODO
const paginatedCountries = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    return filteredCountries.value.slice(start, end);
});

//methods
const goNext = () => {
    if (currentPage.value < totalPages.value) {
        currentPage.value++;
    }
};

const goBack = () => {
    if (currentPage.value > 1) {
        currentPage.value--;
    }
};
</script>
