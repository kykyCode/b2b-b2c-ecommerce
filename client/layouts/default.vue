<script setup lang="ts">
const route = useRoute();
</script>

<template>
    <div>
        <Header class="px-2 py-4"></Header>
        <div class="container mx-auto px-3 lg:px-6 pt-4 lg:pt-6 pb-6 lg:pb-20">
            <slot></slot>
        </div>
        <Footer></Footer>
    </div>
</template>
