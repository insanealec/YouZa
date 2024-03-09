<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { Car, Manufacturer } from '@/types';

defineProps<{
  manufacturer: Manufacturer;
  cars: Car[];
}>();

const destroyForm = useForm({});

const carForm = useForm({
  id: -1,
});
</script>

<template>
  <Head :title="manufacturer.name" />

  <GuestLayout>
    <template #header>
      <h2 class="font-semibold text-xl leading-tight">{{ manufacturer.name }}</h2>
    </template>

    <Link class="btn btn-primary m-2" :href="route('manufacturers.edit', manufacturer.id)">Update Manufacturer</Link>

    <form class="m-2" @submit.prevent="destroyForm.delete(route('manufacturers.destroy', manufacturer.id))">
      <button class="btn w-full" type="submit">Delete Manufacturer</button>
    </form>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form class="flex justify-center items-center" @submit.prevent="carForm.post(route('manufacturers.storeCar', manufacturer.id))">
          <select name="cars" v-model="carForm.id">
            <option value="-1">Select a Car</option>
            <option v-for="car in cars" :key="car.id" :value="car.id">{{ car.name }}</option>
          </select>
          <button class="btn btn-primary" type="submit">Add Car</button>
        </form>

        <ul class="list-disc list-inside" v-if="manufacturer.cars">
          <li v-for="car in manufacturer.cars" :key="car.id">
            <Link class="link" :href="route('cars.show', car.id)">{{ car.name }}</Link>
          </li>
        </ul>
      </div>
    </div>

    <Link class="link" :href="route('manufacturers.index')">Back</Link>
  </GuestLayout>
</template>