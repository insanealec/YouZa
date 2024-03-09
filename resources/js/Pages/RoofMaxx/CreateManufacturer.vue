<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
  name: '',
});
</script>

<template>
  <Head :title="`Create Manufacturer`" />

  <GuestLayout>
    <template #header>
      <h2 class="font-semibold text-xl leading-tight">Create Manufacturer</h2>
    </template>

    <form @submit.prevent="form.post(route('manufacturers.store'))" class="mt-6 space-y-6">
      <input type="text" name="name" v-model="form.name" placeholder="name" />
      <button class="btn btn-primary" type="submit">Create Manufacturer</button>
    </form>

    <Link class="link" :href="route('manufacturers.index')">Back</Link>
  </GuestLayout>
</template>