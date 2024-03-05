<script setup lang="ts">
import { computed } from 'vue';


const props = defineProps<{
  title: string;
  index: number;
  currentAccordion: number;
}>();

const value = computed({
  get() {
    return props.currentAccordion;
  },
  set() {
    // Do nothing - handled by div click for DaisyUI
  }
});
</script>

<template>
  <div @click="$emit('accordion-click', index)" class="collapse collapse-arrow bg-neutral my-2">
    <input v-model="value" :value="index" type="radio" name="dashboard-accordion">
    <div class="collapse-title text-neutral-content">{{ title }}</div>
    <div class="collapse-content">
      <slot />
    </div>
  </div>
</template>
