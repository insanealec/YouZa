<script setup lang="ts">
import { Menu } from '@/types';
import Layout from './Layout.vue';
import { Head } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';

const DEFAULT_MENU: Menu = {
  id: -1,
  name: '',
  active_start: undefined,
  active_end: undefined,
  categories: [],
};
const form = useForm(DEFAULT_MENU);


const update = () => {
  form.put(route('admin.edit.menu'), {
    preserveScroll: true,
    onSuccess: () => {
      form.reset();
    },
    onError: () => {
      console.log(form.errors)
    },
  });
};
</script>

<template>

  <Head title="Admin | Edit" />

  <Layout>
    <form @submit.prevent="update" class="mt-6 space-y-6">
    </form>
  </Layout>
</template>