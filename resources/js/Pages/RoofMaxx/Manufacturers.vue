<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head } from '@inertiajs/vue3';
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

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <ul class="list-disc list-inside">
          <li v-for="manufacturer in manufacturers" :key="manufacturer.id">{{ manufacturer.name }}</li>
        </ul>

      </div>
    </div>
  </GuestLayout>
</template>