<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { Item } from '../types';

defineProps<{
    items: Item[];
}>();
</script>

<template>
    <Head title="Menu" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl leading-tight">Menu</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex">
                    <div v-for="item in items" :key="item.id" class="m-6 p-6 card bg-neutral">
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
