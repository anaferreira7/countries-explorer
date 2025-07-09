<template>
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Countries Cards</h2>

    <div
        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6"
    >
        <div
            v-for="country in visibleCountries"
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

    <div v-if="isLoading" class="text-center text-gray-500 mt-8">
        Loading countries...
    </div>
    <div
        v-else-if="props.countries.length === 0"
        class="text-center text-gray-500 mt-8"
    >
        No countries to display.
    </div>

    <div ref="loadMoreSentinel" class="h-1 bg-transparent"></div>
</template>

<script setup>
import { ref, onMounted, onUnmounted, computed } from "vue";

const props = defineProps({
    countries: Array,
});

const visibleCountries = ref([]);
const itemsPerLoad = 20;
const loadedCount = ref(0);
const isLoading = ref(false);
const loadMoreSentinel = ref(null);
let observer = null;

const hasMoreCountries = computed(() => {
    return loadedCount.value < props.countries.length;
});

onMounted(() => {
    loadMore();

    observer = new IntersectionObserver(
        (entries) => {
            const [entry] = entries;
            if (
                entry.isIntersecting &&
                !isLoading.value &&
                hasMoreCountries.value
            ) {
                loadMore();
            }
        },
        {
            root: null,
            rootMargin: "0px",
            threshold: 0.1,
        }
    );

    if (loadMoreSentinel.value) {
        observer.observe(loadMoreSentinel.value);
    }
});

const loadMore = () => {
    if (isLoading.value || !hasMoreCountries.value) {
        return;
    }

    isLoading.value = true;

    setTimeout(() => {
        const nextBatch = props.countries.slice(
            loadedCount.value,
            loadedCount.value + itemsPerLoad
        );
        visibleCountries.value.push(...nextBatch);
        loadedCount.value += nextBatch.length;
        isLoading.value = false;
    }, 500);
};

onUnmounted(() => {
    if (observer) {
        observer.disconnect();
    }
});
</script>
