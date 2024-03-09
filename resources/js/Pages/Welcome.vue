<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

defineProps<{
  canLogin?: boolean;
  canRegister?: boolean;
  laravelVersion: string;
  phpVersion: string;
}>();
</script>

<template>

  <Head title="Welcome" />

  <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 card bg-neutral">
      <Link class="btn btn-primary" :href="route('cars.index')">View Cars</Link>
      <Link class="btn" :href="route('manufacturers.index')">View Manufacturers</Link>
    </div>
  </div>

</template>
