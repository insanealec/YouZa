<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { Car } from '@/types';

defineProps<{
  car: Car;
}>();

const form = useForm({});
</script>

<template>
  <Head :title="car.name" />

  <GuestLayout>
    <template #header>
      <h2 class="font-semibold text-xl leading-tight">{{ car.name }}</h2>
    </template>

    <Link class="btn btn-primary m-2" :href="route('cars.edit', car.id)">Update Car</Link>

    <form class="m-2" @submit.prevent="form.delete(route('cars.destroy', car.id))">
      <button class="btn w-full" type="submit">Delete Car</button>
    </form>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <p v-if="car.manufacturer">{{ car.manufacturer.name }}</p>
        <p v-else>No Manufacturer on File</p>
      </div>
    </div>

    <Link class="link" :href="route('cars.index')">Back</Link>
  </GuestLayout>
</template>