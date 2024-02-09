<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

defineProps<{
    href: string;
}>();
</script>

<template>
    <Link
        :href="href"
        class="block w-full px-4 py-2 text-start text-sm leading-5 focus:outline-none transition duration-150 ease-in-out hover:bg-secondary"
    >
        <slot />
    </Link>
</template>
