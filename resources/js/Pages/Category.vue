<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { Category } from '../types';

defineProps<{
    category: Category;
}>();
</script>

<template>
    <Head :title="category.name" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl leading-tight">{{ category.name }}</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">{{ category.description }}</div>
                </div>

                <div class="flex">
                    <div v-for="item in category.items" :key="item.id" class="m-6 p-6 card bg-neutral">
                        <Link :href="route('item', item.id)">
                            <h3 class="font-semibold text-xl leading-tight">{{ item.name }}</h3>
                        </Link>
                        <p>{{ item.description }}</p>
                        <p class="text-indigo-400">{{ item.base_price }}</p>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
