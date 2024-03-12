<script setup lang="ts">
import DealershipLayout from '@/Layouts/DealershipLayout.vue';
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

  <DealershipLayout>
    <template #header>
      <h2 class="font-semibold text-xl leading-tight">Dealership</h2>
    </template>

    <Link class="btn btn-primary" :href="route('cars.index')">View Cars</Link>
    <Link class="btn" :href="route('manufacturers.index')">View Manufacturers</Link>
  </DealershipLayout>

</template>
