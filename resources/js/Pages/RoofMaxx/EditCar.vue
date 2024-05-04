<script setup lang="ts">
import DealershipLayout from '@/Layouts/DealershipLayout.vue';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import { Car } from '@/types';

const car = usePage().props.car as Car;

const form = useForm({
  name: car.name,
});
</script>

<template>
  <Head :title="`Update ${car.name}`" />

  <DealershipLayout>
    <template #header>
      <h2 class="font-semibold text-xl leading-tight">Update {{ car.name }}</h2>
    </template>

    <form @submit.prevent="form.patch(route('cars.update', car.id))" class="mt-6 space-y-6">
      <input type="text" name="name" v-model="form.name" placeholder="name" />
      <button class="btn btn-primary" type="submit">Update Car</button>
    </form>

    <Link class="link" :href="route('cars.index')">Back</Link>
  </DealershipLayout>
</template>
