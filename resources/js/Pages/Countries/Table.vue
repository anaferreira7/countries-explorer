<template>
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Countries Table</h2>

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
                <tr v-if="props.countries.length === 0">
                    <td
                        colspan="5"
                        class="px-6 py-4 text-center text-sm text-gray-500"
                    >
                        No countries found.
                    </td>
                </tr>
                <tr
                    v-for="country in props.countries"
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
</template>

<script setup>
const props = defineProps({
    countries: Array,
});
</script>
