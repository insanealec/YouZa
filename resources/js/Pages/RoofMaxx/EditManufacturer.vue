<script setup lang="ts">
import DealershipLayout from '@/Layouts/DealershipLayout.vue';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import { Manufacturer } from '@/types';

const manufacturer = usePage().props.manufacturer as Manufacturer;

const form = useForm({
  name: manufacturer.name,
});
</script>

<template>
  <Head :title="`Update ${manufacturer.name}`" />

  <DealershipLayout>
    <template #header>
      <h2 class="font-semibold text-xl leading-tight">Update {{ manufacturer.name }}</h2>
    </template>

    <form @submit.prevent="form.patch(route('manufacturers.update', manufacturer.id))" class="mt-6 space-y-6">
      <input type="text" name="name" v-model="form.name" placeholder="name" />
      <button class="btn btn-primary" type="submit">Update Manufacturer</button>
    </form>

    <Link class="link" :href="route('manufacturers.index')">Back</Link>
  </DealershipLayout>
</template>
