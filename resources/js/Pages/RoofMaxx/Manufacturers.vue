<script setup lang="ts">
import DealershipLayout from '@/Layouts/DealershipLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { Manufacturer } from '@/types';

defineProps<{
  manufacturers: Manufacturer[];
}>();
</script>

<template>

  <Head title="All Manufacturers" />

  <DealershipLayout>
    <template #header>
      <h2 class="font-semibold text-xl leading-tight">All Manufacturers</h2>
    </template>

    <Link class="btn btn-primary" :href="route('manufacturers.create')">Create Manufacturer</Link>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <h3 class="font-bold">Manufacturers</h3>
        <div class="overflow-x-auto">
          <table class="table">
            <thead>
              <th>ID</th>
              <th>Name</th>
            </thead>
            <tbody>
              <tr v-for="manufacturer in manufacturers" :key="manufacturer.id">
                <td>{{ manufacturer.id }}</td>
                <td><Link class="link" :href="route('manufacturers.show', manufacturer.id)">{{ manufacturer.name }}</Link></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <Link class="link" :href="route('welcome')">Home</Link>
  </DealershipLayout>
</template>