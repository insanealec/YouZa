<script setup lang="ts">
</script>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <!-- Page Heading -->
        <header v-if="$slots.header" class="shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <slot name="header" />
            </div>
        </header>

        <div
            class="container px-6 py-4 card bg-neutral"
        >
            <slot />
        </div>
    </div>
</template>
