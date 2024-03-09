<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { Car } from '@/types';

defineProps<{
  car: Car;
}>();
</script>

<template>
  <Head :title="`Update ${car.name}`" />

  <GuestLayout>
    <template #header>
      <h2 class="font-semibold text-xl leading-tight">Update {{ car.name }}</h2>
    </template>

    <form :action="`/cars/${car.id}`" method="UPDATE">
      <input type="text" name="name" :value="car.name" />
      <button type="submit">Update Car</button>
    </form>

    <Link :href="route('cars.index')">Back</Link>
  </GuestLayout>
</template>
