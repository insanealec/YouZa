<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { Car } from '@/types';

defineProps<{
  car: Car;
}>();

const destroyForm = useForm({});

const manufacturerForm = useForm({
  id: '',
});
</script>

<template>
  <Head :title="car.name" />

  <GuestLayout>
    <template #header>
      <h2 class="font-semibold text-xl leading-tight">{{ car.name }}</h2>
    </template>

    <Link class="btn btn-primary m-2" :href="route('cars.edit', car.id)">Update Car</Link>

    <form class="m-2" @submit.prevent="destroyForm.delete(route('cars.destroy', car.id))">
      <button class="btn w-full" type="submit">Delete Car</button>
    </form>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h3 class="font-bold">Manufacturer</h3>
        <div v-if="car.manufacturer" class="flex justify-center items-center">
          <p>{{ car.manufacturer.name }}</p>
          <form class="m-2" @submit.prevent="manufacturerForm.delete(route('cars.dissociateManufacturer', car.id))">
            <button class="btn w-full" type="submit">Remove Car from {{ car.manufacturer.name }}</button>
          </form>
        </div>
        <p v-else>No Manufacturer on File</p>
      </div>
    </div>

    <Link class="link" :href="route('cars.index')">Back</Link>
  </GuestLayout>
</template>