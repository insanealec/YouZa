<script setup lang="ts">
import NavBar from '@/Components/NavBar.vue';

</script>

<template>
    <div>
        <div class="min-h-screen">
            <NavBar></NavBar>

            <!-- Page Heading -->
            <header class="shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
