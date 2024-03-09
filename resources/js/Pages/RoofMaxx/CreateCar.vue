<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
  name: '',
});
</script>

<template>
  <Head :title="`Create Car`" />

  <GuestLayout>
    <template #header>
      <h2 class="font-semibold text-xl leading-tight">Create Car</h2>
    </template>

    <form @submit.prevent="form.post(route('cars.store'))" class="mt-6 space-y-6">
      <input type="text" name="name" v-model="form.name" placeholder="name" />
      <button class="btn btn-primary" type="submit">Create Car</button>
    </form>

    <Link :href="route('cars.index')">Back</Link>
  </GuestLayout>
</template>