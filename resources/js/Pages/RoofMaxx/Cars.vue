<script setup lang="ts">
import DealershipLayout from '@/Layouts/DealershipLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { Car, Manufacturer } from '@/types';
import { ref, computed } from 'vue';

const props = defineProps<{
  cars: Car[];
  manufacturers: Manufacturer[];
}>();

const selectedManufacturer = ref(-1);

const filteredCars = computed(() => {
  if (selectedManufacturer.value == -1) {
    return props.cars;
  }

  return props.cars.filter((car) => car.manufacturer_id === selectedManufacturer.value);
});
</script>

<template>

  <Head title="All Cars" />

  <DealershipLayout>
    <template #header>
      <h2 class="font-semibold text-xl leading-tight">All Cars</h2>
    </template>

    <Link class="btn btn-primary" :href="route('cars.create')">Create Car</Link>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h3 class="font-bold">Cars</h3>
        <div class="flex items-center my-2">
          <select name="manufilter" v-model="selectedManufacturer">
            <option value="-1">Filter by Manufacturer</option>
            <option v-for="manufacturer in manufacturers" :key="manufacturer.id" :value="manufacturer.id">{{ manufacturer.name }}</option>
          </select>
        </div>
        <div class="overflow-x-auto">
          <table class="table">
            <thead>
              <th>ID</th>
              <th>Name</th>
              <th>Manufacturer</th>
            </thead>
            <tbody>
              <tr v-for="car in filteredCars" :key="car.id">
                <td>{{ car.id }}</td>
                <td><Link class="link" :href="route('cars.show', car.id)">{{ car.name }}</Link></td>
                <td>{{ manufacturers.find((m) => m.id === car.manufacturer_id)?.name }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <Link class="link" :href="route('welcome')">Home</Link>
  </DealershipLayout>
</template>