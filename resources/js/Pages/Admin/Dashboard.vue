<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Accordion from '@/Pages/Admin/Partials/Accordion.vue';
import { Head } from '@inertiajs/vue3';
import { Menu, Category, Item } from '@/types';
import { ref } from 'vue';

defineProps<{
  menus: Menu[];
  categories: Category[];
  items: Item[];
}>();

const currentAccordion = ref(0);
const menuModal = ref();

const handleAccordionChange = (value: number) => {
  console.log(value)
  currentAccordion.value = value;
};
</script>

<template>

  <Head title="Admin | Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl leading-tight">Dashboard</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <Accordion title="Menus" :current-accordion="currentAccordion" :index="0"
          @accordion-click="(i: number) => handleAccordionChange(i)">
          <button @click="menuModal.showModal()" class="btn">Add Menu</button>
          <dialog ref="menuModal" id="menuModal" class="modal">
            <div class="modal-box">
              <h3 class="font-bold text-lg">Hello!</h3>
              <p class="py-4">Press ESC key or click the button below to close</p>
              <div class="modal-action">
                <form method="dialog">
                  <!-- if there is a button in form, it will close the modal -->
                  <button class="btn">Close</button>
                </form>
              </div>
            </div>
          </dialog>

          <ul class="list-disc list-inside">
            <li v-for="menu in menus" :key="menu.id">{{ menu.name }}</li>
          </ul>
        </Accordion>

        <Accordion title="Categories" :current-accordion="currentAccordion" :index="1"
          @accordion-click="(i: number) => handleAccordionChange(i)">
          <ul class="list-disc list-inside">
            <li v-for="category in categories" :key="category.id">{{ category.name }}</li>
          </ul>
        </Accordion>

        <Accordion title="Items" :current-accordion="currentAccordion" :index="2"
          @accordion-click="(i: number) => handleAccordionChange(i)">
          <ul class="list-disc list-inside">
            <li v-for="item in items" :key="item.id">{{ item.name }}</li>
          </ul>
        </Accordion>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
