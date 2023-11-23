<template>
  <main class="w-full mt-32">

    <Header />
    <SearchForm />

  </main>
</template>

<script setup lang="ts">
import SearchForm from '@/Components/app/SearchForm.vue';
import Header from '@/Components/app/Header.vue';

</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Lora:wght@500;600;700&display=swap');

main {
  font-family: 'Lora', serif;
}

</style>