<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
  <Head :title="`Create Car`" />

  <GuestLayout>
    <template #header>
      <h2 class="font-semibold text-xl leading-tight">Create Car</h2>
    </template>

    <form :action="`/cars`" method="POST">
      <input type="text" name="name" />
      <button type="submit">Create Car</button>
    </form>

    <Link :href="route('cars.index')">Back</Link>
  </GuestLayout>
</template>