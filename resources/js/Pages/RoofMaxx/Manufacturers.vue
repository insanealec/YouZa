<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { Manufacturer } from '@/types';

defineProps<{
  manufacturers: Manufacturer[];
}>();
</script>

<template>

  <Head title="All Manufacturers" />

  <GuestLayout>
    <template #header>
      <h2 class="font-semibold text-xl leading-tight">All Manufacturers</h2>
    </template>

    <Link class="btn btn-primary" :href="route('manufacturers.create')">Create Manufacturer</Link>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <ul class="list-disc list-inside">
          <li v-for="manufacturer in manufacturers" :key="manufacturer.id">
            <Link class="link" :href="route('manufacturers.show', manufacturer.id)">{{ manufacturer.name }}</Link>
          </li>
        </ul>
      </div>
    </div>

    <Link class="link" :href="route('welcome')">Home</Link>
  </GuestLayout>
</template>