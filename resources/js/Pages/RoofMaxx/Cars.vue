<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { Car } from '@/types';

defineProps<{
  cars: Car[];
}>();
</script>

<template>

  <Head title="All Cars" />

  <GuestLayout>
    <template #header>
      <h2 class="font-semibold text-xl leading-tight">All Cars</h2>
    </template>

    <Link class="btn btn-primary" :href="route('cars.create')">Create Car</Link>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <ul class="list-disc list-inside">
          <li v-for="car in cars" :key="car.id">
            <Link class="link" :href="route('cars.show', car.id)">{{ car.name }}</Link>
          </li>
        </ul>
      </div>
    </div>
  </GuestLayout>
</template>