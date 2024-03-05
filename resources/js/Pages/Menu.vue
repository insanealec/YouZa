<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { Category } from '../types';

defineProps<{
  categories: Category[];
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
          <div v-for="category in categories" :key="category.id" class="m-6 p-6 card bg-neutral">
            <Link :href="route('category', category.id)">
            <h3 class="font-semibold text-xl leading-tight">{{ category.name }}</h3>
            </Link>
            <p>{{ category.description }}</p>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
