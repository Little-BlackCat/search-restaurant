
<template>
  <Head title="Find Restaurant" />

  <form @submit.prevent="searchRestaurant" class="w-[600px] h-[80px] flex items-center mx-auto">
    <TextInput 
      type="text" 
      class="block w-full mr-2" 
      v-model="form.search" 
      autocomplete 
      placeholder="Search for Restaurant" 
    />

    <PrimaryButton class="h-[40px]">Search</PrimaryButton>
  </form>

  <div class="w-[600px] mx-auto mt-16">
    Content
  </div>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  search: '',
})

async function searchRestaurant() {
  try {
    const response = await form.post(route('search.restaurant'));
    console.log(response);
  } catch (error) {
    console.error('Error submitting form:', error);
  }
}

</script>

<style scoped>

</style>